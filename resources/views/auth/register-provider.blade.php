<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Register Provider - Servio
    </title>

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial, sans-serif;
        }

        body{

            min-height:100vh;

            display:flex;

            justify-content:center;
            align-items:center;

            padding:40px 20px;

            background:
            radial-gradient(circle at top left,#ffb066,transparent 30%),
            radial-gradient(circle at bottom right,#ff7a00,transparent 25%),
            linear-gradient(
                135deg,
                #1d1915,
                #2a2119,
                #3a3126
            );

        }

        /* =========================
            REGISTER CARD
        ========================= */

        .register-card{

            width:100%;
            max-width:520px;

            background:rgba(255,122,0,0.18);

            backdrop-filter:blur(18px);
            -webkit-backdrop-filter:blur(18px);

            border:1px solid rgba(255,255,255,0.15);

            padding:40px;

            border-radius:28px;

            box-shadow:
            0 8px 32px rgba(0,0,0,0.35),
            inset 0 0 12px rgba(255,255,255,0.08);

            position:relative;

            overflow:hidden;

        }

        .register-card::before{

            content:'';

            position:absolute;

            top:-80px;
            right:-80px;

            width:180px;
            height:180px;

            background:rgba(255,255,255,0.08);

            border-radius:50%;

        }

        /* =========================
            BACK BUTTON
        ========================= */

        .back-btn{

            display:inline-flex;

            align-items:center;

            gap:8px;

            margin-bottom:24px;

            color:#ffe1c2;

            text-decoration:none;

            font-size:14px;
            font-weight:600;

            transition:0.25s ease;

            position:relative;
            z-index:2;

        }

        .back-btn:hover{

            color:white;

            transform:translateX(-2px);

        }

        /* =========================
            LOGO
        ========================= */

        .logo-circle{

            width:70px;
            height:70px;

            border-radius:20px;

            background:rgba(255,255,255,0.18);

            backdrop-filter:blur(12px);
            -webkit-backdrop-filter:blur(12px);

            border:1px solid rgba(255,255,255,0.18);

            display:flex;

            justify-content:center;
            align-items:center;

            overflow:hidden;

            box-shadow:
            0 8px 20px rgba(0,0,0,0.18),
            inset 0 0 8px rgba(255,255,255,0.12);

            margin-bottom:24px;

            position:relative;
            z-index:2;

        }

        .logo-circle img{

            width:80%;
            height:80%;

            object-fit:contain;

        }

        /* =========================
            TITLE
        ========================= */

        .title{

            font-size:40px;
            font-weight:800;

            color:white;

            margin-bottom:10px;

            position:relative;
            z-index:2;

        }

        .subtitle{

            color:#ffe1c2;

            margin-bottom:32px;

            line-height:1.7;

            position:relative;
            z-index:2;

        }

        /* =========================
            INPUT GROUP
        ========================= */

        .input-group{

            margin-bottom:20px;

            position:relative;
            z-index:2;

        }

        .input-label{

            display:block;

            margin-bottom:10px;

            color:white;

            font-size:14px;
            font-weight:700;

        }

        /* =========================
            INPUT
        ========================= */

        .input-field{

            width:100%;

            padding:16px;

            border:none;

            outline:none;

            border-radius:16px;

            background:rgba(255,255,255,0.12);

            color:white;

            border:1px solid rgba(255,255,255,0.1);

            transition:0.3s;

            font-size:15px;

        }

        .input-field::placeholder{
            color:#f8d5b2;
        }

        .input-field:focus{

            border:1px solid #ffb066;

            box-shadow:
            0 0 15px rgba(255,176,102,0.35);

            background:rgba(255,255,255,0.16);

        }

        /* =========================
            SELECT
        ========================= */

        .select-field{

            width:100%;

            padding:16px;
            padding-right:55px;

            border:none;

            outline:none;

            border-radius:16px;

            background:rgba(255,255,255,0.12);

            color:white;

            border:1px solid rgba(255,255,255,0.1);

            transition:0.3s;

            font-size:15px;

            appearance:none;
            -webkit-appearance:none;
            -moz-appearance:none;

            background-image:url(
                "data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='white' viewBox='0 0 16 16'%3E%3Cpath fill-rule='evenodd' d='M1.646 5.646a.5.5 0 0 1 .708 0L8 11.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3E%3C/svg%3E"
            );

            background-repeat:no-repeat;

            background-position:right 22px center;

        }

        .select-field option{

            background:#2a2119;

            color:white;

        }

        /* =========================
            TEXTAREA
        ========================= */

        .textarea-field{

            width:100%;

            min-height:110px;

            padding:16px;

            border:none;

            outline:none;

            border-radius:16px;

            background:rgba(255,255,255,0.12);

            color:white;

            border:1px solid rgba(255,255,255,0.1);

            resize:none;

            font-size:15px;

        }

        .textarea-field::placeholder{
            color:#f8d5b2;
        }

        .textarea-field:focus{

            border:1px solid #ffb066;

            box-shadow:
            0 0 15px rgba(255,176,102,0.35);

        }

        /* =========================
            FILE INPUT
        ========================= */

        .file-field{

            width:100%;

            padding:14px;

            border-radius:16px;

            background:rgba(255,255,255,0.12);

            border:1px solid rgba(255,255,255,0.1);

            color:white;

            cursor:pointer;

        }

        .file-field::file-selector-button{

            border:none;

            padding:10px 14px;

            border-radius:12px;

            background:#ffb066;

            color:white;

            font-weight:600;

            margin-right:12px;

            cursor:pointer;

        }

        /* =========================
            APPROVAL INFO
        ========================= */

        .approval-info{

            margin-top:24px;

            padding:18px;

            border-radius:18px;

            background:rgba(255,255,255,0.08);

            border:1px solid rgba(255,255,255,0.08);

            color:#ffe1c2;

            font-size:14px;

            line-height:1.7;

            position:relative;
            z-index:2;

        }

        /* =========================
            BUTTON
        ========================= */

        .register-btn{

            width:100%;

            padding:17px;

            border:none;

            border-radius:16px;

            background:linear-gradient(
                to right,
                #ffb066,
                #ff7a00
            );

            color:white;

            font-size:16px;
            font-weight:700;

            margin-top:24px;

            cursor:pointer;

            transition:0.3s;

            box-shadow:
            0 8px 20px rgba(255,122,0,0.35);

            position:relative;
            z-index:2;

        }

        .register-btn:hover{

            transform:translateY(-2px);

            box-shadow:
            0 12px 25px rgba(255,122,0,0.45);

        }

        /* =========================
            BOTTOM TEXT
        ========================= */

        .bottom-text{

            text-align:center;

            margin-top:24px;

            color:#ffe1c2;

            font-size:14px;

            position:relative;
            z-index:2;

        }

        .bottom-text a{

            color:white;

            text-decoration:none;

            font-weight:700;

        }

        .bottom-text a:hover{

            text-decoration:underline;

        }

        /* =========================
            RESPONSIVE
        ========================= */

        @media(max-width:600px){

            .register-card{

                padding:30px 24px;

            }

            .title{

                font-size:32px;

            }

        }

        .success-alert{

            background:#dcfce7;

            color:#166534;

            border:1px solid #86efac;

            padding:14px 18px;

            border-radius:12px;

            margin-bottom:20px;

            font-size:14px;

            font-weight:600;

        }

    </style>

</head>

<body>

    <div class="register-card">

        <!-- BACK BUTTON -->

        <a
            href="{{ url('/') }}"
            class="back-btn"
        >
            ← Kembali ke Landing Page
        </a>

        <!-- LOGO -->

        <div class="logo-circle">

            <img
                src="{{ asset('assets/images/logoservio.png') }}"
                alt="Logo"
            >

        </div>

        <!-- TITLE -->

        <div class="title">
            Daftar Provider
        </div>

        <div class="subtitle">

            Lengkapi data penyedia layanan
            untuk bergabung bersama Servio.

        </div>

        @if(session('success'))

        <div class="success-alert">
            {{ session('success') }}
        </div>

        @endif

        <!-- FORM -->

        <form
            action="{{ route('register.store') }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf

            <!-- NAMA -->

            <div class="input-group">

                <label class="input-label">
                    Nama Penyedia Layanan
                </label>

                <input
                    type="text"
                    name="name"
                    class="input-field"
                    placeholder="Masukkan nama penyedia layanan"
                >

            </div>

            <!-- EMAIL -->

            <div class="input-group">

                <label class="input-label">
                    Email
                </label>

                <input
                    type="email"
                    name="email"
                    class="input-field"
                    placeholder="Masukkan email"
                >

            </div>

            <!-- PHONE -->

            <div class="input-group">

                <label class="input-label">
                    Nomor HP
                </label>

                <input
                    type="text"
                    name="phone"
                    class="input-field"
                    placeholder="Masukkan nomor hp"
                >

            </div>

            <!-- PASSWORD -->

            <div class="input-group">

                <label class="input-label">
                    Password
                </label>

                <input
                    type="password"
                    name="password"
                    class="input-field"
                    placeholder="Masukkan password"
                >

            </div>

            <!-- ADDRESS -->

            <div class="input-group">

                <label class="input-label">
                    Alamat Lengkap
                </label>

                <textarea
                    name="address"
                    class="textarea-field"
                    placeholder="Masukkan alamat lengkap"
                ></textarea>

            </div>

            <!-- CITY -->

            <div class="input-group">

                <label class="input-label">
                    Kota
                </label>

                <input
                    type="text"
                    name="city"
                    class="input-field"
                    placeholder="Masukkan kota"
                >

            </div>

            <!-- KTP -->

            <div class="input-group">

                <label class="input-label">
                    Upload KTP
                </label>

                <input
                    type="file"
                    name="ktp_file"
                    class="file-field"
                >

            </div>

            <!-- FOTO USAHA -->

            <div class="input-group">

                <label class="input-label">
                    Foto Usaha
                </label>

                <input
                    type="file"
                    name="business_photo"
                    class="file-field"
                >

            </div>

            <!-- SERTIFIKAT USAHA -->

            <div class="input-group">

                <label class="input-label">
                    Sertifikat Usaha
                </label>

                <input
                    type="file"
                    name="business_certificate"
                    class="file-field"
                >

            </div>
            <!-- APPROVAL INFO -->

            <div class="approval-info">

                Setelah mendaftar,
                akun Anda akan diperiksa admin
                terlebih dahulu sebelum dapat
                login ke Servio.

            </div>

            <!-- BUTTON -->

            <button
                type="submit"
                class="register-btn"
            >
                Daftar Sekarang
            </button>

        </form>

        <!-- LOGIN -->

        <div class="bottom-text">

            Sudah punya akun?

            <a href="{{ route('login') }}">
                Masuk
            </a>

        </div>

    </div>

</body>
</html>