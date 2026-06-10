<div class="diagnosis-result-container">

    <a href="{{ route('diagnosis.form') }}" class="back-btn">

        <svg width="20"
             height="20"
             viewBox="0 0 24 24"
             fill="none">

            <path
                d="M15 18L9 12L15 6"
                stroke="currentColor"
                stroke-width="2.5"
                stroke-linecap="round"
                stroke-linejoin="round"/>

        </svg>

    </a>

    <div class="result-card">

        <div class="step-badge">
            Hasil Diagnosis
        </div>

        <h1>
            Analisis Kerusakan Selesai
        </h1>

        <p class="result-subtitle">
            Berdasarkan informasi yang Anda berikan,
            berikut beberapa kemungkinan perbaikan
            yang dapat dilakukan oleh teknisi.
        </p>

        <div class="analysis-box">

            <h3>
                Kemungkinan Perbaikan
            </h3>

            <button class="repair-option active">
                🔧 Ganti kabel saluran air radiator
            </button>

            <button class="repair-option">
                ❄️ Ganti freon
            </button>

            <button class="repair-option">
                🧼 Bersihkan saringan
            </button>

        </div>

        <div class="analysis-note">

            <div class="note-icon">
                💡
            </div>

            <div>
                Pilih salah satu jenis perbaikan yang paling sesuai.
                Setelah itu Anda dapat langsung melakukan booking
                teknisi yang tersedia.
            </div>

        </div>

        <a href="{{ route('booking.diagnosis') }}"class="find-technician-btn">

            Booking Sekarang

            <svg width="18"
                 height="18"
                 viewBox="0 0 24 24"
                 fill="none">

                <path
                    d="M5 12H19M19 12L13 6M19 12L13 18"
                    stroke="currentColor"
                    stroke-width="2.5"
                    stroke-linecap="round"
                    stroke-linejoin="round"/>

            </svg>

        </a>

    </div>

</div>

<style>

/* =========================
   CONTAINER
========================= */

.diagnosis-result-container{

    max-width:900px;

    margin:20px auto 120px;

    padding:0 30px;
}

/* =========================
   BACK BUTTON
========================= */

.back-btn{

    width:48px;
    height:48px;

    display:flex;
    align-items:center;
    justify-content:center;

    text-decoration:none;

    color:#333;

    border-radius:16px;

    background:rgba(255,255,255,.85);

    backdrop-filter:blur(15px);

    border:1px solid rgba(255,255,255,.4);

    box-shadow:
        0 8px 20px rgba(0,0,0,.06);

    margin-bottom:20px;

    transition:.3s ease;
}

.back-btn:hover{

    background:#F08A28;

    color:white;

    transform:translateY(-2px);
}

/* =========================
   CARD
========================= */

.result-card{

    background:rgba(255,255,255,.88);

    backdrop-filter:blur(15px);

    border-radius:28px;

    padding:30px;

    border:1px solid rgba(240,138,40,.08);

    box-shadow:
        0 10px 25px rgba(0,0,0,.04);
}

/* =========================
   BADGE
========================= */

.step-badge{

    width:fit-content;

    padding:8px 14px;

    border-radius:999px;

    background:rgba(240,138,40,.10);

    color:#F08A28;

    font-size:12px;
    font-weight:700;

    margin-bottom:15px;
}

/* =========================
   TITLE
========================= */

.result-card h1{

    margin:0;

    color:#222;

    font-size:32px;
    font-weight:800;
}

.result-subtitle{

    margin-top:12px;

    color:#777;

    font-size:15px;

    line-height:1.8;
}

/* =========================
   ANALYSIS BOX
========================= */

.analysis-box{

    margin-top:25px;

    padding:20px;

    border-radius:22px;

    background:#FFF8F3;

    border:1px solid rgba(240,138,40,.10);
}

.analysis-box h3{

    margin:0 0 15px;

    color:#222;

    font-size:18px;
}

/* =========================
   REPAIR OPTION
========================= */

.repair-option{

    width:100%;

    border:none;

    text-align:left;

    padding:16px 18px;

    border-radius:16px;

    margin-bottom:12px;

    background:white;

    color:#444;

    font-size:14px;
    font-weight:600;

    cursor:pointer;

    transition:.3s ease;
}

.repair-option:last-child{
    margin-bottom:0;
}

.repair-option:hover{

    transform:translateX(4px);

    background:#FFF1E4;
}

.repair-option.active{

    background:#F08A28;

    color:white;
}

/* =========================
   NOTE
========================= */

.analysis-note{

    margin-top:20px;

    display:flex;
    align-items:flex-start;

    gap:12px;

    padding:16px;

    border-radius:16px;

    background:#F8F8F8;

    color:#666;

    font-size:14px;

    line-height:1.8;
}

.note-icon{

    font-size:18px;
}

/* =========================
   BUTTON
========================= */

.find-technician-btn{

    margin-top:25px;

    width:100%;
    height:60px;

    display:flex;
    align-items:center;
    justify-content:center;

    gap:10px;

    text-decoration:none;

    border-radius:18px;

    background:linear-gradient(
        135deg,
        #F08A28,
        #FFB04D
    );

    color:white;

    font-weight:700;

    box-shadow:
        0 10px 25px rgba(240,138,40,.25);

    transition:.3s ease;
}

.find-technician-btn:hover{

    transform:translateY(-2px);

    box-shadow:
        0 15px 35px rgba(240,138,40,.35);
}

/* =========================
   MOBILE
========================= */

@media(max-width:768px){

    .diagnosis-result-container{

        padding:0 15px;
    }

    .result-card{

        padding:20px;
    }

    .result-card h1{

        font-size:24px;
    }

    .result-subtitle{

        font-size:14px;
    }

    .analysis-note{

        font-size:13px;
    }

    .find-technician-btn{

        height:54px;
    }

}

</style>