
<div class="sidebar">

    <!-- LOGO -->

    <div class="logo-section">

        <div class="logo-circle">
            <img src="{{ asset('assets/images/logo.png') }}" alt="Logo">
        </div>

        <div class="logo-text">
            ervio
        </div>

    </div>

    <!-- PROFILE -->

    <div class="profile-section">

        <div class="profile-image">

            <img
                src="{{ Auth::user()?->profile_photo
                    ? asset('storage/' . Auth::user()->profile_photo)
                    : 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()?->name ?? 'User')
                }}"
                alt="Profile">

        </div>

        <div class="profile-info">

            <div class="profile-name">
                {{ Auth::user()?->name ?? 'Admin' }}
            </div>

            <div class="profile-role">
                Administrator
            </div>

        </div>

        <div class="profile-dropdown">

            <span class="dropdown-arrow">
                ▼
            </span>

            <div class="dropdown-menu">

                <a href="{{ route('admin.profile') }}">
                    Profile
                </a>

                <form action="{{ route('logout') }}" method="POST" style="margin:0;padding:0;">
                    @csrf
                    <button type="submit" style="background:none;border:none;width:100%;text-align:left;padding:8px 15px;color:#EF4444;font-weight:600;cursor:pointer;font-size:14px;">🚪 Logout</button>
                </form>

            </div>

        </div>

    </div>

    <!-- MENU -->

    <div class="menu-section">

        <a href="/admin/dashboard"
            class="menu-item {{ request()->is('admin/dashboard') ? 'active' : '' }}">
            <div class="menu-icon">
                <i class='bx bx-grid-alt'></i>
            </div>

            <span>
                Dashboard
            </span>

        </a>

        <a href="{{ url('/admin/providers') }}"
           class="menu-item {{ request()->is('admin/providers') ? 'active' : '' }}">
            <div class="menu-icon">
                <i class='bx bx-wrench'></i>
                
            </div>

            <span>
                Penyedia Layanan
            </span>

        </a>

        <a href="{{ url('/admin/Kategori_Layanan/categories') }}"
           class="menu-item {{ request()->is('admin/Kategori_Layanan/categories') ? 'active' : '' }}">
            <div class="menu-icon">
                <i class='bx bx-category'></i>
                
            </div>

            <span>
                Kategori Layanan
            </span>

        </a>

        <a href="{{ url('/admin/chat/chat') }}"
           class="menu-item {{ request()->is('admin/chat/chat') ? 'active' : '' }}">
            <div class="menu-icon">
                <i class='bx bx-message-rounded-dots'></i>
                
            </div>

            <span>
                Chat
            </span>

        </a>

        <a href="{{ route('admin.revenue') }}"
           class="menu-item {{ request()->is('admin/revenue') ? 'active' : '' }}">
            <div class="menu-icon">
                <i class='bx bx-wallet'></i>
            </div>

            <span>
                ServioPay Ledger
            </span>

        </a>

    </div>

</div>

