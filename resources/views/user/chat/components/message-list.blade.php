<div class="chat-body">

    @include('user.chat.components.message-bubble')

</div>

<style>

.chat-body{

    padding:25px 20px 120px;

    min-height:calc(100vh - 160px);

    background:#F8FAFC;
}

/* =========================
   MESSAGE
========================= */

.message{

    display:flex;

    margin-bottom:15px;
}

.message.received{

    justify-content:flex-start;
}

.message.sent{

    justify-content:flex-end;
}

/* =========================
   BUBBLE
========================= */

.bubble{

    max-width:320px;

    padding:14px 16px;

    border-radius:18px;

    position:relative;

    line-height:1.6;

    font-size:14px;
}

.received .bubble{

    background:white;

    color:#222;

    border-bottom-left-radius:6px;

    box-shadow:
        0 4px 10px rgba(0,0,0,.05);
}

.sent .bubble{

    background:#F08A28;

    color:white;

    border-bottom-right-radius:6px;
}

.time{

    display:block;

    margin-top:8px;

    font-size:11px;

    opacity:.7;

    text-align:right;
}

</style>