<!-- =========================
    HERO SECTION
========================= -->

<section class="hero" id="home">

    <!-- BLUR BACKGROUND -->

    <div class="blur blur-1"></div>
    <div class="blur blur-2"></div>

    <div class="container hero-wrapper">

        <!-- LEFT CONTENT -->

        <div class="hero-content">

            <div class="hero-badge">

                <span>✨</span>

                Platform Layanan Jasa Terpercaya

            </div>

            <h1 class="hero-title">

                Solusi
                <span>Layanan Jasa</span>
                Modern
                di Ujung Jari

            </h1>

            <p class="hero-desc">

                Servio membantu Anda menemukan penyedia layanan
                profesional untuk kebutuhan rumah, elektronik,
                AC, plumbing, kebersihan, dan lainnya dengan
                pengalaman cepat, aman, dan terpercaya.

            </p>

            <!-- BUTTON -->

            <div class="hero-buttons">

                <a href="#services"
                   class="btn-primary">

                    Pesan Layanan

                </a>

                <a href="#features"
                   class="btn-secondary">

                    Jelajahi Fitur

                </a>

            </div>

            <!-- STATS -->

            <div class="hero-stats">

                <div class="stat-card">

                    <h2>10K+</h2>

                    <p>Pengguna Aktif</p>

                </div>

                <div class="stat-card">

                    <h2>5K+</h2>

                    <p>Penyedia Profesional</p>

                </div>

                <div class="stat-card">

                    <h2>98%</h2>

                    <p>Tingkat Kepuasan</p>

                </div>

            </div>

        </div>

        <!-- RIGHT CONTENT -->

        <div class="hero-image">

            <div class="hero-circle"></div>

            <!-- FLOATING CARD -->

            <div class="floating-card card-top">

                <h4>⭐ Rating 4.9</h4>

                <p>5.000+ pelanggan puas</p>

            </div>

            <div class="floating-card card-bottom">

                <h4>⚡ Fast Service</h4>

                <p>Teknisi cepat & responsif</p>

            </div>

            <!-- PHONE MOCKUP -->

            <img
                src="https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?q=80&w=1000"
                class="phone-mockup"
            >

        </div>

    </div>

</section>

