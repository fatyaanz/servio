<!-- =========================
    SERVICES SECTION
========================= -->

<section class="services-section" id="services">

    <!-- BLUR -->

    <div class="services-blur blur-left"></div>
    <div class="services-blur blur-right"></div>

    <div class="container">

        <!-- HEADER -->

        <div class="section-header">

            <div class="section-badge">

                🔥 Layanan Populer

            </div>

            <h2 class="section-title">

                Temukan Layanan
                <span>Terbaik</span>
                untuk Kebutuhan Anda

            </h2>

            <p class="section-desc">

                Servio menghadirkan berbagai layanan profesional
                dengan teknisi terpercaya, proses cepat,
                dan pengalaman pemesanan yang modern.

            </p>

        </div>

        <!-- GRID -->

        <div class="services-grid">

            <!-- CARD 1 -->

            <div class="service-card">

                <div class="service-image">

                    <img
                        src="https://images.unsplash.com/photo-1621905252507-b35492cc74b4?q=80&w=1200"
                    >

                    <div class="service-overlay"></div>

                </div>

                <div class="service-content">

                    <div class="service-icon">
                        ❄️
                    </div>

                    <h3>Servis AC</h3>

                    <p>

                        Teknisi profesional untuk cuci AC,
                        pemasangan, maintenance,
                        dan perbaikan cepat.

                    </p>

                    <div class="service-footer">

                        <span>⭐ 4.9</span>

                        <span>2.1K+ Pesanan</span>

                    </div>

                </div>

            </div>

            <!-- CARD 2 -->

            <div class="service-card">

                <div class="service-image">

                    <img
                        src="https://images.unsplash.com/photo-1621905251918-48416bd8575a?q=80&w=1200"
                    >

                    <div class="service-overlay"></div>

                </div>

                <div class="service-content">

                    <div class="service-icon">
                        ⚡
                    </div>

                    <h3>Teknisi Listrik</h3>

                    <p>

                        Instalasi listrik rumah,
                        perbaikan konsleting,
                        dan pemasangan perangkat.

                    </p>

                    <div class="service-footer">

                        <span>⭐ 4.8</span>

                        <span>1.8K+ Pesanan</span>

                    </div>

                </div>

            </div>

            <!-- CARD 3 -->

            <div class="service-card">

                <div class="service-image">

                    <img
                        src="https://images.unsplash.com/photo-1581092919535-7146ff1a5905?q=80&w=1200"
                    >

                    <div class="service-overlay"></div>

                </div>

                <div class="service-content">

                    <div class="service-icon">
                        🖥️
                    </div>

                    <h3>Elektronik</h3>

                    <p>

                        Perbaikan TV, komputer,
                        mesin cuci, kulkas,
                        dan perangkat elektronik.

                    </p>

                    <div class="service-footer">

                        <span>⭐ 4.9</span>

                        <span>3.4K+ Pesanan</span>

                    </div>

                </div>

            </div>

            <!-- CARD 4 -->

            <div class="service-card">

                <div class="service-image">

                    <img
                        src="https://images.unsplash.com/photo-1620626011761-996317b8d101?q=80&w=1200"
                    >

                    <div class="service-overlay"></div>

                </div>

                <div class="service-content">

                    <div class="service-icon">
                        🚿
                    </div>

                    <h3>Plumbing</h3>

                    <p>

                        Solusi saluran air,
                        wastafel bocor,
                        toilet, dan instalasi rumah.

                    </p>

                    <div class="service-footer">

                        <span>⭐ 4.7</span>

                        <span>1.5K+ Pesanan</span>

                    </div>

                </div>

            </div>

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

    .container{
        width:90%;
        max-width:1200px;
        margin:auto;
    }

    /* =========================
        SERVICES SECTION
    ========================== */

    .services-section{

        position:relative;

        padding:120px 0;

        overflow:hidden;

    }

    /* =========================
        BLUR
    ========================== */

    .services-blur{

        position:absolute;

        border-radius:50%;

        filter:blur(120px);

        z-index:-1;

    }

    .blur-left{

        width:320px;
        height:320px;

        background:#ffe5c7;

        top:0;
        left:-120px;

    }

    .blur-right{

        width:280px;
        height:280px;

        background:#fff1df;

        bottom:0;
        right:-100px;

    }

    /* =========================
        HEADER
    ========================== */

    .section-header{

        text-align:center;

        margin-bottom:70px;

    }

    .section-badge{

        display:inline-flex;

        align-items:center;

        padding:12px 22px;

        border-radius:999px;

        background:white;

        border:1px solid rgba(255,255,255,0.6);

        color:#ff7a00;

        font-size:14px;

        font-weight:600;

        margin-bottom:24px;

        box-shadow:
        0 10px 30px rgba(0,0,0,0.04);

    }

    .section-title{

        font-size:56px;

        line-height:1.15;

        font-weight:800;

        letter-spacing:-2px;

        color:#0f172a;

        margin-bottom:22px;

    }

    .section-title span{

        color:#ff7a00;

    }

    .section-desc{

        max-width:700px;

        margin:auto;

        font-size:17px;

        line-height:1.9;

        color:#64748b;

    }

    /* =========================
    GRID
========================= */

.services-grid{

    display:grid;

    grid-template-columns:repeat(4,1fr);

    gap:20px;

}

/* =========================
    CARD
========================= */

.service-card{

    background:rgba(255,255,255,0.75);

    backdrop-filter:blur(18px);

    border-radius:24px;

    overflow:hidden;

    border:1px solid rgba(255,255,255,0.6);

    box-shadow:
    0 12px 30px rgba(15,23,42,0.05);

    transition:0.35s ease;

    max-width:270px;

    margin:auto;

}

.service-card:hover{

    transform:translateY(-8px);

    box-shadow:
    0 20px 40px rgba(255,122,0,0.10);

}

/* =========================
    IMAGE
========================= */

.service-image{

    position:relative;

    height:180px;

    overflow:hidden;

}

.service-image img{

    width:100%;
    height:100%;

    object-fit:cover;

    transition:0.5s ease;

}

.service-card:hover img{

    transform:scale(1.06);

}

/* =========================
    CONTENT
========================= */

.service-content{

    padding:20px;

}

.service-icon{

    width:52px;
    height:52px;

    border-radius:16px;

    background:linear-gradient(
        135deg,
        #fff2df,
        #ffe1bf
    );

    display:flex;

    justify-content:center;
    align-items:center;

    font-size:22px;

    margin-bottom:16px;

}

.service-content h3{

    font-size:20px;

    color:#0f172a;

    margin-bottom:10px;

}

.service-content p{

    color:#64748b;

    line-height:1.7;

    font-size:14px;

    margin-bottom:20px;

}

/* =========================
    FOOTER
========================= */

.service-footer{

    display:flex;

    justify-content:space-between;

    align-items:center;

    padding-top:16px;

    border-top:1px solid rgba(148,163,184,0.15);

    font-size:13px;

    color:#94a3b8;

}

/* =========================
    RESPONSIVE
========================= */

@media(max-width:1100px){

    .services-grid{

        grid-template-columns:repeat(2,1fr);

    }

}

@media(max-width:768px){

    .services-grid{

        grid-template-columns:1fr;

    }

    .service-card{

        max-width:100%;

    }

}

</style>