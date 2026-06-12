<footer class="footer-section" id="footer">

    <!-- BLUR -->

    <div class="footer-blur footer-blur-1"></div>
    <div class="footer-blur footer-blur-2"></div>

    <div class="container">

        <!-- CTA -->

        <div class="footer-cta">

            <div class="footer-cta-content">

                <div class="footer-badge">
                    🚀 Mulai Sekarang
                </div>

                <h2>
                    Temukan Layanan
                    <span>Terbaik</span>
                    Bersama Servio
                </h2>

                <p>
                    Nikmati pengalaman memesan layanan
                    profesional yang cepat, aman,
                    dan terpercaya langsung dari smartphone Anda.
                </p>

            </div>

            <div class="footer-cta-buttons">

                <a href="#services"
                   class="footer-btn-primary">

                    Pesan Layanan

                </a>

                <a href="/register"
                   class="footer-btn-secondary">

                    Gabung Sekarang

                </a>

            </div>

        </div>

        <!-- GRID -->

        <div class="footer-grid">

            <!-- BRAND -->

            <div class="footer-brand">

                <div class="footer-logo">

                    <div class="footer-logo-circle">
                        S
                    </div>

                    <div class="footer-logo-text">
                        ervio
                    </div>

                </div>

                <p>
                    Platform layanan jasa modern
                    untuk membantu menemukan
                    penyedia layanan profesional
                    dengan mudah dan terpercaya.
                </p>

                <div class="footer-socials">

                    <a href="#">🌐</a>
                    <a href="#">📸</a>
                    <a href="#">💼</a>
                    <a href="#">▶️</a>

                </div>

            </div>

            <!-- LINKS -->

            <div class="footer-links">

                <h4>Navigasi</h4>

                <a href="#home">Beranda</a>
                <a href="#services">Layanan</a>
                <a href="#workflow">Cara Kerja</a>
                <a href="#features">Keunggulan</a>
                <a href="#testimonials">Testimoni</a>

            </div>

            <!-- SERVICES -->

            <div class="footer-links">

                <h4>Layanan</h4>

                <a href="#">Servis AC</a>
                <a href="#">Teknisi Listrik</a>
                <a href="#">Elektronik</a>
                <a href="#">Plumbing</a>

            </div>

            <!-- CONTACT -->

            <div class="footer-links">

                <h4>Kontak</h4>

                <a href="#">hello@servio.id</a>
                <a href="#">+62 812 3456 7890</a>
                <a href="#">Bandung, Indonesia</a>

            </div>

        </div>

        <!-- BOTTOM -->

        <div class="footer-bottom">

            <p>
                © 2026 Servio. All rights reserved.
            </p>

            <div class="footer-bottom-links">

                <a href="#">
                    Privacy Policy
                </a>

                <a href="#">
                    Terms & Conditions
                </a>

            </div>

        </div>

    </div>

</footer>

<style>

/* =========================
    FOOTER SECTION
========================= */

.footer-section{

    position: relative;

    padding-top: 110px;

    overflow: hidden;

    background:
    linear-gradient(
        135deg,
        #ff8a1f,
        #ff6b00
    );

}

/* =========================
    BLUR
========================= */

.footer-blur{

    position: absolute;
    border-radius: 50%;
    filter: blur(120px);
    z-index: 0;

}

.footer-blur-1{

    width: 320px;
    height: 320px;

    background: rgba(255,255,255,0.18);

    top: -120px;
    left: -100px;

}

.footer-blur-2{

    width: 300px;
    height: 300px;

    background: rgba(255,255,255,0.15);

    bottom: -100px;
    right: -80px;

}

.footer-section .container{

    position: relative;
    z-index: 2;

}

/* =========================
    CTA
========================= */

.footer-cta{

    background: rgba(255,255,255,0.12);

    border: 1px solid rgba(255,255,255,0.15);

    backdrop-filter: blur(16px);

    border-radius: 32px;

    padding: 50px;

    display: flex;

    justify-content: space-between;
    align-items: center;

    gap: 40px;

    margin-bottom: 80px;

    box-shadow:
    0 20px 50px rgba(0,0,0,0.08);

}

.footer-badge{

    display: inline-flex;
    align-items: center;

    padding: 10px 18px;

    border-radius: 999px;

    background: rgba(255,255,255,0.15);

    color: white;

    font-size: 14px;
    font-weight: 600;

    margin-bottom: 24px;

}

