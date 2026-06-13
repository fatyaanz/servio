<div class="diagnosis-section">

    <div class="diagnosis-title">

        <span class="diagnosis-badge">
            💡 Bingung menentukan layanan?
        </span>

        <h2>
            Biarkan teknisi membantu mendiagnosis masalah Anda
        </h2>

    </div>

    <div class="diagnosis-card" id="diagnosisCard">

        <div class="diagnosis-image">

            <img src="{{ asset('assets/images/diagnosis.png') }}"
                 alt="Diagnosis">

        </div>

        <div class="diagnosis-content">

            <h3>
                Cek Kerusakan Terlebih Dahulu
            </h3>

            <p>
                Jika Anda belum mengetahui jenis kerusakan,
                teknisi akan melakukan pengecekan awal dan
                memberikan rekomendasi solusi terbaik sesuai
                kondisi perangkat Anda.
            </p>

            <a href="{{ route('diagnosis.form', ['provider_id' => $provider->id]) }}" class="diagnosis-action">
                Mulai Diagnosis →
            </a>

        </div>

    </div>

</div>

<style>

/* =========================
   CARD
========================= */

.diagnosis-card{

    position:relative;

    display:flex;
    align-items:center;

    gap:20px;

    padding:20px;

    border-radius:26px;

    background:rgba(255,255,255,.88);

    backdrop-filter:blur(15px);
    -webkit-backdrop-filter:blur(15px);

    border:2px solid rgba(240,138,40,.15);

    box-shadow:
        0 10px 25px rgba(0,0,0,.05);

    cursor:pointer;

    transition:.3s ease;
}

.diagnosis-card:hover{

    transform:translateY(-4px);

    border-color:#F08A28;

    box-shadow:
        0 15px 35px rgba(240,138,40,.12);
}

/* =========================
   SELECTED
========================= */

.diagnosis-card.selected{

    border:2px solid #F08A28;

    background:#FFF9F3;

    box-shadow:
        0 15px 35px rgba(240,138,40,.15);
}

.diagnosis-card.selected::after{

    content:'✓';

    position:absolute;

    top:15px;
    right:15px;

    width:30px;
    height:30px;

    border-radius:50%;

    background:#F08A28;

    color:white;

    display:flex;
    align-items:center;
    justify-content:center;

    font-size:14px;
    font-weight:700;
}

/* =========================
   DIAGNOSIS SECTION
========================= */

.diagnosis-section{

    max-width:1400px;

    margin:40px auto 0;

    padding:0 30px;
}

/* =========================
   TITLE
========================= */

.diagnosis-title{

    margin-bottom:18px;
}

.diagnosis-badge{

    display:inline-flex;
    align-items:center;

    padding:8px 14px;

    border-radius:999px;

    background:rgba(240,138,40,.10);

    color:#F08A28;

    font-size:12px;
    font-weight:700;

    border:1px solid rgba(240,138,40,.15);
}

.diagnosis-title h2{

    margin:12px 0 0;

    color:#222;

    font-size:28px;
    font-weight:800;

    line-height:1.3;
}

/* =========================
   CARD
========================= */

.diagnosis-card{

    display:flex;
    align-items:center;

    gap:20px;

    padding:20px;

    border-radius:26px;

    background:rgba(255,255,255,.88);

    backdrop-filter:blur(15px);
    -webkit-backdrop-filter:blur(15px);

    border:2px solid rgba(240,138,40,.15);

    box-shadow:
        0 10px 25px rgba(0,0,0,.05);

    cursor:pointer;

    transition:.3s ease;
}

.diagnosis-card:hover{

    transform:translateY(-4px);

    border-color:#F08A28;

    box-shadow:
        0 15px 35px rgba(240,138,40,.12);
}

/* =========================
   IMAGE
========================= */

.diagnosis-image{

    width:110px;
    height:110px;

    flex-shrink:0;

    border-radius:20px;

    overflow:hidden;

    background:#FFF8F2;

    border:1px solid rgba(240,138,40,.15);
}

.diagnosis-image img{

    width:100%;
    height:100%;

    object-fit:cover;
}

/* =========================
   CONTENT
========================= */

.diagnosis-content{

    flex:1;
}

.diagnosis-content h3{

    margin:0;

    color:#222;

    font-size:22px;
    font-weight:800;
}

.diagnosis-content p{

    margin-top:10px;

    color:#777;

    font-size:14px;

    line-height:1.8;
}

/* =========================
   CTA
========================= */

.diagnosis-action{

    margin-top:16px;

    width:fit-content;

    padding:10px 16px;

    border-radius:999px;

    background:#F08A28;

    color:white;

    font-size:13px;
    font-weight:700;

    transition:.3s ease;
}

.diagnosis-card:hover .diagnosis-action{

    transform:translateX(4px);
    text-decoration: none;
}

/* =========================
   TABLET
========================= */

@media(max-width:1024px){

    .diagnosis-section{
        padding:0 20px;
    }

}

/* =========================
   MOBILE
========================= */

@media(max-width:768px){

    .diagnosis-section{
        padding:0 15px;
    }

    .diagnosis-title h2{
        font-size:22px;
    }

    .diagnosis-card{

        gap:14px;

        padding:16px;
    }

    .diagnosis-image{

        width:80px;
        height:80px;
    }

    .diagnosis-content h3{

        font-size:17px;
    }

    .diagnosis-content p{

        font-size:13px;
    }

    .diagnosis-action{

        padding:8px 14px;

        font-size:12px;
    }

}

/* =========================
   MOBILE KECIL
========================= */

@media(max-width:480px){

    .diagnosis-card{

        align-items:flex-start;
    }

    .diagnosis-title h2{

        font-size:20px;
    }

}

</style>