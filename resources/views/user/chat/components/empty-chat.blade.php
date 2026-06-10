<div class="empty-chat">

    <div class="empty-icon">

        💬

    </div>

    <h3>

        Belum Ada Percakapan

    </h3>

    <p>

        Chat dengan penyedia layanan akan muncul di sini setelah Anda melakukan booking layanan.

    </p>

    <a href="{{ route('home') }}"
       class="empty-btn">

        Cari Layanan

    </a>

</div>

<style>

.empty-chat{

    max-width:700px;

    margin:50px auto;

    padding:50px 30px;

    text-align:center;

    background:white;

    border-radius:28px;

    box-shadow:
        0 10px 25px rgba(0,0,0,.04);
}

.empty-icon{

    width:90px;
    height:90px;

    margin:auto;

    display:flex;

    align-items:center;
    justify-content:center;

    border-radius:50%;

    background:#FFF6EE;

    font-size:40px;
}

.empty-chat h3{

    margin-top:25px;

    color:#222;

    font-size:24px;

    font-weight:800;
}

.empty-chat p{

    margin-top:10px;

    color:#777;

    line-height:1.8;
}

.empty-btn{

    display:inline-flex;

    align-items:center;
    justify-content:center;

    margin-top:25px;

    padding:14px 26px;

    border-radius:14px;

    text-decoration:none;

    background:#F08A28;

    color:white;

    font-weight:700;

    transition:.3s ease;
}

.empty-btn:hover{

    background:#E67C14;

    transform:translateY(-2px);
}

</style>