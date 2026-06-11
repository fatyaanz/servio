<div class="home-header">

    <div class="logo-section">

        <img src="{{ asset('assets/images/logo.png') }}" alt="Servio Logo">

        <div class="brand-text">
            ervio
        </div>

    </div>

    <div class="header-right">

        <div class="location">

            <span class="location-icon">📍</span>

            <span class="location-text">
                Bandung
            </span>

            <svg class="dropdown-icon"
                 width="12"
                 height="12"
                 viewBox="0 0 24 24"
                 fill="none">

                <path
                    d="M6 9L12 15L18 9"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"/>

            </svg>

        </div>

        <div class="notification">
            🔔
        </div>

    </div>

</div>

<style>

/* =========================
   HEADER
========================= */

.home-header{

    display:flex;

    justify-content:space-between;
    align-items:center;

    margin-bottom:24px;

}

/* =========================
   LOGO
========================= */

.logo-section{

    display:flex;

    align-items:center;

    gap:8px;

}

.logo-section img{

    width:42px;
    height:42px;

    object-fit:contain;

}

.brand-text{

    font-size:28px;

    font-weight:700;

    color:var(--primary);

    margin-left:-4px;

}

/* =========================
   RIGHT
========================= */

.header-right{

    display:flex;

    align-items:center;

    gap:12px;

}

/* =========================
   LOCATION
========================= */

.location{

    display:flex;

    align-items:center;

    gap:8px;

    padding:10px 14px;

    background:white;

    border:1px solid var(--border);

    border-radius:12px;

    box-shadow:var(--shadow-sm);

    cursor:pointer;

}

.location-icon{

    font-size:14px;

}

.location-text{

    font-size:13px;

    font-weight:600;

    color:var(--text-dark);

}

.dropdown-icon{

    color:var(--text-secondary);

}

/* =========================
   NOTIFICATION
========================= */

.notification{

    width:42px;
    height:42px;

    display:flex;

    justify-content:center;
    align-items:center;

    background:white;

    border:1px solid var(--border);

    border-radius:12px;

    box-shadow:var(--shadow-sm);

    cursor:pointer;

    font-size:18px;

}

/* =========================
   MOBILE
========================= */

@media(max-width:768px){

    .brand-text{

        font-size:24px;

    }

    .location{

        padding:8px 12px;

    }

}

</style>