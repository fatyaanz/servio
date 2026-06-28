<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class ChatApiController extends Controller
{
    /**
     * Get inbox (list of chats) for the authenticated user.
     */
    public function index(Request $request)
    {
        $userId = $request->user()->id;

        $messages = Message::where(function($q) use ($userId) {
                $q->where('sender_id', $userId);
            })
            ->orWhere(function($q) use ($userId) {
                $q->where('receiver_id', $userId);
            })
            ->get()
            ->sortByDesc('created_at')
            ->values();

        // Group by the 'other' user to form conversation threads
        $conversations = [];
        foreach ($messages as $msg) {
            $senderId = (string)$msg->sender_id;
            $receiverId = (string)$msg->receiver_id;
            $otherUserId = ($senderId === (string)$userId) ? $receiverId : $senderId;
            
            if (!isset($conversations[$otherUserId])) {
                $conversations[$otherUserId] = $msg;
            }
        }

        $inbox = [];
        foreach ($conversations as $otherUserId => $lastMessage) {
            $otherUser = User::find($otherUserId);
            if (!$otherUser) continue;

            $unreadCount = Message::where('sender_id', $otherUserId)
                ->where('receiver_id', $userId)
                ->where('is_read', false)
                ->count();

            $inbox[] = [
                'provider_id' => $otherUser->id,
                'name' => $otherUser->name,
                'last_message' => $lastMessage->message,
                'time' => $lastMessage->created_at->format('H:i'), // Adjust format if needed
                'timestamp' => $lastMessage->created_at,
                'unread_count' => $unreadCount,
                'is_online' => $otherUser->is_online ?? false,
            ];
        }

        // Sort by most recent
        usort($inbox, function ($a, $b) {
            return $b['timestamp'] <=> $a['timestamp'];
        });

        return response()->json([
            'status' => 'success',
            'data' => $inbox
        ]);
    }

    /**
     * Get messages for a specific conversation
     */
    public function show(Request $request, $otherId)
    {
        $userId = $request->user()->id;

        // Mark as read
        Message::where('sender_id', $otherId)
            ->where('receiver_id', $userId)
            ->where('is_read', false)
            ->update(['is_read' => true]);

        $messages = Message::where(function($q) use ($userId, $otherId) {
                $q->where('sender_id', $userId)->where('receiver_id', $otherId);
            })
            ->orWhere(function($q) use ($userId, $otherId) {
                $q->where('sender_id', $otherId)->where('receiver_id', $userId);
            })
            ->get()
            ->sortBy('created_at')
            ->values();

        return response()->json([
            'status' => 'success',
            'data' => $messages
        ]);
    }

    /**
     * Send a new message
     */
    public function store(Request $request, $otherId)
    {
    // Log incoming request for debugging
    Log::info('ChatApiController@store called', ['otherId' => $otherId, 'payload' => $request->all()]);
    try {
        $userId = $request->user()->id;
        
        // Ensure recipient exists
        $receiver = User::find($otherId);
        if (!$receiver) {
            return response()->json(['status' => 'error', 'message' => 'User not found'], 404);
        }

        $message = Message::create([
            'sender_id' => $userId,
            'receiver_id' => $otherId,
            'message' => $request->message,
            'is_read' => false,
        ]);

        return response()->json([
            'status' => 'success',
            'data' => $message
        ]);
    } catch (\Exception $e) {
        Log::error('Error in ChatApiController@store', ['error' => $e->getMessage()]);
        return response()->json(['status' => 'error', 'message' => 'Failed to send message'], 500);
    }    }
}
