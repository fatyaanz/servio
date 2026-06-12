<div class="provider-about">

    <div class="about-card">

        <div class="about-header">

            <div class="about-icon">
                <i class='bx bx-buildings'></i>
            </div>

            <div>

                <h3>
                    Tentang Penyedia
                </h3>

                <span>
                    Profil usaha & informasi layanan
                </span>

            </div>

        </div>

        <div class="about-content">

            <p class="about-description">

                Berkah AC Service telah berpengalaman lebih dari
                5 tahun dalam menangani berbagai permasalahan
                AC rumah, apartemen, kantor, hingga toko.
                Kami mengutamakan kualitas pekerjaan,
                ketepatan waktu, serta kepuasan pelanggan
                dengan layanan profesional dan bergaransi.

            </p>

            <div class="about-info-grid">

                <div class="info-item">

                    <i class='bx bx-briefcase'></i>

                    <div>

                        <h4>
                            Pengalaman
                        </h4>

                        <span>
                            5+ Tahun
                        </span>

                    </div>

                </div>

                <div class="info-item">

                    <i class='bx bx-map'></i>

                    <div>

                        <h4>
                            Area Layanan
                        </h4>

                        <span>
                            Bandung Raya
                        </span>

                    </div>

                </div>

                <div class="info-item">

                    <i class='bx bx-time'></i>

                    <div>

                        <h4>
                            Jam Operasional
                        </h4>

                        <span>
                            08:00 - 21:00
                        </span>

                    </div>

                </div>

                <div class="info-item">

                    <i class='bx bx-shield'></i>

                    <div>

                        <h4>
                            Garansi
                        </h4>

                        <span>
                            Hingga 2 Bulan
                        </span>

                    </div>

                </div>

            </div>

            <div class="advantages">

                <div class="advantage-tag">
                    ✔ Teknisi Berpengalaman
                </div>

                <div class="advantage-tag">
                    ✔ Harga Transparan
                </div>

                <div class="advantage-tag">
                    ✔ Garansi Pekerjaan
                </div>

                <div class="advantage-tag">
                    ✔ Respon Cepat
                </div>

            </div>

        </div>

    </div>

</div>

<style>

/* =========================
   ABOUT
========================= */

.provider-about{

    max-width:1400px;

    margin:30px auto;

    padding:0 30px;

}

/* CARD */

.about-card{

    background:white;

    border-radius:30px;

    padding:30px;

    border:1px solid #eef2f7;

    box-shadow:
    0 10px 30px rgba(15,23,42,.05);

}

/* HEADER */

.about-header{

    display:flex;

    align-items:center;

    gap:16px;

    margin-bottom:25px;

}

.about-icon{

    width:56px;
    height:56px;

    border-radius:18px;

    background:#fff4e8;

    color:#ff8a00;

    display:flex;

    align-items:center;
    justify-content:center;

    font-size:28px;

}

.about-header h3{

    margin:0;

    font-size:24px;

    font-weight:800;

    color:#111827;

}

.about-header span{

    color:#94a3b8;

    font-size:13px;

}

/* DESCRIPTION */

.about-description{

    font-size:15px;

    line-height:2;

    color:#64748b;

    margin-bottom:30px;

}

/* INFO GRID */

.about-info-grid{

    display:grid;

    grid-template-columns:
    repeat(4,1fr);

    gap:16px;

    margin-bottom:25px;

}

.info-item{

    display:flex;

    gap:14px;

    padding:18px;

    border-radius:18px;

    background:#fafafa;

    border:1px solid #eef2f7;

}

.info-item i{

    font-size:24px;

    color:#ff8a00;

}

.info-item h4{

    margin:0 0 4px;

    font-size:14px;

    font-weight:700;

    color:#111827;

}

.info-item span{

    font-size:13px;

    color:#64748b;

}

/* ADVANTAGES */

.advantages{

    display:flex;

    flex-wrap:wrap;

    gap:12px;

}

.advantage-tag{

    padding:10px 16px;

    border-radius:999px;

    background:#ecfdf3;

    color:#16a34a;

    font-size:13px;

    font-weight:700;

}

/* RESPONSIVE */

@media(max-width:992px){

    .about-info-grid{

        grid-template-columns:
        repeat(2,1fr);

    }

}

@media(max-width:768px){

    .provider-about{

        padding:0 15px;

    }

    .about-card{

        padding:22px;

    }

    .about-info-grid{

        grid-template-columns:1fr;

    }

    .about-header h3{

        font-size:20px;

    }

}

</style>