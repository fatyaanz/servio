
<div class="sidebar">

    <!-- LOGO -->

    <div class="logo-section">

        <div class="logo-circle">
            <img src="{{ asset('assets/images/logoservio.png') }}" alt="Logo">
        </div>

        <div class="logo-text">
            ervio
        </div>

    </div>

    <!-- PROFILE -->

    <div class="profile-section">

        <img
            src="{{ Auth::user()->profile_photo
                ? asset('storage/' . Auth::user()->profile_photo)
                : 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name)
            }}"
            class="profile-img"
        >

        <div class="profile-info">

            <div class="profile-name">
                {{ Auth::user()->name }}
            </div>

            <div class="profile-role">
                Provider
            </div>
        </div>

        <div class="profile-dropdown">

            <span class="dropdown-arrow">
                ▼
            </span>

            <div class="dropdown-menu">

                <a href="#" onclick="openProfileModal(); return false;">
                    Profile
                </a>

                <form action="{{ route('logout') }}" method="POST" style="margin:0;padding:0;">
                    @csrf
                    <button type="submit" style="background:none;border:none;width:100%;text-align:left;padding:12px 14px;color:#EF4444;font-weight:600;cursor:pointer;font-size:13px;">🚪 Logout</button>
                </form>

            </div>

        </div>

    </div>

    <!-- MENU -->

    <div class="menu-section">

        <a href="{{ url('/provider/Dashboard/dashboard') }}"
           class="menu-item {{ request()->is('provider/Dashboard/dashboard') ? 'active' : '' }}">

            <div class="menu-icon">
                🏠
            </div>

            <span>
                Dashboard
            </span>

        </a>

       <a href="{{ url('/provider/pesanan') }}"
            class="menu-item {{ request()->is('provider/pesanan') ? 'active' : '' }}">

            <div class="menu-icon">
                📦
            </div>

            <span>
                Pesanan
            </span>

        </a>

        <a href="{{ url('/provider/produk') }}"
            class="menu-item {{ request()->is('provider/produk') ? 'active' : '' }}">

            <div class="menu-icon">
                🛒
            </div>

            <span>
                Produk
            </span>

        </a>

        <a href="{{ url('/provider/layanan/layanan') }}"
           class="menu-item {{ request()->is('provider/layanan/layanan') ? 'active' : '' }}">

            <div class="menu-icon">
                🛠️
            </div>

            <span>
                Layanan
            </span>

        </a>

        <a href="{{ route('provider.ulasan') }}"
           class="menu-item {{ request()->routeIs('provider.ulasan') ? 'active' : '' }}">

            <div class="menu-icon">
                ⭐
            </div>

            <span>
                Ulasan Toko
            </span>

        </a>

        <a href="{{ url('/provider/chat/chat') }}"
           class="menu-item {{ request()->is('provider/chat/chat') ? 'active' : '' }}">

            <div class="menu-icon">
                💬
            </div>

            <span>
                Chat
            </span>

        </a>

        <a href="{{ route('notifications.index') }}"
           class="menu-item {{ request()->routeIs('notifications.index') ? 'active' : '' }}">

            <div class="menu-icon">
                🔔
            </div>

            <span>
                Notifikasi
            </span>

            @php
                $unreadProviderNotifs = \App\Models\Notification::where('user_id', auth()->id())->where('is_read', false)->count();
            @endphp
            @if($unreadProviderNotifs > 0)
                <span style="background: #EF4444; color: white; border-radius: 50%; font-size: 10px; width: 18px; height: 18px; display: flex; align-items: center; justify-content: center; font-weight: bold; margin-left: auto; line-height: 1;">
                    {{ $unreadProviderNotifs }}
                </span>
            @endif

        </a>

        <a href="{{ url('/provider/transaksi') }}"
           class="menu-item {{ request()->is('provider/transaksi*') ? 'active' : '' }}">

            <div class="menu-icon">
                💰
            </div>

            <span>
                Transaksi
            </span>

        </a>

    </div>

</div>