<style>

    *{
        margin:0;
        padding:0;
        box-sizing:border-box;
        font-family:'Inter',sans-serif;
    }

    body{
        background:#fffdf9;
        overflow-x:hidden;
    }

    /* =========================
        CONTAINER
    ========================== */

    .container{

        width:90%;
        max-width:1200px;

        margin:auto;

    }

    /* =========================
        HERO
    ========================== */

    .hero{

        min-height:100vh;

        display:flex;
        align-items:center;

        position:relative;

        overflow:hidden;

        padding:140px 0 80px;

    }

    /* =========================
        BLUR
    ========================== */

    .blur{

        position:absolute;

        border-radius:50%;

        filter:blur(120px);

        z-index:-1;

    }

    .blur-1{

        width:350px;
        height:350px;

        background:#ffe1bf;

        top:-100px;
        left:-100px;

    }

    .blur-2{

        width:320px;
        height:320px;

        background:#fff0dc;

        bottom:-80px;
        right:-80px;

    }

    /* =========================
        HERO WRAPPER
    ========================== */

    .hero-wrapper{

        display:grid;

        grid-template-columns:1fr 1fr;

        align-items:center;

        gap:40px;

    }

    /* =========================
        HERO CONTENT
    ========================== */

    .hero-badge{

        display:inline-flex;

        align-items:center;

        gap:8px;

        padding:12px 20px;

        border-radius:999px;

        background:rgba(255,255,255,0.8);

        border:1px solid rgba(255,255,255,0.5);

        color:#ff7a00;

        font-size:14px;

        font-weight:600;

        margin-bottom:24px;

        box-shadow:
        0 8px 24px rgba(0,0,0,0.04);

    }

    .hero-title{

        font-size:58px;

        line-height:1.12;

        font-weight:800;

        letter-spacing:-2px;

        color:#0f172a;

        margin-bottom:22px;

        max-width:700px;

    }

    .hero-title span{

        color:#ff7a00;

    }

    .hero-desc{

        font-size:16px;

        line-height:1.9;

        color:#64748b;

        margin-bottom:34px;

        max-width:580px;

    }

    /* =========================
        BUTTONS
    ========================== */

    .hero-buttons{

        display:flex;

        align-items:center;

        gap:14px;

        flex-wrap:wrap;

        margin-bottom:40px;

    }

    .btn-primary{

        padding:15px 28px;

        border-radius:14px;

        background:linear-gradient(
            135deg,
            #ffb066,
            #ff7a00
        );

        color:white;

        font-size:15px;

        font-weight:600;

        text-decoration:none;

        transition:0.3s ease;

        box-shadow:
        0 12px 28px rgba(255,122,0,0.20);

    }

    .btn-primary:hover{

        transform:translateY(-3px);

    }

    .btn-secondary{

        padding:15px 28px;

        border-radius:14px;

        background:white;

        border:1px solid #e2e8f0;

        color:#0f172a;

        text-decoration:none;

        font-size:15px;

        font-weight:600;

        transition:0.3s ease;

    }

    .btn-secondary:hover{

        border-color:#ff7a00;

        color:#ff7a00;

    }

    /* =========================
        STATS
    ========================== */

    .hero-stats{

        display:grid;

        grid-template-columns:repeat(3,1fr);

        gap:16px;

    }

    .stat-card{

        background:rgba(255,255,255,0.75);

        backdrop-filter:blur(16px);

        border-radius:22px;

        padding:22px;

        border:1px solid rgba(255,255,255,0.5);

        box-shadow:
        0 10px 30px rgba(0,0,0,0.04);

    }

    .stat-card h2{

        font-size:28px;

        color:#ff7a00;

        margin-bottom:6px;

    }

    .stat-card p{

        font-size:14px;

        color:#64748b;

    }

    /* =========================
        HERO IMAGE
    ========================== */

    .hero-image{

        position:relative;

        display:flex;

        justify-content:center;

        align-items:center;

    }

    .hero-circle{

        position:absolute;

        width:500px;
        height:500px;

        border-radius:50%;

        background:linear-gradient(
            135deg,
            #fff2df,
            #ffe1bf
        );

    }

    .phone-mockup{

        width:330px;

        border-radius:36px;

        position:relative;

        z-index:2;

        object-fit:cover;

        box-shadow:
        0 25px 70px rgba(255,122,0,0.18);

        animation:float 4s ease-in-out infinite;

    }

    @keyframes float{

        0%{
            transform:translateY(0);
        }

        50%{
            transform:translateY(-12px);
        }

        100%{
            transform:translateY(0);
        }

    }

    /* =========================
        FLOATING CARD
    ========================== */

    .floating-card{

        position:absolute;

        background:rgba(255,255,255,0.85);

        backdrop-filter:blur(16px);

        border-radius:18px;

        padding:16px 18px;

        box-shadow:
        0 10px 30px rgba(0,0,0,0.05);

        z-index:3;

    }

    .floating-card h4{

        font-size:14px;

        margin-bottom:4px;

        color:#0f172a;

    }

    .floating-card p{

        font-size:13px;

        color:#64748b;

    }

    .card-top{

        top:90px;
        left:-10px;

    }

    .card-bottom{

        bottom:70px;
        right:-10px;

    }

    /* =========================
        RESPONSIVE
    ========================== */

    @media(max-width:992px){

        .hero-wrapper{

            grid-template-columns:1fr;

            text-align:center;

        }

        .hero-desc{

            margin:auto auto 34px;

        }

        .hero-buttons{

            justify-content:center;

        }

        .hero-stats{

            grid-template-columns:1fr;

        }

        .hero-title{

            font-size:48px;

        }

    }

    @media(max-width:768px){

        .hero-title{

            font-size:38px;

            line-height:1.2;

        }

        .hero-desc{

            font-size:15px;

        }

        .phone-mockup{

            width:100%;
            max-width:280px;

        }

        .hero-circle{

            width:360px;
            height:360px;

        }

        .floating-card{

            display:none;

        }

    }

</style>