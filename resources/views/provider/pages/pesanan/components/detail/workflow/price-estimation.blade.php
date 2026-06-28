@php

$totalProduk = 0;
foreach ($booking->diagnosis?->produks ?? [] as $_p) {
    $_qty = 1;
    if ($_p->pivot) {
        $_qty = $_p->pivot->qty ?? 1;
    } else {
        $_pivot = \Illuminate\Support\Facades\DB::collection('diagnosis_produks')
            ->where('diagnosis_id', $booking->diagnosis->id)
            ->where('produk_id', $_p->id)
            ->first();
        $_qty = $_pivot['qty'] ?? 1;
    }
    $totalProduk += $_p->harga * $_qty;
}

$serviceFee =
    $booking->diagnosis?->service_fee ?? 0;

$grandTotal =
    $totalProduk + $serviceFee;

@endphp

<!-- KARTU BIAYA JASA -->
<div class="estimation-card" style="margin-bottom: 20px;">
    <div class="card-header">
        <h3>
            <i class='bx bx-wrench'></i> Input Biaya Jasa
        </h3>
    </div>
    <form action="{{ route('provider.diagnosis.service-fee') }}" method="POST">
        @csrf
        <input type="hidden" name="diagnosis_id" value="{{ $booking->diagnosis?->id }}">

        <div class="fee-row">
            <span>Biaya Jasa Teknisi</span>
            <input type="number" name="service_fee" value="{{ $serviceFee }}" class="fee-input" min="0" {{ $booking->status !== 'diagnosis' ? 'disabled' : '' }}>
        </div>

        @if($booking->status == 'diagnosis')
        <button type="submit" class="save-fee-btn">
            Simpan Biaya Jasa
        </button>
        @endif
    </form>
</div>

<!-- KARTU BIAYA AKHIR -->
<div class="estimation-card">
    <div class="card-header">
        <h3>
            💰 Biaya Akhir
        </h3>
    </div>

    @if($serviceFee > 0)
    <div class="fee-row">
        <span>Biaya Jasa</span>
        <strong>Rp{{ number_format($serviceFee, 0, ',', '.') }}</strong>
    </div>
    @endif

    <div class="fee-row">
        <span>Total Produk</span>
        <strong>Rp{{ number_format($totalProduk, 0, ',', '.') }}</strong>
    </div>

    <div class="divider"></div>

    <div class="fee-row total">
        <span>Grand Total</span>
        <strong>Rp{{ number_format($grandTotal, 0, ',', '.') }}</strong>
    </div>
</div>

<style>
.price-preview{
    margin-top:12px;

    padding:12px;

    background:#F8FAFC;

    border-radius:12px;

    font-size:13px;

    color:#64748B;
}

.price-preview strong{
    color:#0F172A;
}
.estimation-card{
    background:#fff;

    border:1px solid #E2E8F0;

    border-radius:24px;

    padding:24px;

    box-shadow:
        0 8px 24px rgba(15,23,42,.05);

    margin-bottom:24px;
}

.card-header{
    display:flex;
    align-items:center;
    justify-content:space-between;

    margin-bottom:22px;
}

.card-header h3{
    margin:0;

    font-size:20px;
    font-weight:700;

    color:#0F172A;
}

.fee-row{
    display:flex;
    justify-content:space-between;
    align-items:center;

    gap:16px;

    margin-bottom:16px;
}

.fee-row span{
    font-size:14px;
    color:#64748B;
    font-weight:500;
}

.fee-input{
    width:180px;

    padding:12px 16px;

    border:1px solid #CBD5E1;

    border-radius:14px;

    background:#F8FAFC;

    font-size:15px;
    font-weight:600;

    transition:.3s;
}

.fee-input:focus{
    outline:none;

    border-color:#F08A28;

    background:white;

    box-shadow:
        0 0 0 4px rgba(240,138,40,.15);
}

.save-fee-btn{
    width:100%;

    height:52px;

    border:none;

    border-radius:16px;

    margin-top:8px;

    background:linear-gradient(
        135deg,
        #F08A28,
        #FFB347
    );

    color:white;

    font-size:14px;
    font-weight:700;

    cursor:pointer;

    transition:.3s;
}

.save-fee-btn:hover{
    transform:translateY(-2px);

    box-shadow:
        0 10px 20px rgba(240,138,40,.25);
}

.divider{
    height:1px;

    background:#E2E8F0;

    margin:22px 0;
}

.fee-row strong{
    color:#0F172A;
    font-size:16px;
}

/* GRAND TOTAL */

.fee-row.total{
    background:#FFF7ED;

    border:1px solid #FED7AA;

    border-radius:18px;

    padding:18px;
}

.fee-row.total span{
    font-size:15px;
    font-weight:700;
    color:#C2410C;
}

.fee-row.total strong{
    font-size:24px;
    font-weight:800;

    color:#EA580C;
}

/* MOBILE */

@media(max-width:768px){

    .fee-row{
        flex-direction:column;
        align-items:flex-start;
    }

    .fee-input{
        width:100%;
    }

    .fee-row.total{
        flex-direction:row;
    }

    .fee-row.total strong{
        font-size:20px;
    }

}

</style>