<style>

    *{
        margin:0;
        padding:0;
        box-sizing:border-box;
        font-family:'Poppins',sans-serif;
    }

    body{
        background:#f5f7fb;
    }

    /* =========================
        SIDEBAR
    ========================== */

    .sidebar{

        position:fixed;
        top:0;
        left:0;

        width:240px;
        height:100vh;

        overflow:hidden;

        z-index:1000;

        background:rgba(255,255,255,0.92);

        backdrop-filter:blur(18px);
        -webkit-backdrop-filter:blur(18px);

        border-right:1px solid rgba(255,255,255,0.4);

        padding:24px 16px;

        display:flex;
        flex-direction:column;

        border-top-right-radius:28px;
        border-bottom-right-radius:28px;

        box-shadow:
        0 10px 30px rgba(15,23,42,0.08);

    }

    /* =========================
        LOGO
    ========================== */

    .logo-section{

        display:flex;
        align-items:center;
        gap:8px;

        margin-bottom:32px;

        padding-left:4px;

    }

    .logo-circle{

        width:52px;
        height:52px;

        border-radius:16px;

        background:white;

        display:flex;
        justify-content:center;
        align-items:center;

        overflow:hidden;

        box-shadow:
        0 6px 18px rgba(255,122,0,0.12);

    }

    .logo-circle img{
        width:80%;
        height:80%;
        object-fit:contain;
    }

    .logo-text{

        font-size:30px;
        font-weight:800;

        color:#f59e0b;

        letter-spacing:1px;

    }

    /* =========================
        PROFILE
    ========================== */

    .profile-section{

        display:flex;
        align-items:center;
        gap:10px;

        padding:12px;

        background:#fff7ed;

        border-radius:18px;

        margin-bottom:28px;

        position:relative;

    }

    .profile-img{

        width:46px;
        height:46px;

        border-radius:50%;

        object-fit:cover;

        border:3px solid white;

    }

    .profile-info{
        flex:1;
    }

    .profile-name{

        font-size:14px;
        font-weight:700;

        color:#1f2937;

        margin-bottom:2px;

    }

    .profile-role{

        font-size:11px;
        color:#9ca3af;

    }

    .profile-dropdown{
        position:relative;
        cursor:pointer;
    }

    .dropdown-arrow{

        font-size:10px;
        color:#6b7280;

    }

    .dropdown-menu{

        position:absolute;

        top:24px;
        right:0;

        background:white;

        border-radius:14px;

        min-width:140px;

        overflow:hidden;

        box-shadow:
        0 10px 30px rgba(15,23,42,0.10);

        opacity:0;
        visibility:hidden;

        transition:0.25s ease;

        z-index:999;

    }

    .dropdown-menu a{

        display:block;

        padding:12px 14px;

        text-decoration:none;

        color:#374151;

        font-size:13px;

        transition:0.2s;

    }

    .dropdown-menu a:hover{
        background:#fff7ed;
        color:#ff7a00;
    }

    .profile-dropdown:hover .dropdown-menu{
        opacity:1;
        visibility:visible;
    }

    /* =========================
        MENU
    ========================== */

    .menu-section{

        display:flex;
        flex-direction:column;
        gap:10px;

    }

    .menu-item{

        position:relative;

        display:flex;
        align-items:center;
        gap:14px;

        padding:15px 16px;

        border-radius:16px;

        text-decoration:none;

        color:#6b7280;

        font-size:14px;
        font-weight:500;

        transition:0.3s ease;

        overflow:hidden;

    }

    .menu-item::before{

        content:'';

        position:absolute;

        left:0;
        top:50%;

        transform:translateY(-50%);

        width:0;
        height:60%;

        background:#ff7a00;

        border-radius:0 10px 10px 0;

        transition:0.3s ease;

    }

    .menu-item:hover{

        background:#fff7ed;

        color:#ff7a00;

        transform:translateX(4px);

    }

    .menu-item.active{

        background:linear-gradient(
            90deg,
            rgba(255,122,0,0.14),
            rgba(255,176,102,0.10)
        );

        color:#ff7a00;

        font-weight:700;

        box-shadow:
        0 6px 18px rgba(255,122,0,0.10);

    }

    .menu-item.active::before{
        width:5px;
    }

    .menu-icon{

        width:22px;

        display:flex;
        justify-content:center;
        align-items:center;

        font-size:18px;

    }

    /* =========================
        MAIN CONTENT
    ========================== */

    .main-content{
        margin-left:240px;
        padding:24px;
        min-height:100vh;
    }

    /* =========================
        RESPONSIVE
    ========================== */

    @media(max-width:768px){

        .sidebar{
            width:220px;
        }

        .main-content{
            margin-left:220px;
        }

        .logo-text{
            font-size:26px;
        }

    }

</style>
@include('provider.components.modal-profile')