<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">

<meta
    name="viewport"
    content="width=device-width, initial-scale=1.0">

<title>Daftar Pelanggan</title>

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

    padding:30px;
}

/* =========================
   CARD
========================= */

.register-card{

    width:100%;

    max-width:550px;

    background:
    rgba(255,255,255,.06);

    backdrop-filter:blur(20px);

    border:1px solid rgba(255,255,255,.08);

    border-radius:28px;

    padding:35px;

    position:relative;

    overflow:hidden;

    box-shadow:
        0 20px 50px rgba(0,0,0,.25);
}

.register-card::before{

    content:"";

    position:absolute;

    top:-50px;
    right:-50px;

    width:140px;
    height:140px;

    border-radius:50%;

    background:
    rgba(255,255,255,.05);
}

/* =========================
   BACK
========================= */

.back-link{

    color:white;

    text-decoration:none;

    font-size:14px;

    font-weight:600;
}

/* =========================
   LOGO
========================= */

.logo-box{

    width:70px;
    height:70px;

    margin:20px 0;

    border-radius:18px;

    background:
    rgba(255,255,255,.08);

    display:flex;

    align-items:center;

    justify-content:center;

    font-size:34px;
}

/* =========================
   TITLE
========================= */

.register-card h1{

    color:white;

    font-size:42px;

    margin-bottom:10px;
}

.subtitle{

    color:rgba(255,255,255,.75);

    line-height:1.8;

    margin-bottom:30px;
}

/* =========================
   FORM
========================= */

.form-group{

    margin-bottom:18px;
}

.form-group label{

    display:block;

    margin-bottom:8px;

    color:white;

    font-size:14px;

    font-weight:600;
}

.form-group input{

    width:100%;

    height:55px;

    padding:0 18px;

    border:none;

    outline:none;

    border-radius:14px;

    background:
    rgba(255,255,255,.10);

    color:white;

    font-size:14px;

    border:1px solid rgba(255,255,255,.08);
}

.form-group input::placeholder{

    color:rgba(255,255,255,.55);
}

/* =========================
   CHECKBOX
========================= */

.checkbox-group{

    display:flex;

    gap:10px;

    align-items:flex-start;

    margin-top:10px;

    margin-bottom:25px;
}

.checkbox-group input{

    margin-top:3px;
}

.checkbox-group label{

    color:rgba(255,255,255,.75);

    font-size:14px;

    line-height:1.7;
}

/* =========================
   BUTTON
========================= */

.register-btn{

    width:100%;

    height:58px;

    display:flex;

    align-items:center;

    justify-content:center;

    text-decoration:none;

    border:none;

    border-radius:16px;

    background:
    linear-gradient(
        135deg,
        #FFA94D,
        #FF7A00
    );

    color:white;

    font-size:16px;

    font-weight:700;

    cursor:pointer;

    transition:.3s ease;

    margin-top:5px;
}

.register-btn:hover{

    transform:translateY(-2px);

    box-shadow:
        0 10px 25px rgba(255,122,0,.35);
}

/* =========================
   LOGIN
========================= */

.login-text{

    text-align:center;

    margin-top:20px;

    color:rgba(255,255,255,.75);

    font-size:14px;
}

.login-text a{

    color:#FFBC68;

    text-decoration:none;

    font-weight:700;
}

</style>

</head>

<body>

    <div class="register-card">

        <a
            href="{{ url('/') }}"
            class="back-link">

            ← Kembali ke Landing Page

        </a>

        <div class="logo-box">

            👤

        </div>

        <h1>

            Daftar Pelanggan

        </h1>

        <p class="subtitle">

            Lengkapi data berikut untuk mulai
            menggunakan layanan Servio.

        </p>

        <form
            action="{{ route('customer.register.store') }}"
            method="POST"
        >
            @csrf

            <div class="form-group">

                <label>

                    Nama Lengkap

                </label>

                <input
                    type="text"
                        name="name"
                        placeholder="Masukkan nama lengkap">

            </div>

            <div class="form-group">

                <label>

                    Email

                </label>

                <input
                    type="email"
                    name="email"
                    placeholder="Masukkan email">

            </div>

            <div class="form-group">

                <label>

                    Nomor HP

                </label>

                <input
                   type="text"
                        name="phone"
                        placeholder="Masukkan nomor hp">

            </div>

            <div class="form-group">

                <label>

                    Password

                </label>

                <input
                     type="password"
                        name="password"
                        placeholder="Masukkan password">

            </div>

            <div class="form-group">

                <label>

                    Konfirmasi Password

                </label>

                <input
                    type="password"
                        name="password_confirmation"
                        placeholder="Masukkan ulang password">

            </div>

            <div class="checkbox-group">

                <input type="checkbox">

                <label>

                    Saya menyetujui
                    syarat dan ketentuan
                    yang berlaku di Servio.

                </label>

            </div>

            <button
                type="submit"
                class="register-btn"
            >
                Daftar Sekarang
            </button>

        </form>

        <div class="login-text">

            Sudah punya akun?

            <a href="{{ route('login') }}">

                Masuk

            </a>

        </div>

    </div>

</body>
</html>