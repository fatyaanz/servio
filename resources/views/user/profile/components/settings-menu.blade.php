<div class="menu-card">

    <h3>
        Pengaturan
    </h3>

    <button
    class="menu-item"
    onclick="openNotificationModal()">

        <div class="menu-left">

            <div class="menu-icon">
                🔔
            </div>

            <div class="menu-text">

                <span class="menu-title">
                    Notifikasi
                </span>

                <small>
                    Atur pemberitahuan pesanan dan promo
                </small>

            </div>

        </div>

        <span class="menu-arrow">
            ›
        </span>

    </button>

    <button class="menu-item">

        <div class="menu-left">

            <div class="menu-icon">
                🔒
            </div>

            <div class="menu-text">

                <span class="menu-title">
                    Keamanan Akun
                </span>

                <small>
                    Kelola password dan keamanan akun
                </small>

            </div>

        </div>

        <span class="menu-arrow">
            ›
        </span>

    </button>

    <button
    class="menu-item"
    onclick="openThemeModal()">

        <div class="menu-left">

            <div class="menu-icon">
                🌙
            </div>

            <div class="menu-text">

                <span class="menu-title">
                     Tema
                </span>

                <small>
                    ganti warna thema
                </small>

            </div>

        </div>

        <span class="menu-arrow">
            ›
        </span>

    </button>

</div>

<style>
    .menu-item{

    width:100%;

    display:flex;

    align-items:center;

    justify-content:space-between;

    padding:18px;

    border:none;

    background:transparent;

    border-radius:18px;

    cursor:pointer;

    transition:.3s ease;
}

.menu-item:hover{

    background:#FFF8F1;
}

.menu-left{

    display:flex;

    align-items:center;

    gap:15px;
}

.menu-icon{

    width:48px;
    height:48px;

    border-radius:14px;

    background:#FFF5EA;

    display:flex;

    align-items:center;
    justify-content:center;

    font-size:20px;
}

.menu-title{

    display:block;

    font-weight:700;

    color:#222;
}

.menu-text small{

    color:#888;

    font-size:13px;
}

.menu-arrow{

    font-size:24px;

    color:#C5C5C5;
}
</style>