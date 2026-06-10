<div class="diagnosis-card">

    <div class="diagnosis-header">

        <div class="diagnosis-icon">
            🔍
        </div>

        <div class="diagnosis-title">

            <span class="diagnosis-badge">
                Diagnosa Selesai
            </span>

            <h3>
                Hasil Diagnosa Teknisi
            </h3>

            <p>
                Kerusakan yang ditemukan setelah proses pengecekan perangkat.
            </p>

        </div>

    </div>

    <div class="diagnosis-list">

        @forelse(
            $booking->diagnosis?->damageReports ?? []
            as $damage
        )

            <div class="diagnosis-item">

                <div class="check-icon">
                    ✓
                </div>

                <div class="diagnosis-content">

                    <strong>

                        {{ $damage->title }}

                    </strong>

                    <p>

                        {{ $damage->description }}

                    </p>

                </div>

            </div>

        @empty

            <div class="diagnosis-item">

                <div class="diagnosis-content">

                    <strong>

                        Belum Ada Hasil Diagnosa

                    </strong>

                    <p>

                        Teknisi belum mengirimkan hasil pemeriksaan.

                    </p>

                </div>

            </div>

        @endforelse

    </div>

</div>

<style>

/* =========================
   CARD
========================= */

.diagnosis-card{

    max-width:1200px;

    margin:20px auto;

    padding:25px;

    border-radius:28px;

    background:#FFFFFF;

    border:1px solid rgba(240,138,40,.08);

    box-shadow:
        0 10px 25px rgba(0,0,0,.05);
}

/* =========================
   HEADER
========================= */

.diagnosis-header{

    display:flex;

    align-items:flex-start;

    gap:18px;

    margin-bottom:25px;
}

.diagnosis-icon{

    width:65px;
    height:65px;

    border-radius:20px;

    display:flex;
    align-items:center;
    justify-content:center;

    background:#FFF6EE;

    font-size:30px;

    flex-shrink:0;
}

.diagnosis-title{

    flex:1;
}

.diagnosis-badge{

    display:inline-flex;

    padding:8px 14px;

    border-radius:999px;

    background:#ECFDF3;

    color:#16A34A;

    font-size:12px;
    font-weight:700;

    margin-bottom:12px;
}

.diagnosis-title h3{

    margin:0;

    color:#222;

    font-size:24px;
    font-weight:800;
}

.diagnosis-title p{

    margin-top:8px;

    color:#777;

    line-height:1.7;
}

/* =========================
   LIST
========================= */

.diagnosis-list{

    display:flex;

    flex-direction:column;

    gap:16px;
}

/* =========================
   ITEM
========================= */

.diagnosis-item{

    display:flex;

    gap:15px;

    padding:18px;

    border-radius:18px;

    background:#FAFAFA;

    border:1px solid #F1F1F1;

    transition:.3s ease;
}

.diagnosis-item:hover{

    border-color:#F08A28;

    transform:translateY(-2px);
}

/* =========================
   ICON
========================= */

.check-icon{

    width:34px;
    height:34px;

    border-radius:50%;

    background:#22C55E;

    color:white;

    display:flex;
    align-items:center;
    justify-content:center;

    font-size:14px;
    font-weight:700;

    flex-shrink:0;
}

/* =========================
   CONTENT
========================= */

.diagnosis-content{

    flex:1;
}

.diagnosis-content strong{

    display:block;

    color:#222;

    font-size:16px;
    font-weight:700;

    margin-bottom:6px;
}

.diagnosis-content p{

    margin:0;

    color:#777;

    line-height:1.7;

    font-size:14px;
}

/* =========================
   MOBILE
========================= */

@media(max-width:768px){

    .diagnosis-card{

        margin:15px;

        padding:20px;
    }

    .diagnosis-header{

        gap:12px;
    }

    .diagnosis-icon{

        width:50px;
        height:50px;

        font-size:24px;
    }

    .diagnosis-title h3{

        font-size:20px;
    }

    .diagnosis-content strong{

        font-size:15px;
    }

    .diagnosis-content p{

        font-size:13px;
    }

}

</style>