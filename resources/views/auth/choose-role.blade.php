<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta
    name="viewport"
    content="width=device-width, initial-scale=1.0">

<title>Pilih Jenis Akun</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI',sans-serif;
}

body{

    min-height:100vh;

    background:
    radial-gradient(
        circle at top right,
        rgba(255,170,50,.18),
        transparent 25%
    ),
    linear-gradient(
        135deg,
        #2A1606,
        #5C310C,
        #7A430F
    );

    display:flex;

    justify-content:center;

    align-items:center;

    padding:40px 20px;
}

/* =========================
   CONTAINER
========================= */

.role-container{

    width:100%;

    max-width:1200px;
}

/* =========================
   BACK BUTTON
========================= */

.back-btn{

    position:absolute;

    top:30px;

    left:30px;

    display:flex;

    align-items:center;

    gap:8px;

    padding:12px 18px;

    text-decoration:none;

    color:white;

    font-size:14px;

    font-weight:600;

    border-radius:14px;

    background:
    rgba(255,255,255,.08);

    backdrop-filter:blur(10px);

    border:1px solid rgba(255,255,255,.08);

    transition:.3s ease;
}

.back-btn:hover{

    transform:translateX(-4px);

    background:
    rgba(255,255,255,.12);
}

/* =========================
   HEADER
========================= */

.role-header{

    text-align:center;

    margin-bottom:50px;
}

.logo-box{

    width:85px;
    height:85px;

    margin:0 auto 25px;

    border-radius:22px;

    background:
    rgba(255,255,255,.08);

    backdrop-filter:blur(10px);

    display:flex;

    align-items:center;
    justify-content:center;

    border:1px solid rgba(255,255,255,.08);

    box-shadow:
        0 10px 30px rgba(0,0,0,.15);
}

.logo-box img{

    width:60px;
}

.role-badge{

    display:inline-block;

    padding:10px 18px;

    border-radius:999px;

    background:
    rgba(255,165,0,.15);

    color:#FFBC68;

    font-size:13px;

    font-weight:700;

    border:1px solid rgba(255,188,104,.15);

    margin-bottom:20px;
}

.role-header h1{

    font-size:52px;

    font-weight:800;

    color:white;

    margin-bottom:15px;
}

.role-header p{

    color:rgba(255,255,255,.75);

    font-size:16px;

    line-height:1.8;

    max-width:650px;

    margin:auto;
}

/* =========================
   GRID
========================= */

.role-grid{

    display:grid;

    grid-template-columns:1fr 1fr;

    gap:30px;
}

/* =========================
   CARD
========================= */

.role-card{

    text-decoration:none;

    background:
    rgba(255,255,255,.08);

    backdrop-filter:blur(15px);

    border:1px solid rgba(255,255,255,.08);

    border-radius:32px;

    padding:35px;

    transition:.3s ease;

    overflow:hidden;

    position:relative;
}

.role-card:hover{

    transform:translateY(-8px);

    border-color:#FF9B28;

    box-shadow:
        0 20px 40px rgba(255,140,0,.18);
}

.role-card::before{

    content:"";

    position:absolute;

    top:-50px;
    right:-50px;

    width:120px;
    height:120px;

    border-radius:50%;

    background:
    rgba(255,255,255,.05);
}

/* =========================
   ICON
========================= */

.role-icon{

    width:90px;
    height:90px;

    border-radius:24px;

    display:flex;

    justify-content:center;

    align-items:center;

    font-size:42px;

    margin-bottom:25px;
}

.customer-icon{

    background:
    rgba(255,255,255,.12);
}

.provider-icon{

    background:
    rgba(255,180,70,.12);
}

/* =========================
   TITLE
========================= */

.role-card h2{

    color:white;

    font-size:30px;

    margin-bottom:15px;
}

.role-card p{

    color:rgba(255,255,255,.75);

    line-height:1.8;

    margin-bottom:25px;
}

/* =========================
   FEATURES
========================= */

.role-features{

    list-style:none;

    margin-bottom:30px;
}

.role-features li{

    color:#F7E9D5;

    margin-bottom:14px;

    font-size:15px;
}

/* =========================
   BUTTON
========================= */

.role-btn{

    width:100%;

    height:58px;

    border:none;

    border-radius:16px;

    font-size:15px;

    font-weight:700;

    cursor:pointer;
}

.customer-btn{

    background:
    linear-gradient(
        135deg,
        #FFA94D,
        #FF7A00
    );

    color:white;
}

.provider-btn{

    background:
    rgba(255,255,255,.10);

    border:1px solid rgba(255,255,255,.12);

    color:#FF9B28;
}

/* =========================
   LOGIN
========================= */

.login-text{

    margin-top:40px;

    text-align:center;

    color:rgba(255,255,255,.75);

    font-size:15px;
}

.login-text a{

    color:#FFB85C;

    text-decoration:none;

    font-weight:700;
}

/* =========================
   MOBILE
========================= */

@media(max-width:768px){

    .role-grid{

        grid-template-columns:1fr;
    }

    .role-header h1{

        font-size:38px;
    }

    .role-card{

        padding:28px;
    }

}

</style>

</head>

<body>

    <a href="/" class="back-btn">

    ← Kembali ke Landing Page

</a>

<div class="role-container">

    <div class="role-header">

        <div class="logo-box">

            <img
                src="{{ asset('assets/images/logo.png') }}"
                alt="Servio">

        </div>

        <div class="role-badge">

            SERVIO PLATFORM

        </div>

        <h1>

            Bergabung Dengan Servio

        </h1>

        <p>

            Pilih bagaimana Anda ingin menggunakan
            Servio dan mulai nikmati pengalaman
            layanan rumah tangga yang lebih mudah,
            aman, dan terpercaya.

        </p>

    </div>

    <div class="role-grid">

        <!-- CUSTOMER -->

        <a href="/register-customer"
            class="role-card">

            <div class="role-icon customer-icon">

                👤

            </div>

            <h2>

                Pemesan Layanan

            </h2>

            <p>

                Cari teknisi terpercaya,
                booking layanan dengan cepat,
                serta pantau progres pengerjaan
                secara real-time.

            </p>

            <ul class="role-features">

                <li>✓ Booking layanan online</li>

                <li>✓ Tracking progres pekerjaan</li>

                <li>✓ Chat dengan penyedia</li>

                <li>✓ Pembayaran digital</li>

            </ul>

            <button class="role-btn customer-btn">

                Daftar Sebagai Pelanggan

            </button>

        </a>

        <!-- PROVIDER -->

        <a
            href="{{ route('provider.register') }}"
            class="role-card">

            <div class="role-icon provider-icon">

                🛠️

            </div>

            <h2>

                Penyedia Layanan

            </h2>

            <p>

                Daftarkan usaha Anda,
                jangkau pelanggan baru,
                dan kelola pesanan dalam
                satu platform terintegrasi.

            </p>

            <ul class="role-features">

                <li>✓ Kelola pesanan pelanggan</li>

                <li>✓ Analitik performa usaha</li>

                <li>✓ Pengaturan jadwal teknisi</li>

                <li>✓ Tingkatkan visibilitas bisnis</li>

            </ul>

            <button class="role-btn provider-btn">

                Daftar Sebagai Penyedia

            </button>

        </a>

    </div>

    <div class="login-text">

        Sudah punya akun?

        <a href="{{ route('login') }}">

            Masuk

        </a>

    </div>

</div>

</body>
</html>