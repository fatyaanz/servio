<section class="testimonials-section" id="testimonials">

    <!-- BLUR -->

    <div class="testimonial-blur testimonial-blur-1"></div>
    <div class="testimonial-blur testimonial-blur-2"></div>

    <div class="container">

        <!-- HEADER -->

        <div class="testimonials-header">

            <div class="testimonials-badge">
                💬 Testimoni Pengguna
            </div>

            <h2 class="testimonials-title">
                Apa Kata
                <span>Mereka</span>
                Tentang Servio?
            </h2>

            <p class="testimonials-desc">
                Ribuan pengguna telah mempercayai Servio
                untuk membantu kebutuhan layanan rumah
                dan bisnis mereka setiap hari.
            </p>

        </div>

        <!-- GRID -->

        <div class="testimonials-grid">

            <!-- CARD 1 -->

            <div class="testimonial-card">

                <div class="testimonial-stars">
                    ⭐⭐⭐⭐⭐
                </div>

                <p class="testimonial-text">
                    “Servio sangat membantu saya menemukan
                    teknisi AC yang cepat dan profesional.
                    Proses booking juga mudah banget.”
                </p>

                <div class="testimonial-user">

                    <img
                        src="https://i.pravatar.cc/150?img=12"
                        alt="user"
                    >

                    <div>
                        <h4>Rizky Ramadhan</h4>
                        <span>Bandung, Indonesia</span>
                    </div>

                </div>

            </div>

            <!-- FEATURED -->

            <div class="testimonial-card featured-card">

                <div class="testimonial-quote">
                    ❝
                </div>

                <div class="testimonial-stars">
                    ⭐⭐⭐⭐⭐
                </div>

                <p class="testimonial-text">
                    “Aplikasi Servio tampilannya modern,
                    teknisinya ramah, dan harga transparan.
                    Sekarang kalau ada masalah rumah,
                    tinggal buka Servio.”
                </p>

                <div class="testimonial-user">

                    <img
                        src="https://i.pravatar.cc/150?img=32"
                        alt="user"
                    >

                    <div>
                        <h4>Amanda Putri</h4>
                        <span>Jakarta, Indonesia</span>
                    </div>

                </div>

            </div>

            <!-- CARD 3 -->

            <div class="testimonial-card">

                <div class="testimonial-stars">
                    ⭐⭐⭐⭐⭐
                </div>

                <p class="testimonial-text">
                    “Saya suka fitur tracking realtime-nya.
                    Jadi bisa tahu teknisi sudah sampai mana.
                    Sangat recommended!”
                </p>

                <div class="testimonial-user">

                    <img
                        src="https://i.pravatar.cc/150?img=15"
                        alt="user"
                    >

                    <div>
                        <h4>Fajar Nugraha</h4>
                        <span>Surabaya, Indonesia</span>
                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<style>

/* =========================
    TESTIMONIALS SECTION
========================= */

.testimonials-section{

    position: relative;
    padding: 110px 0;
    overflow: hidden;

}

/* =========================
    BLUR
========================= */

.testimonial-blur{

    position: absolute;
    border-radius: 50%;
    filter: blur(120px);
    z-index: -1;

}

.testimonial-blur-1{

    width: 320px;
    height: 320px;

    background: #ffe8cf;

    top: -100px;
    left: -80px;

}

.testimonial-blur-2{

    width: 300px;
    height: 300px;

    background: #fff4e6;

    bottom: -100px;
    right: -80px;

}

/* =========================
    HEADER
========================= */

.testimonials-header{

    text-align: center;
    margin-bottom: 70px;

}

.testimonials-badge{

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

.testimonials-title{

    font-size: 52px;
    line-height: 1.15;

    font-weight: 800;

    color: #0f172a;

    margin-bottom: 18px;

    letter-spacing: -1.5px;

}

.testimonials-title span{

    color: #ff7a00;

}

.testimonials-desc{

    max-width: 640px;

    margin: auto;

    font-size: 17px;
    line-height: 1.8;

    color: #64748b;

}

/* =========================
    GRID
========================= */

.testimonials-grid{

    display: grid;

    grid-template-columns: repeat(3,1fr);

    gap: 24px;

    align-items: stretch;

}

/* =========================
    CARD
========================= */

.testimonial-card{

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

.testimonial-card:hover{

    transform: translateY(-8px);

    box-shadow:
    0 22px 45px rgba(255,122,0,0.10);

}

/* =========================
    FEATURED
========================= */

.featured-card{

    transform: translateY(-12px);

    background:
    linear-gradient(
        135deg,
        rgba(255,242,223,0.95),
        rgba(255,255,255,0.92)
    );

}

.featured-card:hover{

    transform: translateY(-18px);

}

/* =========================
    QUOTE
========================= */

.testimonial-quote{

    position: absolute;

    top: 10px;
    right: 24px;

    font-size: 72px;
    font-weight: 800;

    color: rgba(255,122,0,0.08);

    line-height: 1;

}

/* =========================
    STARS
========================= */

.testimonial-stars{

    font-size: 18px;

    margin-bottom: 18px;

}

/* =========================
    TEXT
========================= */

.testimonial-text{

    font-size: 15px;
    line-height: 1.9;

    color: #475569;

    margin-bottom: 30px;

}

/* =========================
    USER
========================= */

.testimonial-user{

    display: flex;
    align-items: center;
    gap: 14px;

}

.testimonial-user img{

    width: 56px;
    height: 56px;

    border-radius: 50%;

    object-fit: cover;

    border: 3px solid white;

    box-shadow:
    0 8px 18px rgba(15,23,42,0.08);

}

.testimonial-user h4{

    font-size: 16px;
    font-weight: 700;

    color: #0f172a;

    margin-bottom: 4px;

}

.testimonial-user span{

    font-size: 13px;

    color: #64748b;

}

/* =========================
    DECORATION
========================= */

.testimonial-card::before{

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

    .testimonials-grid{

        grid-template-columns: 1fr;

    }

    .featured-card{

        transform: none;

    }

    .featured-card:hover{

        transform: translateY(-8px);

    }

}

@media(max-width:768px){

    .testimonials-section{

        padding: 90px 0;

    }

    .testimonials-title{

        font-size: 36px;

    }

    .testimonials-desc{

        font-size: 15px;

    }

    .testimonial-card{

        padding: 26px;

    }

    .testimonial-text{

        font-size: 14px;

    }

}

</style>