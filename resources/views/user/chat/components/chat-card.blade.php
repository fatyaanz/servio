<a href="{{ route('chat.detail', ['user' => $chat['user']->id]) }}"
   class="chat-card">

    <div class="chat-avatar" style="overflow: hidden; display: flex; align-items: center; justify-content: center; border-radius: 18px;">

        <img
            src="{{ $chat['user']->profile_photo
                ? asset('storage/' . $chat['user']->profile_photo)
                : 'https://ui-avatars.com/api/?name=' . urlencode($chat['user']->name)
            }}"
            alt="user"
            style="width: 100%; height: 100%; object-fit: cover;"
        >

    </div>

    <div class="chat-info">

        <div class="chat-top">

            <h3>
                {{ $chat['user']->name }}
            </h3>

            <span>
                {{ $chat['latest_message'] ? $chat['latest_message']->created_at->format('H:i') : '' }}
            </span>

        </div>

        <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 8px;">
            <p style="margin: 0; color: #777; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; max-width: 80%;">
                {{ $chat['latest_message'] ? $chat['latest_message']->message : 'Mulai percakapan baru' }}
            </p>
            @if($chat['unread_count'] > 0)
                <span style="background: #F08A28; color: white; border-radius: 50%; font-size: 11px; font-weight: 700; width: 20px; height: 20px; display: flex; align-items: center; justify-content: center;">
                    {{ $chat['unread_count'] }}
                </span>
            @endif
        </div>

    </div>

</a>

<style>

.chat-card{

    max-width:1200px;

    margin:0 auto 15px;

    padding:18px;

    display:flex;

    align-items:center;

    gap:15px;

    text-decoration:none;

    background:white;

    border-radius:22px;

    box-shadow:
        0 5px 15px rgba(0,0,0,.04);

    transition:.3s ease;
}

.chat-card:hover{

    transform:translateY(-3px);
}

.chat-avatar{

    width:70px;
    height:70px;

    border-radius:18px;

    overflow:hidden;

    flex-shrink:0;
}

.chat-avatar img{

    width:100%;
    height:100%;

    object-fit:cover;
}

.chat-info{

    flex:1;
}

.chat-top{

    display:flex;

    justify-content:space-between;

    align-items:center;
}

.chat-top h3{

    margin:0;

    color:#222;

    font-size:18px;
}

.chat-top span{

    color:#999;

    font-size:13px;
}

.chat-info p{

    margin-top:8px;

    color:#777;
}

</style>