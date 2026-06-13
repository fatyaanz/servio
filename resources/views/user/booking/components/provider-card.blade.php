<div class="booking-card">

    <div class="card-header">

        <div class="header-icon">
            👨‍🔧
        </div>

        <div>

            <h3>Penyedia Layanan Terpilih</h3>

            <p>
                Teknisi yang akan menangani layanan Anda
            </p>

        </div>

    </div>

    <div class="provider-wrapper">

        <div class="provider-logo">

            <img
                src="{{ $provider->profile_photo
                    ? asset('storage/' . $provider->profile_photo)
                    : asset('assets/images/provider-logo.png') }}"
                alt="Provider"
            >

        </div>

        <div class="provider-info">

            <div class="provider-name">

                {{ $provider->name }}

                <span class="verified-badge">
                    ✔ Terverifikasi
                </span>

            </div>

            <div class="provider-rating">

                <span class="rating-badge">
                    ⭐ {{ number_format($provider->providerReviews()->avg('rating') ?? 5.0, 1) }}
                </span>

                <span class="review-count">
                    {{ $provider->providerReviews()->count() }} Ulasan
                </span>

            </div>

            <div class="provider-meta">

                <div class="meta-item">
                    🛡️ Garansi
                    <strong>{{ $provider->warranty ?? 'Tidak ada Garansi' }}</strong>
                </div>

                <div class="meta-item">
                    ⚡ Respon Cepat
                    <strong>{{ $provider->averageResponseTime() }}</strong>
                </div>

                <div class="meta-item">
                    🟢 Status
                    <strong>{{ ucfirst($provider->status) }}</strong>
                </div>

            </div>

        </div>

    </div>

</div>

<style>

/* =========================
   CARD
========================= */

.booking-card{

    max-width:1000px;

    margin:0 auto 25px;

    padding:28px;

    border-radius:28px;

    background:rgba(255,255,255,.88);

    backdrop-filter:blur(15px);
    -webkit-backdrop-filter:blur(15px);

    border:1px solid rgba(240,138,40,.08);

    box-shadow:
        0 10px 25px rgba(0,0,0,.04);
}

/* =========================
   HEADER
========================= */

.card-header{

    display:flex;
    align-items:center;

    gap:15px;

    margin-bottom:25px;
}

.header-icon{

    width:52px;
    height:52px;

    border-radius:16px;

    display:flex;
    align-items:center;
    justify-content:center;

    font-size:22px;

    background:rgba(240,138,40,.10);
}

.card-header h3{

    margin:0;

    font-size:22px;
    font-weight:800;

    color:#222;
}

.card-header p{

    margin-top:4px;

    color:#888;

    font-size:13px;
}

/* =========================
   PROVIDER
========================= */

.provider-wrapper{

    display:flex;
    align-items:center;

    gap:24px;
}

.provider-logo{

    width:130px;
    height:130px;

    border-radius:24px;

    overflow:hidden;

    background:#FAFAFA;

    border:1px solid #EEEEEE;

    flex-shrink:0;

    display:flex;
    align-items:center;
    justify-content:center;
}

.provider-logo img{

    width:90%;
    height:90%;

    object-fit:contain;
}

/* =========================
   INFO
========================= */

.provider-info{
    flex:1;
}

.provider-name{

    display:flex;
    flex-wrap:wrap;
    align-items:center;

    gap:10px;

    font-size:28px;
    font-weight:800;

    color:#222;
}

.verified-badge{

    padding:6px 12px;

    border-radius:999px;

    background:#E8F4FF;

    color:#2196F3;

    font-size:12px;
    font-weight:700;
}

/* =========================
   RATING
========================= */

.provider-rating{

    display:flex;
    align-items:center;

    gap:10px;

    margin-top:14px;
}

.rating-badge{

    padding:8px 14px;

    border-radius:999px;

    background:#FFF6E8;

    color:#F08A28;

    font-size:14px;
    font-weight:700;
}

.review-count{

    color:#888;

    font-size:14px;
}

/* =========================
   META
========================= */

.provider-meta{

    margin-top:20px;

    display:flex;
    flex-wrap:wrap;

    gap:12px;
}

.meta-item{

    padding:10px 14px;

    border-radius:14px;

    background:#F8F8F8;

    color:#555;

    font-size:14px;

    display:flex;
    align-items:center;

    gap:6px;
}

.meta-item strong{

    color:#222;
}

/* =========================
   TABLET
========================= */

@media(max-width:1024px){

    .booking-card{
        margin:0 20px 25px;
    }

}

/* =========================
   MOBILE
========================= */

@media(max-width:768px){

    .booking-card{

        margin:0 15px 20px;

        padding:20px;
    }

    .provider-wrapper{

        flex-direction:column;
        align-items:flex-start;

        gap:18px;
    }

    .provider-logo{

        width:100px;
        height:100px;
    }

    .provider-name{

        font-size:22px;
    }

    .provider-meta{

        flex-direction:column;
        width:100%;
    }

    .meta-item{

        width:100%;
    }

}

</style>