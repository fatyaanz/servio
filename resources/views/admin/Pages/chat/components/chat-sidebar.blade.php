<div class="chat-sidebar">

    <!-- HEADER -->

    <div class="chat-sidebar-header">

        <div>

            <h2>
                Chat
            </h2>

            <p>
                Percakapan pelanggan
            </p>

        </div>


    </div>

    <!-- SEARCH -->

    <div class="chat-search">

        <input
            type="text"
            placeholder="Cari percakapan..."
        >

    </div>

    <!-- LIST -->

    <div class="chat-list">
        @if(empty($chats))
            <div style="text-align: center; padding: 40px; color: #888;">
                <p style="font-weight: 600;">Belum ada chat masuk.</p>
            </div>
        @else
            @foreach($chats as $chat)
                <div class="chat-item {{ isset($activeUser) && $activeUser->id == $chat['user']->id ? 'active-chat' : '' }}" onclick="window.location.href='{{ route('admin.Pages.chat.chat', ['user_id' => $chat['user']->id]) }}'">
                    <div class="chat-avatar" style="overflow: hidden; display: flex; align-items: center; justify-content: center; border-radius: 14px;">
                        <img src="{{ $chat['user']->profile_photo ? asset('storage/' . $chat['user']->profile_photo) : 'https://ui-avatars.com/api/?name=' . urlencode($chat['user']->name) }}" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    <div class="chat-info">
                        <div class="chat-top">
                            <h4>{{ $chat['user']->name }}</h4>
                            <span>{{ $chat['latest_message'] ? $chat['latest_message']->created_at->format('H:i') : '' }}</span>
                        </div>
                        <div class="chat-bottom">
                            <p style="margin: 0;">{{ $chat['latest_message'] ? $chat['latest_message']->message : 'Mulai percakapan baru' }}</p>
                            @if($chat['unread_count'] > 0)
                                <div class="unread-badge">{{ $chat['unread_count'] }}</div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>

</div>

<style>

/* =========================
   SIDEBAR
========================= */

.chat-sidebar{

    height:100%;

    display:flex;
    flex-direction:column;

    padding:20px;

    background:white;

    border:1px solid var(--border);

    border-radius:20px;

    box-shadow:var(--shadow-sm);

    overflow:hidden;

}

/* =========================
   HEADER
========================= */

.chat-sidebar-header{

    margin-bottom:20px;

}

.chat-sidebar-header h2{

    font-size:24px;

    font-weight:700;

    color:var(--text-dark);

    margin-bottom:4px;

}

.chat-sidebar-header p{

    font-size:13px;

    color:var(--text-secondary);

}

/* =========================
   SEARCH
========================= */

.chat-search{

    margin-bottom:18px;

}

.chat-search input{

    width:100%;

    height:48px;

    border:1px solid var(--border);

    border-radius:12px;

    padding:0 16px;

    background:#FAFAFA;

    outline:none;

    font-size:14px;

    transition:.3s;

}

.chat-search input:focus{

    border-color:var(--primary);

    background:white;

}

/* =========================
   CHAT LIST
========================= */

.chat-list{

    flex:1;

    overflow-y:auto;

    display:flex;

    flex-direction:column;

    gap:10px;

}

/* =========================
   CHAT ITEM
========================= */

.chat-item{

    display:flex;

    gap:12px;

    padding:14px;

    border-radius:14px;

    cursor:pointer;

    transition:.3s;

}

.chat-item:hover{

    background:#FAFAFA;

}

.chat-item.active-chat{

    background:#FFF4E6;

    border:1px solid rgba(255,122,0,.15);

}

/* =========================
   AVATAR
========================= */

.chat-avatar{

    width:48px;
    height:48px;

    border-radius:14px;

    background:linear-gradient(
        135deg,
        var(--primary),
        #ffb347
    );

    display:flex;

    align-items:center;
    justify-content:center;

    color:white;

    font-size:18px;

    flex-shrink:0;

}

/* =========================
   INFO
========================= */

.chat-info{

    flex:1;

    min-width:0;

}

.chat-top{

    display:flex;

    justify-content:space-between;

    margin-bottom:4px;

}

.chat-top h4{

    font-size:14px;

    font-weight:600;

    color:var(--text-dark);

}

.chat-top span{

    font-size:11px;

    color:var(--text-secondary);

}

.chat-bottom{

    display:flex;

    justify-content:space-between;

    align-items:center;

    gap:10px;

}

.chat-bottom p{

    font-size:13px;

    color:var(--text-secondary);

    overflow:hidden;

    white-space:nowrap;

    text-overflow:ellipsis;

}

/* =========================
   UNREAD
========================= */

.unread-badge{

    min-width:20px;
    height:20px;

    padding:0 6px;

    border-radius:999px;

    background:var(--primary);

    color:white;

    display:flex;

    align-items:center;
    justify-content:center;

    font-size:11px;

    font-weight:600;

}

/* =========================
   SCROLLBAR
========================= */

.chat-list::-webkit-scrollbar{

    width:5px;

}

.chat-list::-webkit-scrollbar-thumb{

    background:#D1D5DB;

    border-radius:999px;

}

/* =========================
   RESPONSIVE
========================= */

@media(max-width:992px){

    .chat-sidebar{

        min-height:350px;

    }

}

</style>