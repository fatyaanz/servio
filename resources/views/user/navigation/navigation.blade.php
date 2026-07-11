<div class="bottom-nav">

    <a href="{{ route('home') }}"
       class="bottom-nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
        <i class='bx {{ request()->routeIs("home") ? "bxs-home" : "bx-home" }}'></i>
        <span>Beranda</span>
    </a>

    <a href="{{ route('aktifitas') }}"
       class="bottom-nav-item {{ request()->routeIs('aktifitas') || request()->routeIs('riwayat') ? 'active' : '' }}">
        <i class='bx {{ request()->routeIs("aktifitas") || request()->routeIs("riwayat") ? "bxs-receipt" : "bx-receipt" }}'></i>
        <span>Aktivitas</span>
    </a>

    <a href="{{ route('chat') }}"
       class="bottom-nav-item {{ request()->routeIs('chat') ? 'active' : '' }}">
        <i class='bx {{ request()->routeIs("chat") ? "bxs-chat" : "bx-chat" }}'></i>
        <span>Chat</span>
    </a>

    <a href="{{ route('profile') }}"
       class="bottom-nav-item {{ request()->routeIs('profile') ? 'active' : '' }}">
        <i class='bx {{ request()->routeIs("profile") ? "bxs-user" : "bx-user" }}'></i>
        <span>Profile</span>
    </a>

</div>

<style>

/* =========================
   FLOATING BOTTOM NAV
========================= */

.bottom-nav{

    position:fixed;

    left:50%;
    bottom:20px;

    transform:translateX(-50%);

    width:auto;
    max-width:420px;

    display:flex;
    align-items:center;
    gap:4px;

    padding:8px 12px;

    background:rgba(255,255,255,0.92);

    backdrop-filter:blur(20px);
    -webkit-backdrop-filter:blur(20px);

    border:1px solid rgba(0,0,0,.06);

    border-radius:999px;

    box-shadow:
        0 8px 32px rgba(0,0,0,.10),
        0 2px 8px rgba(0,0,0,.04);

    z-index:9999;
}

/* =========================
   NAV ITEM
========================= */

.bottom-nav-item{

    text-decoration:none;

    display:flex;
    flex-direction:column;
    align-items:center;
    gap:2px;

    padding:10px 20px;

    border-radius:999px;

    color:#9CA3AF;

    font-size:11px;
    font-weight:500;

    transition:all .25s cubic-bezier(0.4, 0, 0.2, 1);

    white-space:nowrap;

    position:relative;
}

.bottom-nav-item i{
    font-size:20px;
    line-height:1;
}

/* HOVER */

.bottom-nav-item:hover{

    color:#E28743;

    background:rgba(226,135,67,.06);
}

/* ACTIVE */

.bottom-nav-item.active{

    background:linear-gradient(
        135deg,
        #E28743,
        #D47735
    );

    color:white;

    box-shadow:
        0 4px 16px rgba(226,135,67,.30);
}

/* =========================
   MOBILE
========================= */

@media(max-width:768px){

    .bottom-nav{

        bottom:14px;

        width:92%;
        max-width:none;

        justify-content:space-around;

        padding:6px 8px;

        gap:2px;

    }

    .bottom-nav-item{

        flex:1;

        text-align:center;

        padding:8px 6px;

        font-size:10px;
    }

    .bottom-nav-item i{
        font-size:18px;
    }

}

/* =========================
   SAFE SPACE
========================= */

body{

    padding-bottom:100px;

}

</style>