
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
                Admin Servio
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

                <a href="{{ url('/login') }}">
                    Logout
                </a>

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

    </div>

</div>

