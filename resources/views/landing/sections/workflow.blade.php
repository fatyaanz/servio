<section class="workflow-section" id="workflow">

    <!-- BLUR -->

    <div class="workflow-blur workflow-blur-1"></div>
    <div class="workflow-blur workflow-blur-2"></div>

    <div class="container">

        <!-- HEADER -->

        <div class="workflow-header">

            <div class="workflow-badge">
                ⚡ Cara Kerja Servio
            </div>

            <h2 class="workflow-title">
                Pesan Layanan
                <span>Lebih Mudah</span>
            </h2>

            <p class="workflow-desc">
                Temukan dan pesan penyedia layanan terpercaya
                dengan proses yang cepat, aman, dan praktis
                langsung dari smartphone Anda.
            </p>

        </div>

        <!-- WORKFLOW -->

        <div class="workflow-grid">

            <!-- STEP 1 -->

            <div class="workflow-card">

                <div class="workflow-number">01</div>

                <div class="workflow-icon">🔍</div>

                <h3>Cari Layanan</h3>

                <p>
                    Temukan berbagai layanan profesional
                    sesuai kebutuhan rumah maupun bisnis Anda.
                </p>

            </div>

            <div class="workflow-line"></div>

            <!-- STEP 2 -->

            <div class="workflow-card">

                <div class="workflow-number">02</div>

                <div class="workflow-icon">👨‍🔧</div>

                <h3>Pilih Teknisi</h3>

                <p>
                    Pilih teknisi terpercaya berdasarkan
                    rating dan ulasan pelanggan.
                </p>

            </div>

            <div class="workflow-line"></div>

            <!-- STEP 3 -->

            <div class="workflow-card">

                <div class="workflow-number">03</div>

                <div class="workflow-icon">📅</div>

                <h3>Atur Jadwal</h3>

                <p>
                    Tentukan waktu kunjungan sesuai
                    kebutuhan Anda dengan fleksibel.
                </p>

            </div>

            <div class="workflow-line"></div>

            <!-- STEP 4 -->

            <div class="workflow-card">

                <div class="workflow-number">04</div>

                <div class="workflow-icon">✅</div>

                <h3>Layanan Selesai</h3>

                <p>
                    Teknisi datang dan menyelesaikan
                    pekerjaan secara profesional.
                </p>

            </div>

        </div>

    </div>

</section>

<style>

/* =========================
    WORKFLOW SECTION
========================= */

.workflow-section{

    position: relative;
    padding: 110px 0;
    overflow: hidden;

}

/* =========================
    BLUR
========================= */

.workflow-blur{

    position: absolute;
    border-radius: 50%;
    filter: blur(120px);
    z-index: -1;

}

.workflow-blur-1{

    width: 340px;
    height: 340px;

    background: #ffe8cf;

    top: -120px;
    right: -100px;

}

.workflow-blur-2{

    width: 300px;
    height: 300px;

    background: #fff2e2;

    bottom: -100px;
    left: -100px;

}

/* =========================
    HEADER
========================= */

.workflow-header{

    text-align: center;
    margin-bottom: 70px;

}

.workflow-badge{

    display: inline-flex;
    align-items: center;
    gap: 8px;

    padding: 12px 20px;

    border-radius: 999px;

    background: rgba(255,255,255,0.75);

    border: 1px solid rgba(255,255,255,0.4);

    backdrop-filter: blur(14px);

    color: #ff7a00;

    font-size: 14px;
    font-weight: 600;

    margin-bottom: 24px;

    box-shadow:
    0 8px 20px rgba(15,23,42,0.05);

}

.workflow-title{

    font-size: 52px;
    line-height: 1.15;

    font-weight: 800;

    color: #0f172a;

    margin-bottom: 18px;

    letter-spacing: -1.5px;

}

.workflow-title span{

    color: #ff7a00;

}

.workflow-desc{

    max-width: 650px;

    margin: auto;

    font-size: 17px;
    line-height: 1.8;

    color: #64748b;

}

/* =========================
    GRID
========================= */

.workflow-grid{

    display: grid;

    grid-template-columns:
    1fr 45px
    1fr 45px
    1fr 45px
    1fr;

    align-items: center;

}

/* =========================
    CARD
========================= */

.workflow-card{

    position: relative;

    background: rgba(255,255,255,0.82);

    backdrop-filter: blur(18px);

    border: 1px solid rgba(255,255,255,0.45);

    border-radius: 28px;

    padding: 34px 28px;

    min-height: 260px;

    box-shadow:
    0 12px 35px rgba(15,23,42,0.05);

    transition: 0.3s ease;

    overflow: hidden;

}

.workflow-card:hover{

    transform: translateY(-8px);

    box-shadow:
    0 20px 45px rgba(255,122,0,0.10);

}

/* =========================
    NUMBER
========================= */

.workflow-number{

    position: absolute;

    top: 18px;
    right: 22px;

    font-size: 42px;
    font-weight: 800;

    color: rgba(255,122,0,0.08);

}

/* =========================
    ICON
========================= */

.workflow-icon{

    width: 64px;
    height: 64px;

    border-radius: 20px;

    background: linear-gradient(
        135deg,
        #fff3e4,
        #ffe0bd
    );

    display: flex;
    justify-content: center;
    align-items: center;

    font-size: 28px;

    margin-bottom: 22px;

}

/* =========================
    TEXT
========================= */

.workflow-card h3{

    font-size: 22px;
    font-weight: 700;

    color: #0f172a;

    margin-bottom: 12px;

}

.workflow-card p{

    font-size: 15px;
    line-height: 1.8;

    color: #64748b;

}

/* =========================
    LINE
========================= */

.workflow-line{

    height: 2px;

    background: linear-gradient(
        to right,
        #ffd5ad,
        #ffb066
    );

    border-radius: 999px;

    position: relative;

    opacity: 0.7;

}

.workflow-line::after{

    content: '';

    position: absolute;

    right: -2px;
    top: 50%;

    transform: translateY(-50%);

    width: 10px;
    height: 10px;

    border-radius: 50%;

    background: #ff7a00;

}

/* =========================
    RESPONSIVE
========================= */

@media(max-width:1200px){

    .workflow-grid{

        grid-template-columns: 1fr;
        gap: 24px;

    }

    .workflow-line{
        display: none;
    }

}

@media(max-width:768px){

    .workflow-section{

        padding: 90px 0;

    }

    .workflow-title{

        font-size: 36px;

    }

    .workflow-desc{

        font-size: 15px;

    }

    .workflow-card{

        min-height: auto;
        padding: 28px 24px;

    }

    .workflow-card h3{

        font-size: 20px;

    }

    .workflow-card p{

        font-size: 14px;

    }

}

</style>