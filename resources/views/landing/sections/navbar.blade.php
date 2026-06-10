<!-- =========================
    NAVBAR
========================= -->

<nav class="navbar">

    <!-- LOGO -->

    <div class="logo">
        Servio
    </div>

    <!-- MENU -->

    <ul class="nav-links">

        <li>
            <a href="#home">
                Beranda
            </a>
        </li>

        <li>
            <a href="#services">
                Layanan
            </a>
        </li>

        <li>
            <a href="#workflow">
                Alur Kerja
            </a>
        </li>

        <li>
            <a href="#features">
                Fitur
            </a>
        </li>

        <li>
            <a href="#testimonials">
                Testimoni
            </a>
        </li>

        <li>
            <a href="#footer">
                Kontak
            </a>
        </li>

    </ul>

    <!-- BUTTON -->

    <div class="nav-buttons">

        <a href="/login" class="btn-login">
            Masuk
        </a>

        <a href="/choose-role" class="btn-register">
            Daftar
        </a>

    </div>

</nav>

<style>

    *{
        margin:0;
        padding:0;
        box-sizing:border-box;
        font-family:'Inter',sans-serif;
    }

    html{
        scroll-behavior:smooth;
    }

    body{
        background:#fffdf9;
        overflow-x:hidden;
    }

    /* =========================
        NAVBAR
    ========================== */

    .navbar{

        position:fixed;

        top:20px;
        left:50%;

        transform:translateX(-50%);

        width:90%;
        max-width:1200px;

        padding:18px 30px;

        display:flex;

        justify-content:space-between;

        align-items:center;

        background:rgba(255,255,255,0.75);

        backdrop-filter:blur(16px);

        border:1px solid rgba(255,255,255,0.4);

        border-radius:22px;

        z-index:999;

        box-shadow:
        0 10px 30px rgba(0,0,0,0.05);

    }

    /* =========================
        LOGO
    ========================== */

    .logo{

        font-size:24px;

        font-weight:800;

        color:#ff7a00;

        cursor:pointer;

    }

    /* =========================
        NAV LINKS
    ========================== */

    .nav-links{

        display:flex;

        align-items:center;

        gap:30px;

        list-style:none;

    }

    .nav-links a{

        position:relative;

        text-decoration:none;

        color:#475569;

        font-size:15px;

        font-weight:600;

        transition:0.3s ease;

        padding-bottom:6px;

    }

    .nav-links a:hover{

        color:#ff7a00;

    }

    /* ACTIVE MENU */

    .nav-links a.active{

        color:#ff7a00;

    }

    .nav-links a.active::after{

        content:"";

        position:absolute;

        left:0;
        bottom:0;

        width:100%;
        height:3px;

        background:#ff7a00;

        border-radius:999px;

    }

    /* =========================
        BUTTONS
    ========================== */

    .nav-buttons{

        display:flex;

        align-items:center;

        gap:12px;

    }

    .btn-login{

        padding:12px 22px;

        border-radius:12px;

        text-decoration:none;

        font-size:14px;

        font-weight:600;

        color:#0f172a;

        transition:0.3s ease;

    }

    .btn-login:hover{

        color:#ff7a00;

    }

    .btn-register{

        padding:12px 24px;

        border-radius:14px;

        background:linear-gradient(
            135deg,
            #ffb066,
            #ff7a00
        );

        color:white;

        text-decoration:none;

        font-size:14px;

        font-weight:600;

        transition:0.3s ease;

        box-shadow:
        0 10px 25px rgba(255,122,0,0.20);

    }

    .btn-register:hover{

        transform:translateY(-3px);

    }

    /* =========================
        RESPONSIVE
    ========================== */

    @media(max-width:992px){

        .navbar{

            padding:16px 20px;

        }

        .nav-links{

            gap:18px;

        }

        .nav-links a{

            font-size:13px;

        }

        .btn-login,
        .btn-register{

            padding:10px 18px;

            font-size:13px;

        }

    }

    @media(max-width:768px){

        .navbar{

            flex-wrap:wrap;

            gap:15px;

        }

        .nav-links{

            width:100%;

            justify-content:center;

            flex-wrap:wrap;

        }

        .nav-buttons{

            width:100%;

            justify-content:center;

        }

    }

</style>

<!-- =========================
    ACTIVE NAVBAR SCRIPT
========================= -->

<script>

    const sections = document.querySelectorAll("section, footer");
    const navLinks = document.querySelectorAll(".nav-links a");

    window.addEventListener("scroll", () => {

        let currentSection = "";

        sections.forEach(section => {

            const sectionTop = section.offsetTop;
            const sectionHeight = section.clientHeight;

            if(pageYOffset >= sectionTop - 200){

                currentSection = section.getAttribute("id");

            }

        });

        navLinks.forEach(link => {

            link.classList.remove("active");

            const href = link.getAttribute("href").substring(1);

            if(href === currentSection){

                link.classList.add("active");

            }

        });

    });

</script>