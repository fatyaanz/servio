<div class="search-container">

    <div class="search-box">

        <span class="search-icon">
            🔍
        </span>

        <input
            type="text"
            placeholder="Cari layanan atau jelaskan masalah Anda..."
        >

    </div>

</div>

<style>

/* =========================
   SEARCH CONTAINER
========================= */

.search-container{
    max-width:1400px;

    margin:25px auto 0;

    padding:0 30px;
}

/* =========================
   SEARCH BOX
========================= */

.search-box{
    display:flex;
    align-items:center;

    height:68px;

    padding:0 24px;

    border-radius:999px;

    background:rgba(255,255,255,0.85);

    backdrop-filter:blur(18px);
    -webkit-backdrop-filter:blur(18px);

    border:1px solid rgba(255,255,255,0.4);

    box-shadow:
        0 10px 30px rgba(0,0,0,0.06);

    transition:.3s ease;
}

.search-box:hover{
    transform:translateY(-2px);

    box-shadow:
        0 15px 35px rgba(0,0,0,0.08);
}

.search-box:focus-within{
    border:1px solid rgba(240,138,40,0.4);

    box-shadow:
        0 0 0 4px rgba(240,138,40,0.12),
        0 15px 35px rgba(0,0,0,0.08);
}

/* =========================
   ICON
========================= */

.search-icon{
    font-size:20px;

    margin-right:14px;

    opacity:.7;
}

/* =========================
   INPUT
========================= */

.search-box input{
    width:100%;

    border:none;
    outline:none;

    background:transparent;

    font-size:16px;
    font-weight:500;

    color:#333;
}

.search-box input::placeholder{
    color:#9A9A9A;
}

/* =========================
   TABLET
========================= */

@media(max-width:1024px){

    .search-container{
        padding:0 20px;
    }

}

/* =========================
   MOBILE
========================= */

@media(max-width:768px){

    .search-container{
        padding:0 15px;
    }

    .search-box{
        height:60px;
        padding:0 18px;
    }

    .search-box input{
        font-size:14px;
    }

    .search-icon{
        font-size:18px;
        margin-right:10px;
    }

}

/* =========================
   MOBILE KECIL
========================= */

@media(max-width:480px){

    .search-box{
        height:55px;
        padding:0 16px;
    }

    .search-box input{
        font-size:13px;
    }

}

</style>