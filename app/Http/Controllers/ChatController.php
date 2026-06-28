<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;
use App\Models\Booking;
use App\Models\Notification;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Customer - Chat List Index
     */
    public function customerIndex(Request $request)
    {
        $myId = Auth::id();
        $chats = $this->getConversations($myId);

        // Handle case if starting a new chat with ?user_id=X
        $activeUserId = $request->query('user_id');
        $bookingId = $request->query('booking_id');

        if ($activeUserId && !collect($chats)->contains('user.id', $activeUserId)) {
            $newUser = User::find($activeUserId);
            if ($newUser) {
                array_unshift($chats, [
                    'user' => $newUser,
                    'latest_message' => null,
                    'unread_count' => 0
                ]);
            }
        }

        return view('user.chat.chat', compact('chats', 'activeUserId', 'bookingId'));
    }

    /**
     * Customer - Chat Room Details
     */
    public function customerDetail(Request $request, User $user)
    {
        $myId = Auth::id();
        $messages = Message::where(function($q) use ($myId, $user) {
                $q->where('sender_id', $myId)->where('receiver_id', $user->id);
            })
            ->orWhere(function($q) use ($myId, $user) {
                $q->where('sender_id', $user->id)->where('receiver_id', $myId);
            })
            ->orderBy('created_at', 'asc')
            ->get();

        // Mark as read
        Message::where('sender_id', $user->id)
            ->where('receiver_id', $myId)
            ->where('is_read', false)
            ->update(['is_read' => true]);

        // Find active booking context
        $bookingId = $request->query('booking_id');
        $booking = null;
        if ($bookingId) {
            $booking = Booking::with('subServices')->find($bookingId);
        } else {
            // Find latest active booking
            $booking = Booking::with('subServices')
                ->where(function($q) use ($myId, $user) {
                    $q->where('customer_id', $myId)->where('provider_id', $user->id);
                })
                ->orWhere(function($q) use ($myId, $user) {
                    $q->where('customer_id', $user->id)->where('provider_id', $myId);
                })
                ->whereNotIn('status', ['completed', 'cancelled', 'rejected'])
                ->latest()
                ->first();
        }

        return view('user.chat.detail-chat', compact('user', 'messages', 'booking'));
    }

    /**
     * Customer, Provider, Admin - Send Message Action
     */
    public function sendMessage(Request $request, User $user)
    {
        $request->validate([
            'message' => 'required|string',
            'booking_id' => 'nullable|integer'
        ]);

        $msg = Message::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $user->id,
            'booking_id' => $request->booking_id ?: null,
            'message' => $request->message,
            'is_read' => false
        ]);

        // Notify Receiver
        Notification::create([
            'user_id' => $user->id,
            'title' => 'Pesan Baru dari ' . Auth::user()->name,
            'message' => Str::limit($request->message, 60),
            'type' => 'chat_received',
            'booking_id' => $request->booking_id ?: null,
            'is_read' => false
        ]);

        return back()->with('success', 'Pesan terkirim');
    }

    /**
     * Provider - Chat Index & Detail (Sidebar + active Room)
     */
    public function providerIndex(Request $request)
    {
        $myId = Auth::id();
        $chats = $this->getConversations($myId);

        $activeUserId = $request->query('user_id');
        $bookingId = $request->query('booking_id');
        $activeUser = null;
        $messages = collect();
        $booking = null;

        if ($activeUserId) {
            $activeUser = User::find($activeUserId);
            if ($activeUser) {
                // Check if in chats list, if not prepend
                if (!collect($chats)->contains('user.id', $activeUserId)) {
                    array_unshift($chats, [
                        'user' => $activeUser,
                        'latest_message' => null,
                        'unread_count' => 0
                    ]);
                }

                // Get messages
                $messages = Message::where(function($q) use ($myId, $activeUserId) {
                        $q->where('sender_id', $myId)->where('receiver_id', $activeUserId);
                    })
                    ->orWhere(function($q) use ($myId, $activeUserId) {
                        $q->where('sender_id', $activeUserId)->where('receiver_id', $myId);
                    })
                    ->orderBy('created_at', 'asc')
                    ->get();

                // Mark read
                Message::where('sender_id', $activeUserId)
                    ->where('receiver_id', $myId)
                    ->where('is_read', false)
                    ->update(['is_read' => true]);

                // Booking context
                if ($bookingId) {
                    $booking = Booking::with('subServices')->find($bookingId);
                } else {
                    $booking = Booking::with('subServices')
                        ->where(function($q) use ($myId, $activeUserId) {
                            $q->where('customer_id', $myId)->where('provider_id', $activeUserId);
                        })
                        ->orWhere(function($q) use ($myId, $activeUserId) {
                            $q->where('customer_id', $activeUserId)->where('provider_id', $myId);
                        })
                        ->whereNotIn('status', ['completed', 'cancelled', 'rejected'])
                        ->latest()
                        ->first();
                }
            }
        }

        return view('provider.pages.chat.chat', compact('chats', 'activeUser', 'messages', 'booking'));
    }

    /**
     * Admin - Chat Index & Detail (Sidebar + active Room)
     */
    public function adminIndex(Request $request)
    {
        $myId = Auth::id();
        $chats = $this->getConversations($myId);

        $activeUserId = $request->query('user_id');
        $bookingId = $request->query('booking_id');
        $activeUser = null;
        $messages = collect();
        $booking = null;

        if ($activeUserId) {
            $activeUser = User::find($activeUserId);
            if ($activeUser) {
                if (!collect($chats)->contains('user.id', $activeUserId)) {
                    array_unshift($chats, [
                        'user' => $activeUser,
                        'latest_message' => null,
                        'unread_count' => 0
                    ]);
                }

                $messages = Message::where(function($q) use ($myId, $activeUserId) {
                        $q->where('sender_id', $myId)->where('receiver_id', $activeUserId);
                    })
                    ->orWhere(function($q) use ($myId, $activeUserId) {
                        $q->where('sender_id', $activeUserId)->where('receiver_id', $myId);
                    })
                    ->orderBy('created_at', 'asc')
                    ->get();

                Message::where('sender_id', $activeUserId)
                    ->where('receiver_id', $myId)
                    ->where('is_read', false)
                    ->update(['is_read' => true]);

                if ($bookingId) {
                    $booking = Booking::with('subServices')->find($bookingId);
                } else {
                    $booking = Booking::with('subServices')
                        ->where(function($q) use ($myId, $activeUserId) {
                            $q->where('customer_id', $myId)->where('provider_id', $activeUserId);
                        })
                        ->orWhere(function($q) use ($myId, $activeUserId) {
                            $q->where('customer_id', $activeUserId)->where('provider_id', $myId);
                        })
                        ->whereNotIn('status', ['completed', 'cancelled', 'rejected'])
                        ->latest()
                        ->first();
                }
            }
        }

        return view('admin.Pages.chat.chat', compact('chats', 'activeUser', 'messages', 'booking'));
    }

    /**
     * Helper to retrieve all unique conversations for a user
     */
    private function getConversations($userId)
    {
        $allMessages = Message::where('sender_id', $userId)
            ->orWhere('receiver_id', $userId)
            ->get();

        $chatGroups = $allMessages->groupBy(function ($msg) use ($userId) {
            return $msg->sender_id == $userId ? $msg->receiver_id : $msg->sender_id;
        });

        $chats = [];
        foreach ($chatGroups as $otherUserId => $messages) {
            $otherUser = User::find($otherUserId);
            if (!$otherUser) continue;

            $latestMessage = $messages->sortByDesc('created_at')->first();

            $unreadCount = $messages->where('sender_id', $otherUserId)
                                    ->where('receiver_id', $userId)
                                    ->where('is_read', false)
                                    ->count();

            $chats[] = [
                'user' => $otherUser,
                'latest_message' => $latestMessage,
                'unread_count' => $unreadCount,
                'latest_time' => $latestMessage ? $latestMessage->created_at : null
            ];
        }

        usort($chats, function($a, $b) {
            if (!$a['latest_time'] || !$b['latest_time']) return 0;
            return $b['latest_time'] <=> $a['latest_time'];
        });

        return $chats;
    }
}
