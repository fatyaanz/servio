@if(!isset($activeUser) || !$activeUser)
<div class="chat-room" style="align-items: center; justify-content: center; background: #fafafa; display: flex;">
    <div style="text-align: center; padding: 40px; color: #888;">
        <span style="font-size: 60px; display: block; margin-bottom: 20px;">💬</span>
        <h3 style="margin: 0; color: #333; font-size: 18px; font-weight: 700;">Mulai Percakapan</h3>
        <p style="margin-top: 8px; font-size: 14px; color: #777;">Pilih salah satu pengguna dari sidebar untuk mulai berkirim pesan.</p>
    </div>
</div>
@else
<div class="chat-room">

    <!-- HEADER -->

    <div class="chat-room-header">

        <div class="room-user">

            <div class="room-avatar" style="overflow: hidden; display: flex; align-items: center; justify-content: center; border-radius: 14px;">
                <img src="{{ $activeUser->profile_photo ? asset('storage/' . $activeUser->profile_photo) : 'https://ui-avatars.com/api/?name=' . urlencode($activeUser->name) }}" style="width: 100%; height: 100%; object-fit: cover;">
            </div>

            <div class="room-info">

                <h3>
                    {{ $activeUser->name }}
                </h3>

                <p>
                    ● Online
                </p>

            </div>

        </div>

    </div>

    <!-- BOOKING CONTEXT CARD (Admin) -->
    @if($booking)
    <div class="booking-context-card" style="padding: 12px 20px; background: #FFF8F2; border-bottom: 1px solid rgba(240, 138, 40, 0.15); display: flex; align-items: center; justify-content: space-between; gap: 15px; box-sizing: border-box;">
        <div style="display: flex; align-items: center; gap: 12px; min-width: 0;">
            <div style="width: 38px; height: 38px; border-radius: 10px; background: #FFF0E0; display: flex; align-items: center; justify-content: center; font-size: 18px; flex-shrink: 0;">🛠️</div>
            <div style="min-width: 0;">
                <h4 style="margin: 0; font-size: 13px; color: #222; font-weight: 700;">Booking #{{ $booking->formatted_id }}</h4>
                <p style="margin: 3px 0 0; font-size: 11px; color: #666; font-weight: 500; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                    {{ $booking->subServices->pluck('name')->join(', ') }} • 
                    <span style="color: #F08A28; font-weight: 700; text-transform: uppercase; font-size: 9px;">{{ str_replace('_', ' ', $booking->status) }}</span>
                </p>
            </div>
        </div>
    </div>
    @endif

    <!-- BODY -->

    <div class="chat-body">

        @if($messages->isEmpty())
            <div style="text-align: center; padding: 40px; color: #888; margin: auto;">
                <p style="font-weight: 600;">Belum ada pesan. Kirim pesan pertama untuk memulai!</p>
            </div>
        @else
            @foreach($messages as $msg)
                <div class="message {{ $msg->sender_id == Auth::id() ? 'my-message' : 'other-message' }}">

                    {{ $msg->message }}

                    <span>
                        {{ $msg->created_at->format('H:i') }}
                    </span>

                </div>
            @endforeach
        @endif

    </div>

    <!-- INPUT -->

    <form action="{{ route('chat.send', $activeUser->id) }}" method="POST" class="chat-input-area">
        @csrf
        @if($booking)
            <input type="hidden" name="booking_id" value="{{ $booking->id }}">
        @endif
        <input
            type="text"
            name="message"
            placeholder="Ketik pesan..."
            required
            autocomplete="off"
        >

        <button type="submit">
            Kirim
        </button>

    </form>

</div>
@endif

<style>

/* =========================
   CHAT ROOM
========================= */

.chat-room{

    flex:1;

    display:flex;
    flex-direction:column;

    background:white;

    border:1px solid var(--border);

    border-radius:20px;

    box-shadow:var(--shadow-sm);

    overflow:hidden;

}

/* =========================
   HEADER
========================= */

.chat-room-header{

    display:flex;

    justify-content:space-between;
    align-items:center;

    padding:18px 20px;

    border-bottom:1px solid var(--border);

}

.room-user{

    display:flex;

    align-items:center;

    gap:12px;

}

.room-avatar{

    width:48px;
    height:48px;

    border-radius:14px;

    background:linear-gradient(
        135deg,
        var(--primary),
        #ffb347
    );

    display:flex;

    justify-content:center;
    align-items:center;

    color:white;

    font-size:18px;

    flex-shrink:0;

}

.room-info h3{

    font-size:15px;

    font-weight:600;

    color:var(--text-dark);

    margin-bottom:3px;

}

.room-info p{

    font-size:12px;

    color:#22c55e;

}

.more-btn{

    width:40px;
    height:40px;

    border:none;

    border-radius:12px;

    background:#FAFAFA;

    cursor:pointer;

    font-size:18px;

}

/* =========================
   CHAT BODY
========================= */

.chat-body{

    flex:1;

    overflow-y:auto;

    padding:20px;

    display:flex;

    flex-direction:column;

    gap:12px;

    background:#FAFAFA;

}

/* =========================
   MESSAGE
========================= */

.message{

    max-width:70%;

    padding:12px 16px;

    border-radius:16px;

    font-size:14px;

    line-height:1.6;

}

.message span{

    display:block;

    margin-top:6px;

    font-size:11px;

    opacity:.7;

}

/* =========================
   OTHER MESSAGE
========================= */

.other-message{

    align-self:flex-start;

    background:white;

    border:1px solid var(--border);

    color:var(--text-dark);

    border-bottom-left-radius:6px;

}

/* =========================
   MY MESSAGE
========================= */

.my-message{

    align-self:flex-end;

    background:linear-gradient(
        135deg,
        var(--primary),
        #ffb347
    );

    color:white;

    border-bottom-right-radius:6px;

}

/* =========================
   INPUT
========================= */

.chat-input-area{

    display:flex;

    gap:12px;

    padding:16px 20px;

    border-top:1px solid var(--border);

}

.chat-input-area input{

    flex:1;

    height:48px;

    border:1px solid var(--border);

    border-radius:12px;

    padding:0 16px;

    outline:none;

    font-size:14px;

}

.chat-input-area input:focus{

    border-color:var(--primary);

}

.chat-input-area button{

    border:none;

    padding:0 24px;

    border-radius:12px;

    background:linear-gradient(
        135deg,
        var(--primary),
        #ffb347
    );

    color:white;

    font-size:14px;

    font-weight:600;

    cursor:pointer;

}

/* =========================
   SCROLLBAR
========================= */

.chat-body::-webkit-scrollbar{

    width:5px;

}

.chat-body::-webkit-scrollbar-thumb{

    background:#D1D5DB;

    border-radius:999px;

}

/* =========================
   RESPONSIVE
========================= */

@media(max-width:768px){

    .message{

        max-width:90%;

    }

}
</style>