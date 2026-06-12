<div class="top-nav">

    <a href="{{ route('home') }}"
       class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
        Beranda
    </a>

    <a href="{{ route('aktifitas') }}"
       class="nav-link {{ request()->routeIs('aktifitas') || request()->routeIs('riwayat') ? 'active' : '' }}">
        Aktivitas
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

/* =========================
   BOTTOM NAVIGATION
========================= */

.top-nav{

    position:fixed;

    left:50%;
    bottom:20px;

    transform:translateX(-50%);

    width:auto;
    max-width:90%;

    display:flex;
    align-items:center;
    gap:8px;

    padding:10px;

    background:rgba(255,255,255,0.95);

    backdrop-filter:blur(20px);
    -webkit-backdrop-filter:blur(20px);

    border:1px solid rgba(255,255,255,.6);

    border-radius:999px;

    box-shadow:
        0 12px 30px rgba(0,0,0,.12);

    z-index:9999;
}

/* =========================
   NAV LINK
========================= */

.nav-link{

    text-decoration:none;

    color:#64748b;

    font-size:14px;
    font-weight:600;

    padding:14px 24px;

    border-radius:999px;

    transition:.3s ease;

    white-space:nowrap;

    position:relative;

}

/* HOVER */

.nav-link:hover{

    background:#fff4e6;

    color:#ff8a00;

    transform:translateY(-2px);

}

/* ACTIVE */

.nav-link.active{

    background:linear-gradient(
        135deg,
        #ff9f43,
        #ff7a00
    );

    color:white;

    box-shadow:
        0 8px 20px rgba(255,122,0,.25);

}

/* ACTIVE GLOW */

.nav-link.active::after{

    content:'';

    position:absolute;

    inset:0;

    border-radius:999px;

    box-shadow:
        0 0 25px rgba(255,122,0,.25);

    z-index:-1;

}

/* =========================
   MOBILE
========================= */

@media(max-width:768px){

    .top-nav{

        bottom:14px;

        width:95%;

        justify-content:space-between;

        padding:8px;

        gap:4px;

    }

    .nav-link{

        flex:1;

        text-align:center;

        padding:12px 8px;

        font-size:13px;

    }

}

/* =========================
   SAFE SPACE
========================= */

body{

    padding-bottom:110px;

}

</style>