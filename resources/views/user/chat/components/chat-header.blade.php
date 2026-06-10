<div class="chat-detail-header">

    <a href="{{ route('chat') }}"
       class="back-btn">

        ←

    </a>

    <div class="provider-avatar">

        <img
            src="{{ asset('assets/images/provider-logo.png') }}"
            alt="provider"
        >

    </div>

    <div class="provider-info">

        <h3>
            Service AC Berkah
        </h3>

        <span>
            Online
        </span>

    </div>

</div>

<style>

.chat-detail-header{

    position:sticky;

    top:0;

    z-index:100;

    background:white;

    display:flex;

    align-items:center;

    gap:15px;

    padding:20px;

    border-bottom:1px solid #F2F2F2;
}

.back-btn{

    width:42px;
    height:42px;

    display:flex;
    align-items:center;
    justify-content:center;

    border-radius:12px;

    text-decoration:none;

    background:#F8F8F8;

    color:#222;

    font-size:22px;
}

.provider-avatar{

    width:55px;
    height:55px;

    border-radius:16px;

    overflow:hidden;
}

.provider-avatar img{

    width:100%;
    height:100%;

    object-fit:cover;
}

.provider-info h3{

    margin:0;

    font-size:18px;

    color:#222;
}

.provider-info span{

    color:#22C55E;

    font-size:13px;
}

</style>