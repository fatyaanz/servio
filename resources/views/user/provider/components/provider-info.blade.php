<div class="provider-info">

    <div class="provider-card">

        <div class="provider-top">

            <div class="provider-logo">

                <img
                    src="{{ $provider->profile_photo
                        ? asset('storage/'.$provider->profile_photo)
                        : 'https://ui-avatars.com/api/?name=' . urlencode($provider->name)
                    }}"
                    alt="{{ $provider->name }}"
                >

            </div>

            <div class="provider-detail">

                <div class="provider-badges">

                    <span class="provider-badge">
                        ⭐ Top Rated
                    </span>

                    <span class="provider-badge success">
                        ✔ Terverifikasi
                    </span>

                </div>

                <h2>
                    {{ $provider->name }}
                </h2>

                <div class="provider-rating">

                    <span>
                        ⭐ 4.9
                    </span>

                    <span>
                        120 Ulasan
                    </span>

                    <span>
                        850+ Order
                    </span>

                </div>

                <div class="provider-address">

                    <i class='bx bx-map'></i>

                    Jl. Sukabirus No.12, Dayeuhkolot,
                    Kabupaten Bandung, Jawa Barat

                </div>

                <div class="provider-satisfaction">

                    👍 98% pelanggan puas

                </div>

            </div>

        </div>

        <div class="provider-features">

            <div class="feature-card">

                <i class='bx bx-current-location'></i>

                <div>

                    <h4>5 KM</h4>

                    <span>Dari Lokasi Anda</span>

                </div>

            </div>

            <div class="feature-card">

                <i class='bx bx-shield-quarter'></i>

                <div>

                    <h4>2 Bulan</h4>

                    <span>Garansi Servis</span>

                </div>

            </div>

            <div class="feature-card">

                <i class='bx bx-time-five'></i>

                <div>

                    <h4>7 Menit</h4>

                    <span>Estimasi Datang</span>

                </div>

            </div>

            <div class="feature-card">

                <i class='bx bx-check-circle'></i>

                <div>

                    <h4>850+</h4>

                    <span>Pekerjaan Selesai</span>

                </div>

            </div>

        </div>

    </div>

</div>

<style>

.provider-info{
    max-width:1400px;
    margin:0 auto;
    padding:0 30px;
}

.provider-card{

    background:white;

    border-radius:32px;

    padding:32px;

    border:1px solid #eef2f7;

    box-shadow:
    0 12px 30px rgba(15,23,42,.06);

}

.provider-top{

    display:flex;

    gap:28px;

    align-items:center;

}

.provider-logo{

    width:180px;
    height:180px;

    border-radius:28px;

    overflow:hidden;

    flex-shrink:0;

    background:#f8fafc;

}

.provider-logo img{

    width:100%;
    height:100%;

    object-fit:cover;

}

.provider-detail{

    flex:1;

}

.provider-badges{

    display:flex;

    gap:10px;

    flex-wrap:wrap;

    margin-bottom:14px;

}

.provider-badge{

    padding:8px 14px;

    border-radius:999px;

    background:#fff3e6;

    color:#ff8a00;

    font-size:12px;

    font-weight:700;

}

.provider-badge.success{

    background:#ecfdf3;

    color:#16a34a;

}

.provider-detail h2{

    font-size:38px;

    font-weight:800;

    color:#111827;

    margin-bottom:14px;

}

.provider-rating{

    display:flex;

    gap:18px;

    flex-wrap:wrap;

    color:#64748b;

    font-weight:600;

    margin-bottom:14px;

}

.provider-address{

    display:flex;

    align-items:center;

    gap:8px;

    color:#64748b;

    margin-bottom:14px;

    line-height:1.6;

}

.provider-address i{

    color:#ff8a00;

    font-size:18px;

}

.provider-satisfaction{

    color:#16a34a;

    font-weight:700;

}

.provider-features{

    display:grid;

    grid-template-columns:repeat(4,1fr);

    gap:18px;

    margin-top:30px;

}

.feature-card{

    display:flex;

    align-items:center;

    gap:14px;

    padding:18px;

    border-radius:20px;

    background:#fafafa;

    border:1px solid #eef2f7;

}

.feature-card i{

    font-size:28px;

    color:#ff8a00;

}

.feature-card h4{

    margin:0;

    font-size:18px;

    font-weight:800;

    color:#111827;

}

.feature-card span{

    font-size:13px;

    color:#64748b;

}

@media(max-width:992px){

    .provider-top{

        flex-direction:column;

        text-align:center;

    }

    .provider-address{

        justify-content:center;

    }

    .provider-rating{

        justify-content:center;

    }

    .provider-features{

        grid-template-columns:repeat(2,1fr);

    }

}

@media(max-width:768px){

    .provider-info{

        padding:0 15px;

    }

    .provider-card{

        padding:24px;

    }

    .provider-logo{

        width:140px;
        height:140px;

    }

    .provider-detail h2{

        font-size:28px;

    }

    .provider-features{

        grid-template-columns:1fr;

    }

}

</style>