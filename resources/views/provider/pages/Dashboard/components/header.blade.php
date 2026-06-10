@php
    use Illuminate\Support\Facades\Auth;
@endphp

<div class="dashboard-header">

    <!-- LEFT -->

    <div class="header-left">

        <h1>
             Halo, {{ Auth::check() ? Auth::user()->name : 'Guest' }}👋
        </h1>

        <p>
            {{ now()->translatedFormat('l, d F Y') }}
        </p>

    </div>

    <!-- RIGHT -->

    <div class="header-right">

        <!-- STATUS -->

        <div class="status-wrapper">

            <div class="status-info">

                <span class="status-title">
                    Status
                </span>

                <span class="status-subtitle">
                    Ketersediaan layanan
                </span>

            </div>

            <select class="status-select">

                <option>
                    🟢 Online
                </option>

                <option>
                    🔴 Offline
                </option>

            </select>

        </div>

        <!-- NOTIF -->

        <div class="notif-box">

            🔔

            <span class="notif-dot"></span>

        </div>

    </div>

</div>

<style>

    *{
        margin:0;
        padding:0;
        box-sizing:border-box;
        font-family:'Inter',sans-serif;
    }

    body{
        background:
        linear-gradient(
        135deg,
        #f8fafc,
        #eef2ff
        );
    }

    .dashboard-header{

        width:100%;

        display:flex;
        justify-content:space-between;
        align-items:center;
        flex-wrap:wrap;

        gap:20px;

        padding:15px 28px;

        border-radius:28px;

        background:rgba(255,255,255,0.18);

        backdrop-filter:blur(20px);
        -webkit-backdrop-filter:blur(20px);

        border:1px solid rgba(255,255,255,0.25);

        box-shadow:
        0 8px 30px rgba(15,23,42,0.06);

    }

    /* =========================
        LEFT
    ========================== */

    .header-left{
        display:flex;
        flex-direction:column;
        gap:6px;
    }

    .mini-badge{

        width:fit-content;

        padding:6px 12px;

        border-radius:999px;

        background:rgba(255,255,255,0.22);

        backdrop-filter:blur(10px);

        border:1px solid rgba(255,255,255,0.2);

        color:#374151;

        font-size:11px;
        font-weight:600;

    }

    .header-left h1{

        font-size:15px;
        font-weight:700;

        color:#111827;

        letter-spacing:-0.5px;

    }

    .header-left p{

        font-size:13px;
        font-weight:500;

        color:#6b7280;

    }

    /* =========================
        RIGHT
    ========================== */

    .header-right{

        display:flex;
        align-items:center;
        gap:14px;

    }

    /* STATUS */

    .status-wrapper{

        display:flex;
        align-items:center;
        gap:14px;

        padding:12px 14px;

        border-radius:20px;

        background:rgba(255,255,255,0.16);

        backdrop-filter:blur(16px);

        border:1px solid rgba(255,255,255,0.18);

    }

    .status-info{
        display:flex;
        flex-direction:column;
    }

    .status-title{

        font-size:12px;
        font-weight:700;

        color:#111827;

    }

    .status-subtitle{

        font-size:10px;

        color:#6b7280;

    }

    .status-select{

        border:none;
        outline:none;

        background:rgba(255,255,255,0.4);

        backdrop-filter:blur(12px);

        padding:9px 14px;

        border-radius:14px;

        color:#374151;

        font-size:12px;
        font-weight:600;

        cursor:pointer;

    }

    /* NOTIF */

    .notif-box{

        position:relative;

        width:48px;
        height:48px;

        border-radius:18px;

        background:rgba(255,255,255,0.16);

        backdrop-filter:blur(18px);

        border:1px solid rgba(255,255,255,0.2);

        display:flex;
        justify-content:center;
        align-items:center;

        font-size:18px;

        cursor:pointer;

        transition:0.3s ease;

    }

    .notif-box:hover{

        transform:translateY(-2px);

        background:rgba(255,255,255,0.25);

    }

    .notif-dot{

        position:absolute;

        top:12px;
        right:12px;

        width:8px;
        height:8px;

        border-radius:50%;

        background:#ef4444;

        border:2px solid white;

    }

    /* =========================
        RESPONSIVE
    ========================== */

    @media(max-width:768px){

        .dashboard-header{

            padding:20px;

        }

        .header-left h1{

            font-size:21px;

        }

        .header-right{

            width:100%;
            justify-content:space-between;

        }

        .status-wrapper{

            flex:1;

        }

    }

</style>