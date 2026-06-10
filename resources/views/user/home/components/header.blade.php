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
    max-width:1400px;

    margin:20px auto 0;

    padding:0 30px;

    display:flex;
    justify-content:space-between;
    align-items:center;
}

/* =========================
   LOGO
========================= */

.logo-section{
    display:flex;
    align-items:center;
    gap:2;
}

.logo-section img{
    height:60px;
    width:auto;

    object-fit:contain;

    transition:.3s ease;
}

.logo-section img:hover{
    transform:scale(1.03);
}

.brand-text{
    font-size:30px;
    font-weight:800;
    color:#F08A28;

    margin-left:-5px;
}

/* =========================
   RIGHT SECTION
========================= */

.header-right{
    display:flex;
    align-items:center;
    gap:15px;
}

/* =========================
   LOCATION
========================= */

.location{
    display:flex;
    align-items:center;
    gap:8px;

    padding:12px 18px;

    border-radius:999px;

    background:rgba(255,255,255,0.75);

    backdrop-filter:blur(18px);
    -webkit-backdrop-filter:blur(18px);

    border:1px solid rgba(255,255,255,0.4);

    box-shadow:
        0 6px 20px rgba(0,0,0,0.06);

    cursor:pointer;

    transition:.3s ease;
}

.location:hover{
    transform:translateY(-2px);

    box-shadow:
        0 10px 25px rgba(0,0,0,0.08);
}

.location-icon{
    font-size:16px;
}

.location-text{
    font-size:15px;
    font-weight:600;
    color:#333;
}

.dropdown-icon{
    color:#666;

    transition:.3s ease;
}

.location:hover .dropdown-icon{
    transform:rotate(180deg);
}

/* =========================
   NOTIFICATION
========================= */

.notification{
    width:48px;
    height:48px;

    display:flex;
    justify-content:center;
    align-items:center;

    border-radius:50%;

    background:rgba(255,255,255,0.75);

    backdrop-filter:blur(18px);
    -webkit-backdrop-filter:blur(18px);

    border:1px solid rgba(255,255,255,0.4);

    box-shadow:
        0 6px 20px rgba(0,0,0,0.06);

    font-size:20px;

    cursor:pointer;

    transition:.3s ease;
}

.notification:hover{
    transform:translateY(-2px);

    box-shadow:
        0 10px 25px rgba(240,138,40,0.15);
}

/* =========================
   TABLET
========================= */

@media (max-width:1024px){

    .home-header{
        padding:0 20px;
    }

    .logo-section img{
        height:55px;
    }

    .brand-text{
        font-size:26px;
    }

}

/* =========================
   MOBILE
========================= */

@media (max-width:768px){

    .home-header{
        padding:0 15px;
    }

    .logo-section{
        gap:8px;
    }

    .logo-section img{
        height:48px;
    }

    .brand-text{
        font-size:22px;
    }

    .header-right{
        gap:10px;
    }

    .location{
        padding:10px 14px;
    }

    .location-text{
        font-size:13px;
    }

    .notification{
        width:42px;
        height:42px;
        font-size:18px;
    }

}

/* =========================
   MOBILE KECIL
========================= */

@media (max-width:480px){

    .logo-section img{
        height:42px;
    }

    .brand-text{
        font-size:18px;
    }

    .location{
        padding:8px 12px;
        gap:6px;
    }

    .location-text{
        font-size:12px;
    }

    .notification{
        width:38px;
        height:38px;
        font-size:16px;
    }

}

</style>