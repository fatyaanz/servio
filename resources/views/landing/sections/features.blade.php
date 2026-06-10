<section class="features-section" id="features">

    <!-- BLUR -->

    <div class="features-blur features-blur-1"></div>
    <div class="features-blur features-blur-2"></div>

    <div class="container">

        <!-- HEADER -->

        <div class="features-header">

            <div class="features-badge">
                🚀 Keunggulan Servio
            </div>

            <h2 class="features-title">
                Kenapa
                <span>Servio</span>
                Jadi Pilihan?
            </h2>

            <p class="features-desc">
                Servio menghadirkan pengalaman layanan jasa
                modern yang cepat, aman, terpercaya,
                dan nyaman digunakan kapan saja.
            </p>

        </div>

        <!-- GRID -->

        <div class="features-grid">

            <!-- LARGE CARD -->

            <div class="feature-card feature-large">

                <div class="feature-content">

                    <div class="feature-icon">
                        🛡️
                    </div>

                    <h3>
                        Penyedia Terverifikasi
                    </h3>

                    <p>
                        Semua teknisi telah melewati proses
                        verifikasi untuk memastikan kualitas,
                        keamanan, dan kepercayaan pengguna.
                    </p>

                </div>

            </div>

            <!-- CARD -->

            <div class="feature-card">

                <div class="feature-icon">
                    ⚡
                </div>

                <h3>
                    Booking Cepat
                </h3>

                <p>
                    Pesan layanan hanya dalam
                    beberapa langkah sederhana.
                </p>

            </div>

            <!-- CARD -->

            <div class="feature-card">

                <div class="feature-icon">
                    📍
                </div>

                <h3>
                    Tracking Realtime
                </h3>

                <p>
                    Pantau lokasi teknisi secara
                    realtime langsung dari aplikasi.
                </p>

            </div>

            <!-- CARD -->

            <div class="feature-card">

                <div class="feature-icon">
                    ⭐
                </div>

                <h3>
                    Rating & Review
                </h3>

                <p>
                    Lihat ulasan pelanggan sebelum
                    memilih layanan terbaik.
                </p>

            </div>

            <!-- CARD -->

            <div class="feature-card">

                <div class="feature-icon">
                    💰
                </div>

                <h3>
                    Harga Transparan
                </h3>

                <p>
                    Estimasi harga jelas tanpa
                    biaya tambahan tersembunyi.
                </p>

            </div>

            <!-- WIDE CARD -->

            <div class="feature-card feature-wide">

                <div class="feature-content">

                    <div class="feature-icon">
                        ☎️
                    </div>

                    <h3>
                        Support 24/7
                    </h3>

                    <p>
                        Tim Servio siap membantu Anda
                        kapan saja dengan pelayanan
                        yang cepat dan responsif.
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>

<style>

/* =========================
    FEATURES SECTION
========================= */

.features-section{

    position: relative;
    padding: 110px 0;
    overflow: hidden;

}

/* =========================
    BLUR
========================= */

.features-blur{

    position: absolute;
    border-radius: 50%;
    filter: blur(120px);
    z-index: -1;

}

.features-blur-1{

    width: 320px;
    height: 320px;

    background: #ffe8cf;

    top: -100px;
    left: -80px;

}

.features-blur-2{

    width: 300px;
    height: 300px;

    background: #fff3e2;

    bottom: -100px;
    right: -80px;

}

/* =========================
    HEADER
========================= */

.features-header{

    text-align: center;
    margin-bottom: 70px;

}

.features-badge{

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

.features-title{

    font-size: 52px;
    line-height: 1.15;

    font-weight: 800;

    color: #0f172a;

    margin-bottom: 18px;

    letter-spacing: -1.5px;

}

.features-title span{

    color: #ff7a00;

}

.features-desc{

    max-width: 640px;

    margin: auto;

    font-size: 17px;
    line-height: 1.8;

    color: #64748b;

}

/* =========================
    GRID
========================= */

.features-grid{

    display: grid;

    grid-template-columns: repeat(3,1fr);

    gap: 22px;

}

/* =========================
    CARD
========================= */

.feature-card{

    position: relative;

    background: rgba(255,255,255,0.82);

    border: 1px solid rgba(255,255,255,0.45);

    backdrop-filter: blur(18px);

    border-radius: 28px;

    padding: 30px;

    overflow: hidden;

    transition: 0.3s ease;

    box-shadow:
    0 12px 35px rgba(15,23,42,0.05);

}

.feature-card:hover{

    transform: translateY(-8px);

    box-shadow:
    0 22px 45px rgba(255,122,0,0.10);

}

/* =========================
    LARGE CARD
========================= */

.feature-large{

    grid-column: span 2;

    min-height: 280px;

    display: flex;
    align-items: flex-end;

    background:
    linear-gradient(
        135deg,
        rgba(255,241,225,0.95),
        rgba(255,255,255,0.92)
    );

}

.feature-wide{

    grid-column: span 2;

    background:
    linear-gradient(
        135deg,
        rgba(255,255,255,0.95),
        rgba(255,243,227,0.92)
    );

}

/* =========================
    ICON
========================= */

.feature-icon{

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

    box-shadow:
    0 8px 18px rgba(255,122,0,0.08);

}

/* =========================
    TEXT
========================= */

.feature-card h3{

    font-size: 24px;
    font-weight: 700;

    color: #0f172a;

    line-height: 1.3;

    margin-bottom: 12px;

}

.feature-card p{

    font-size: 15px;
    line-height: 1.8;

    color: #64748b;

    max-width: 480px;

}

/* =========================
    DECORATION
========================= */

.feature-card::before{

    content: '';

    position: absolute;

    width: 140px;
    height: 140px;

    border-radius: 50%;

    background: rgba(255,122,0,0.04);

    top: -50px;
    right: -50px;

}

/* =========================
    RESPONSIVE
========================= */

@media(max-width:1200px){

    .features-grid{

        grid-template-columns: 1fr 1fr;

    }

    .feature-large,
    .feature-wide{

        grid-column: span 2;

    }

}

@media(max-width:768px){

    .features-section{

        padding: 90px 0;

    }

    .features-grid{

        grid-template-columns: 1fr;

        gap: 18px;

    }

    .feature-large,
    .feature-wide{

        grid-column: span 1;

        min-height: auto;

    }

    .features-title{

        font-size: 36px;

    }

    .features-desc{

        font-size: 15px;

    }

    .feature-card{

        padding: 26px;

    }

    .feature-card h3{

        font-size: 21px;

    }

    .feature-card p{

        font-size: 14px;

    }

}

</style>