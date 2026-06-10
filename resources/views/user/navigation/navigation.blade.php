<div class="top-nav">

    <a href="{{ route('home') }}"
       class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
        Beranda
    </a>

    <a href="{{ route('aktifitas') }}"
        class="nav-link {{ request()->routeIs('aktifitas') || request()->routeIs('riwayat') ? 'active' : '' }}">
            Aktifitas
     </a>

    <a href="{{ route('chat') }}"
       class="nav-link {{ request()->routeIs('chat') ? 'active' : '' }}">
        Chat
    </a>

    <a href="{{ route('profile') }}"
       class="nav-link {{ request()->routeIs('profile') ? 'active' : '' }}">
        Profile
    </a>

</div>

<style>

.top-nav{
    width:fit-content;
    max-width:95%;

    margin:25px auto;

    display:flex;
    align-items:center;
    justify-content:center;
    gap:10px;

    padding:10px;

    border-radius:999px;

    background:rgba(255,255,255,0.75);

    backdrop-filter:blur(20px);
    -webkit-backdrop-filter:blur(20px);

    border:1px solid rgba(255,255,255,0.4);

    box-shadow:
        0 10px 35px rgba(0,0,0,0.08),
        inset 0 1px 0 rgba(255,255,255,0.8);

    position:sticky;
    top:20px;

    z-index:1000;
}

.nav-link{
    text-decoration:none;

    color:#555;

    font-size:15px;
    font-weight:600;

    padding:12px 24px;

    border-radius:999px;

    transition:all .3s ease;

    white-space:nowrap;

    letter-spacing:0.3px;
}

.nav-link:hover{
    color:#F08A28;

    background:rgba(240,138,40,0.08);

    transform:translateY(-2px);
}

.nav-link.active{
    color:#fff;

    background:linear-gradient(
        135deg,
        #F08A28,
        #FFAA4C
    );

    box-shadow:
        0 8px 20px rgba(240,138,40,0.35),
        0 4px 10px rgba(240,138,40,0.20);
}

/* =========================
   MOBILE KECIL
========================= */

@media (max-width:480px){

    .top-nav{
        width:95%;

        gap:4px;

        padding:8px;

        margin:15px auto;
    }

    .nav-link{
        flex:1;

        text-align:center;

        padding:10px 6px;

        font-size:12px;
    }

}

/* =========================
   MOBILE BESAR
========================= */

@media (min-width:481px) and (max-width:768px){

    .top-nav{
        width:95%;

        gap:6px;

        padding:8px;
    }

    .nav-link{
        flex:1;

        text-align:center;

        padding:10px 8px;

        font-size:13px;
    }

}

/* =========================
   TABLET
========================= */

@media (min-width:769px) and (max-width:1024px){

    .nav-link{
        padding:12px 20px;
        font-size:14px;
    }

}

/* =========================
   LAPTOP & DESKTOP
========================= */

@media (min-width:1025px){

    .nav-link{
        padding:12px 28px;
        font-size:15px;
    }

}

</style>