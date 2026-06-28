<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Provider Servio</title>

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- Google Fonts: Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial, sans-serif;
        }

        html,
        body{

            width:100%;
            min-height:100%;

            background:#f5f5f7;

            overflow-y:auto;

        }

        body{

            display:flex;

            min-width:0;

        }

        /* =========================
            MAIN CONTENT
        ========================== */

        .main-content{

            flex:1;

            margin-left:240px;

            padding:30px;

            min-height:100vh;

            background:#f5f5f7;

            min-width:0;

        

        }

        /* =========================
            PAGE HEADER
        ========================== */

        .page-header{

            display:flex;
            justify-content:space-between;
            align-items:center;

            margin-bottom:30px;

            gap:20px;

            flex-wrap:wrap;

        }

        .page-title h1{

            font-size:34px;
            color:#222;

            margin-bottom:8px;

        }

        .page-title p{

            color:#777;
            font-size:15px;

        }

        /* =========================
            GLASS CARD
        ========================== */

        .glass-card{

            background:rgba(255,255,255,0.75);

            backdrop-filter:blur(16px);
            -webkit-backdrop-filter:blur(16px);

            border:1px solid rgba(255,255,255,0.2);

            border-radius:28px;

            box-shadow:
            0 8px 32px rgba(0,0,0,0.08);

            padding:24px;

        }

        /* =========================
            BUTTON
        ========================== */

        .orange-btn{

            border:none;

            padding:15px 24px;

            border-radius:16px;

            background:
            linear-gradient(
                to right,
                #ffb066,
                #ff7a00
            );

            color:white;

            font-weight:bold;

            cursor:pointer;

            box-shadow:
            0 8px 20px rgba(255,122,0,0.25);

            transition:0.3s;

            white-space:nowrap;

        }

        .orange-btn:hover{

            transform:translateY(-2px);

        }

        /* =========================
            TABLE
        ========================== */

        table{

            width:100%;

            border-collapse:collapse;

        }

        th{

            text-align:left;

            padding:16px 12px;

            color:#777;

            font-size:14px;

            border-bottom:1px solid #eee;

        }

        td{

            padding:18px 12px;

            border-bottom:1px solid #f1f1f1;

            font-size:14px;

            color:#333;

        }

        /* =========================
            STATUS
        ========================== */

        .status{

            padding:8px 16px;

            border-radius:30px;

            font-size:13px;
            font-weight:bold;

            display:inline-block;

        }

        .active{

            color:#1ea44d;

        }

        .pending{

            background:#fff4df;
            color:#e39a00;

        }

        .danger{

            background:#ffeaea;
            color:#ff4d4d;

        }

        /* =========================
            RESPONSIVE
        ========================== */

        @media(max-width:768px){

            .main-content{

                margin-left:220px;

                padding:20px;

            }

        }

    </style>

</head>
<body>

    {{-- SIDEBAR --}}
    @include('provider.components.sidebar')

    {{-- MAIN CONTENT --}}
    <div class="main-content">

        @yield('content')

    </div>

    @stack('scripts')

</body>
</html>