.footer-cta h2{

    font-size: 48px;
    line-height: 1.15;

    font-weight: 800;

    color: white;

    margin-bottom: 18px;

    max-width: 620px;

}

.footer-cta h2 span{

    color: #ffe0b8;

}

.footer-cta p{

    max-width: 560px;

    color: rgba(255,255,255,0.82);

    line-height: 1.8;

    font-size: 16px;

}

/* =========================
    BUTTONS
========================= */

.footer-cta-buttons{

    display: flex;
    gap: 16px;

    flex-wrap: wrap;

}

.footer-btn-primary{

    padding: 16px 30px;

    border-radius: 16px;

    background: white;

    color: #ff6b00;

    font-weight: 700;

    transition: 0.3s ease;

}

.footer-btn-primary:hover{

    transform: translateY(-4px);

}

.footer-btn-secondary{

    padding: 16px 30px;

    border-radius: 16px;

    border: 1px solid rgba(255,255,255,0.25);

    background: rgba(255,255,255,0.12);

    color: white;

    font-weight: 700;

    transition: 0.3s ease;

}

.footer-btn-secondary:hover{

    background: white;
    color: #ff6b00;

}

/* =========================
    GRID
========================= */

.footer-grid{

    display: grid;

    grid-template-columns:
    1.5fr 1fr 1fr 1fr;

    gap: 50px;

    padding-bottom: 50px;

    border-bottom:
    1px solid rgba(255,255,255,0.15);

}

/* =========================
    BRAND
========================= */

.footer-logo{

    display: flex;
    align-items: center;
    gap: 8px;

    margin-bottom: 22px;

}

.footer-logo-circle{

    width: 52px;
    height: 52px;

    border-radius: 16px;

    background: white;

    display: flex;
    justify-content: center;
    align-items: center;

    color: #ff6b00;

    font-size: 24px;
    font-weight: 800;

}

.footer-logo-text{

    font-size: 34px;
    font-weight: 800;

    color: white;

}

.footer-brand p{

    max-width: 340px;

    color: rgba(255,255,255,0.8);

    line-height: 1.8;

    margin-bottom: 24px;

}

/* =========================
    SOCIALS
========================= */

.footer-socials{

    display: flex;
    gap: 14px;

}

.footer-socials a{

    width: 48px;
    height: 48px;

    border-radius: 16px;

    background: rgba(255,255,255,0.12);

    display: flex;
    justify-content: center;
    align-items: center;

    font-size: 20px;

    transition: 0.3s ease;

}

.footer-socials a:hover{

    background: white;

    transform: translateY(-4px);

}

/* =========================
    LINKS
========================= */

.footer-links h4{

    color: white;

    font-size: 20px;

    margin-bottom: 22px;

}

.footer-links a{

    display: block;

    margin-bottom: 16px;

    color: rgba(255,255,255,0.78);

    transition: 0.3s ease;

}

.footer-links a:hover{

    color: white;

    transform: translateX(4px);

}

/* =========================
    BOTTOM
========================= */

.footer-bottom{

    display: flex;

    justify-content: space-between;
    align-items: center;

    padding: 28px 0;

    flex-wrap: wrap;

    gap: 16px;

}

.footer-bottom p{

    color: rgba(255,255,255,0.75);

}

.footer-bottom-links{

    display: flex;
    gap: 24px;

}

.footer-bottom-links a{

    color: rgba(255,255,255,0.75);

    transition: 0.3s ease;

}

.footer-bottom-links a:hover{

    color: white;

}

/* =========================
    RESPONSIVE
========================= */

@media(max-width:1200px){

    .footer-cta{

        flex-direction: column;
        align-items: flex-start;

    }

    .footer-grid{

        grid-template-columns: 1fr 1fr;

    }

}

@media(max-width:768px){

    .footer-section{

        padding-top: 90px;

    }

    .footer-cta{

        padding: 36px 28px;

    }

    .footer-cta h2{

        font-size: 34px;

    }

    .footer-grid{

        grid-template-columns: 1fr;

        gap: 36px;

    }

    .footer-bottom{

        flex-direction: column;
        align-items: flex-start;

    }

}

</style>