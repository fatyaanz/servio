
@php

$serviceFee =
    $booking->diagnosis?->service_fee ?? 0;

$sparepartTotal = 0;

foreach(
    $booking->diagnosis?->produks ?? []
    as $produk
){

    $sparepartTotal +=
        $produk->harga *
        $produk->pivot->qty;

}

$total =
    $serviceFee +
    $sparepartTotal;

@endphp

<div class="approval-card">

    <div class="approval-header">

        <div class="approval-icon">
            💰
        </div>

        <div class="approval-title">

            <span class="approval-badge">

                Menunggu Persetujuan

            </span>

            <h3>

                Persetujuan Harga

            </h3>

            <p>

                Silakan tinjau estimasi biaya hasil pemeriksaan teknisi.

            </p>

        </div>

    </div>

    <!-- COST BREAKDOWN -->

    <div class="cost-breakdown">

        <div class="cost-row">

            <span>

                Biaya Jasa

            </span>

            <strong>

                Rp{{ number_format(
                    $serviceFee,
                    0,
                    ',',
                    '.'
                ) }}

            </strong>

        </div>

        <div class="cost-row">

            <span>

                Biaya Sparepart

            </span>

            <strong id="sparepartTotalDisplay">

                Rp{{ number_format(
                    $sparepartTotal,
                    0,
                    ',',
                    '.'
                ) }}

            </strong>

        </div>

        <div class="cost-divider"></div>

        <div class="cost-row total">

            <span>

                Total Biaya

            </span>

            <strong id="grandTotalDisplay">

                Rp{{ number_format(
                    $total,
                    0,
                    ',',
                    '.'
                ) }}

            </strong>

        </div>

    </div>

    <!-- NOTE -->

    <div class="approval-note">

        <div class="note-icon">
            ℹ️
        </div>

        <div>

            <strong>

                Catatan Teknisi

            </strong>

            <p>

                Harga di atas merupakan hasil pemeriksaan langsung di lokasi dan akan menjadi biaya final apabila disetujui pelanggan.

            </p>

        </div>

    </div>

    
</div>

<style>

/* =========================
   CARD
========================= */

.approval-card{

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

.approval-header{

    display:flex;

    gap:18px;

    align-items:flex-start;

    margin-bottom:25px;
}

.approval-icon{

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

.approval-title{

    flex:1;
}

.approval-badge{

    display:inline-flex;

    padding:8px 14px;

    border-radius:999px;

    background:#FFF8E8;

    color:#D97706;

    font-size:12px;
    font-weight:700;

    margin-bottom:12px;
}

.approval-title h3{

    margin:0;

    color:#222;

    font-size:24px;
    font-weight:800;
}

.approval-title p{

    margin-top:8px;

    color:#777;

    line-height:1.7;
}

/* =========================
   COST
========================= */

.cost-breakdown{

    background:#FAFAFA;

    border:1px solid #F2F2F2;

    border-radius:20px;

    padding:20px;
}

.cost-row{

    display:flex;

    justify-content:space-between;

    align-items:center;

    margin-bottom:16px;
}

.cost-row:last-child{

    margin-bottom:0;
}

.cost-row span{

    color:#666;

    font-size:15px;
}

.cost-row strong{

    color:#222;

    font-size:15px;
}

.cost-divider{

    height:1px;

    background:#EAEAEA;

    margin:18px 0;
}

/* =========================
   TOTAL
========================= */

.total span{

    color:#222;

    font-size:18px;

    font-weight:700;
}

.total strong{

    color:#F08A28;

    font-size:30px;

    font-weight:800;
}

/* =========================
   NOTE
========================= */

.approval-note{

    margin-top:20px;

    padding:18px;

    border-radius:18px;

    background:#FFF8F2;

    display:flex;

    gap:14px;
}

.note-icon{

    width:40px;
    height:40px;

    border-radius:12px;

    display:flex;
    align-items:center;
    justify-content:center;

    background:white;

    flex-shrink:0;
}

.approval-note strong{

    color:#222;
}

.approval-note p{

    margin:6px 0 0;

    color:#777;

    font-size:14px;

    line-height:1.7;
}

/* =========================
   BUTTONS
========================= */

.approval-actions{

    display:flex;

    gap:15px;

    margin-top:25px;
}

.approve-btn{

    flex:2;

    height:60px;

    border:none;

    border-radius:18px;

    background:linear-gradient(
        135deg,
        #22C55E,
        #34D399
    );

    color:white;

    font-size:16px;
    font-weight:700;

    cursor:pointer;
}

.reject-btn{

    flex:1;

    height:60px;

    border:none;

    border-radius:18px;

    background:#FEE2E2;

    color:#DC2626;

    font-size:16px;
    font-weight:700;

    cursor:pointer;
}

@media(max-width:768px){

    .approval-actions{

        flex-direction:column;
    }

}
</style>

