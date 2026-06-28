<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$userId = '6a3e61a7fbfab30ae40556c2';

$messages = App\Models\Message::where(function($q) use ($userId) {
        $q->where('sender_id', $userId);
    })
    ->orWhere(function($q) use ($userId) {
        $q->where('receiver_id', $userId);
    })
    ->get()
    ->sortByDesc('created_at')
    ->values();

$conversations = [];
foreach ($messages as $msg) {
    $senderId = (string)$msg->sender_id;
    $receiverId = (string)$msg->receiver_id;
    $otherUserId = ($senderId === $userId) ? $receiverId : $senderId;
    
    if (!isset($conversations[$otherUserId])) {
        $conversations[$otherUserId] = $msg;
    }
}

$inbox = [];
foreach ($conversations as $otherUserId => $lastMessage) {
    $otherUser = App\Models\User::find($otherUserId);
    if (!$otherUser) continue;
    $inbox[] = [
        'name' => $otherUser->name, 
        'msg' => $lastMessage->message
    ];
}

echo json_encode($inbox);
