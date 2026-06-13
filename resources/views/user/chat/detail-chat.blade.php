<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Chat</title>
</head>
<body>

    @include('user.chat.components.chat-header')

    @if($booking)
    <div class="booking-context-card" style="width: min(95%, 1200px); margin: 15px auto 0; padding: 15px 20px; background: #FFF8F2; border: 1px solid rgba(240, 138, 40, 0.15); border-radius: 18px; display: flex; align-items: center; justify-content: space-between; gap: 15px; box-shadow: 0 8px 20px rgba(0,0,0,0.03); box-sizing: border-box;">
        <div style="display: flex; align-items: center; gap: 12px; min-width: 0;">
            <div style="width: 40px; height: 40px; border-radius: 10px; background: #FFF0E0; display: flex; align-items: center; justify-content: center; font-size: 20px; flex-shrink: 0;">🛠️</div>
            <div style="min-width: 0;">
                <h4 style="margin: 0; font-size: 14px; color: #222; font-weight: 700;">Booking #{{ $booking->formatted_id }}</h4>
                <p style="margin: 4px 0 0; font-size: 12px; color: #666; font-weight: 500; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                    {{ $booking->subServices->pluck('name')->join(', ') }} • 
                    <span style="color: #F08A28; font-weight: 700; text-transform: uppercase; font-size: 10px;">{{ str_replace('_', ' ', $booking->status) }}</span>
                </p>
            </div>
        </div>
        <a href="{{ route('detail.aktifitas', $booking->id) }}" style="text-decoration: none; padding: 8px 16px; background: #F08A28; color: white; border-radius: 10px; font-size: 12px; font-weight: 700; transition: .2s; flex-shrink: 0; box-shadow: 0 4px 10px rgba(240,138,40,0.2);">
            Lihat Detail
        </a>
    </div>
    @endif

    @include('user.chat.components.message-list')

    @include('user.chat.components.chat-input')

</body>
</html>