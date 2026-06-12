<div class="empty-state">

    <div class="empty-icon">
        📦
    </div>

    <h3>
        Belum Ada Aktivitas
    </h3>

    <p>
        Aktivitas pemesanan layanan akan muncul di sini.
        Yuk temukan layanan terbaik untuk kebutuhan Anda.
    </p>

    <a href="{{ route('home') }}"
       class="empty-btn">

        🔍 Cari Layanan

    </a>

</div>

<style>

/* =========================
   EMPTY STATE
========================= */

.empty-state{

    max-width:700px;

    margin:50px auto;

    padding:60px 40px;

    text-align:center;

    background:rgba(255,255,255,.9);

    backdrop-filter:blur(15px);
    -webkit-backdrop-filter:blur(15px);

    border:1px solid rgba(240,138,40,.10);

    border-radius:32px;

    box-shadow:
        0 15px 40px rgba(0,0,0,.06);
}

/* =========================
   ICON
========================= */

.empty-icon{

    width:120px;
    height:120px;

    margin:0 auto 25px;

    display:flex;
    align-items:center;
    justify-content:center;

    font-size:60px;

    border-radius:50%;

    background:
        linear-gradient(
            135deg,
            #FFF4E8,
            #FFF9F4
        );

    box-shadow:
        0 10px 25px rgba(240,138,40,.15);
}

/* =========================
   TITLE
========================= */

.empty-state h3{

    margin:0;

    color:#222;

    font-size:30px;
    font-weight:800;
}

/* =========================
   DESCRIPTION
========================= */

.empty-state p{

    margin:15px auto 0;

    max-width:450px;

    color:#777;

    font-size:16px;

    line-height:1.8;
}

/* =========================
   BUTTON
========================= */

.empty-btn{

    display:inline-flex;

    align-items:center;
    justify-content:center;

    gap:10px;

    margin-top:30px;

    min-width:220px;

    height:58px;

    padding:0 25px;

    border-radius:16px;

    text-decoration:none;

    background:linear-gradient(
        135deg,
        #F08A28,
        #FFB04D
    );

    color:white;

    font-size:15px;
    font-weight:700;

    box-shadow:
        0 10px 25px rgba(240,138,40,.25);

    transition:.3s ease;
}

.empty-btn:hover{

    transform:
        translateY(-3px);

    box-shadow:
        0 15px 35px rgba(240,138,40,.35);
}

.empty-btn:active{

    transform:translateY(0);
}

/* =========================
   MOBILE
========================= */

@media(max-width:768px){

    .empty-state{

        margin:25px 15px;

        padding:40px 20px;
    }

    .empty-icon{

        width:90px;
        height:90px;

        font-size:45px;
    }

    .empty-state h3{

        font-size:24px;
    }

    .empty-state p{

        font-size:14px;
    }

    .empty-btn{

        width:100%;

        min-width:auto;

        height:52px;

        font-size:14px;
    }

}

</style>