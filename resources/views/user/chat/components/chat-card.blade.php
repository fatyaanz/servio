<a href="{{ route('detail.chat') }}"
   class="chat-card">

    <div class="chat-avatar">

        <img
            src="{{ asset('assets/images/provider-logo.png') }}"
            alt="provider"
        >

    </div>

    <div class="chat-info">

        <div class="chat-top">

            <h3>
                Service AC Berkah
            </h3>

            <span>
                10:20
            </span>

        </div>

        <p>
            Teknisi sedang menuju lokasi Anda
        </p>

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