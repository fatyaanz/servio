<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifikasi - Servio</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/servio-design-system.css') }}">
    <style>
        body {
            margin: 0;
            background: #F8F9FB;
            font-family: 'Poppins', sans-serif;
            color: #1F2937;
            padding-bottom: 80px;
        }
        .notif-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .notif-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
        }
        .back-btn {
            background: white;
            border: 1px solid #E5E7EB;
            border-radius: 12px;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            color: #1F2937;
            font-size: 18px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.03);
            transition: 0.2s;
        }
        .back-btn:hover {
            transform: translateX(-3px);
            background: #FAF8F6;
        }
        .notif-title {
            font-size: 20px;
            font-weight: 700;
            margin: 0;
        }
        .mark-read-btn {
            background: none;
            border: none;
            color: #F08A28;
            font-weight: 600;
            font-size: 13px;
            cursor: pointer;
            font-family: inherit;
        }
        .mark-read-btn:hover {
            text-decoration: underline;
        }
        .notif-list {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }
        .notif-card {
            background: white;
            border: 1px solid #E5E7EB;
            border-radius: 18px;
            padding: 16px;
            display: flex;
            gap: 14px;
            text-decoration: none;
            color: inherit;
            box-shadow: 0 4px 15px rgba(0,0,0,0.02);
            transition: 0.3s;
            position: relative;
        }
        .notif-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.04);
            border-color: #FFE0BE;
        }
        .notif-card.unread {
            background: #FFFBF7;
            border-color: #FFE0BE;
        }
        .notif-card.unread::after {
            content: '';
            position: absolute;
            top: 18px;
            right: 18px;
            width: 8px;
            height: 8px;
            background: #F08A28;
            border-radius: 50%;
        }
        .notif-icon-box {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            flex-shrink: 0;
        }
        .notif-icon-box.chat {
            background: #E8F4FF;
            color: #2196F3;
        }
        .notif-icon-box.booking {
            background: #FFF7EE;
            color: #F08A28;
        }
        .notif-icon-box.status {
            background: #EAF7EC;
            color: #28A745;
        }
        .notif-icon-box.general {
            background: #F3F4F6;
            color: #6B7280;
        }
        .notif-content {
            flex: 1;
            min-width: 0;
        }
        .notif-card-title {
            font-weight: 700;
            font-size: 14px;
            margin: 0 0 4px;
            color: #1F2937;
        }
        .notif-card-message {
            font-size: 13px;
            color: #6B7280;
            margin: 0 0 6px;
            line-height: 1.4;
        }
        .notif-card-time {
            font-size: 11px;
            color: #9CA3AF;
        }
        .empty-state {
            text-align: center;
            padding: 40px 20px;
            background: white;
            border-radius: 20px;
            border: 1px solid #E5E7EB;
        }
    </style>
</head>
<body>
    <div class="notif-container">
        <div class="notif-header">
            <a href="javascript:history.back()" class="back-btn">←</a>
            <h1 class="notif-title">Notifikasi</h1>
            @if($notifications->where('is_read', false)->count() > 0)
                <form action="{{ route('notifications.markAllRead') }}" method="POST">
                    @csrf
                    <button type="submit" class="mark-read-btn">Tandai semua dibaca</button>
                </form>
            @else
                <span style="width: 40px;"></span>
            @endif
        </div>

        <div class="notif-list">
            @forelse($notifications as $notif)
                @php
                    $url = '#';
                    if ($notif->type === 'chat_received') {
                        if (auth()->user()->role === 'provider') {
                            $url = route('provider.chat');
                        } else {
                            $url = route('chat');
                        }
                    } elseif ($notif->booking_id) {
                        if (auth()->user()->role === 'provider') {
                            $url = route('provider.detail-pesanan', $notif->booking_id);
                        } else {
                            $url = route('detail.aktifitas', $notif->booking_id);
                        }
                    }
                    
                    $icon = '🔔';
                    $iconClass = 'general';
                    if ($notif->type === 'chat_received') {
                        $icon = '💬';
                        $iconClass = 'chat';
                    } elseif ($notif->type === 'order_created') {
                        $icon = '📦';
                        $iconClass = 'booking';
                    } elseif ($notif->type === 'status_updated') {
                        $icon = '⚙️';
                        $iconClass = 'status';
                    }
                @endphp
                
                <a href="{{ $url }}" class="notif-card {{ !$notif->is_read ? 'unread' : '' }}">
                    <div class="notif-icon-box {{ $iconClass }}">
                        {{ $icon }}
                    </div>
                    <div class="notif-content">
                        <h4 class="notif-card-title">{{ $notif->title }}</h4>
                        <p class="notif-card-message">{{ $notif->message }}</p>
                        <span class="notif-card-time">{{ $notif->created_at->diffForHumans() }}</span>
                    </div>
                </a>
            @empty
                <div class="empty-state">
                    <span style="font-size: 48px;">🔔</span>
                    <h3 style="margin: 15px 0 6px; font-weight: 700;">Tidak ada notifikasi</h3>
                    <p style="margin: 0; color: #6B7280; font-size: 14px;">Semua pemberitahuan aktivitas Anda akan muncul di sini.</p>
                </div>
            @endforelse
        </div>
    </div>
</body>
</html>
