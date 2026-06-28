@php
$serviceFee = $booking->diagnosis?->service_fee ?? 0;
$sparepartTotal = 0;
$selectedProduks = [];

foreach ($booking->diagnosis?->produks ?? [] as $produk) {
    $_pivot = \App\Helpers\PivotHelper::getDiagnosisProdukPivot($booking->diagnosis->id, $produk->id);
    if ($_pivot['is_selected']) {
        $sparepartTotal += $produk->harga * $_pivot['qty'];
        $produk->_qty = $_pivot['qty'];
        $selectedProduks[] = $produk;
    }
}

$appFee = 5000;
$total = $serviceFee + $sparepartTotal + $appFee;
@endphp

<div class="receipt-card">
    <div class="receipt-header">
        <div class="receipt-success-icon">✓</div>
        <h3>Struk Pembayaran</h3>
        <p>Transaksi ServioPay Berhasil</p>
    </div>

    <div class="receipt-divider-dotted"></div>

    <div class="receipt-details">
        <div class="receipt-row">
            <span class="label">ID Order</span>
            <span class="val font-orange">#{{ $booking->formatted_id }}</span>
        </div>
        <div class="receipt-row">
            <span class="label">Tanggal Bayar</span>
            <span class="val">{{ $booking->transaction ? $booking->transaction->created_at->format('d M Y • H:i') : now()->format('d M Y • H:i') }}</span>
        </div>
        <div class="receipt-row">
            <span class="label">Metode Pembayaran</span>
            <span class="val font-green">ServioPay</span>
        </div>
        <div class="receipt-row">
            <span class="label">Penyedia Layanan</span>
            <span class="val">{{ $booking->provider->name }}</span>
        </div>
    </div>

    <div class="receipt-divider-dotted"></div>

    <div class="receipt-breakdown">
        <h4>Rincian Biaya</h4>
        
        <div class="breakdown-row">
            <span>Biaya Jasa (Service Fee)</span>
            <strong>Rp{{ number_format($serviceFee, 0, ',', '.') }}</strong>
        </div>

        @if(!empty($selectedProduks))
            <div class="breakdown-subtitle">Sparepart/Produk Disetujui:</div>
            @foreach($selectedProduks as $p)
                <div class="breakdown-row sub-item">
                    <span>{{ $p->nama_produk }} (x{{ $p->_qty ?? 1 }})</span>
                    <span>Rp{{ number_format($p->harga * ($p->_qty ?? 1), 0, ',', '.') }}</span>
                </div>
            @endforeach
        @endif

        <div class="breakdown-row">
            <span>Biaya Layanan Aplikasi</span>
            <strong>Rp{{ number_format($appFee, 0, ',', '.') }}</strong>
        </div>

        <div class="receipt-divider-solid"></div>

        <div class="breakdown-row total-row">
            <span>Total Pembayaran</span>
            <span class="total-amount">Rp{{ number_format($total, 0, ',', '.') }}</span>
        </div>
    </div>

    <div class="receipt-footer">
        <p>Terima kasih telah menggunakan layanan Servio</p>
        <small>Simpan struk digital ini sebagai bukti pembayaran sah Anda.</small>
    </div>
</div>

<style>
.receipt-card {
    max-width: 1200px;
    margin: 25px auto;
    padding: 30px;
    background: #FFFFFF;
    border-radius: 28px;
    border: 1px solid rgba(240, 138, 40, 0.12);
    box-shadow: 0 12px 30px rgba(0,0,0,0.04);
}

.receipt-header {
    text-align: center;
    margin-bottom: 20px;
}

.receipt-success-icon {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    background: #EAF7EC;
    color: #22C55E;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 28px;
    font-weight: 700;
    margin: 0 auto 15px;
    box-shadow: 0 4px 10px rgba(34,197,94,0.15);
}

.receipt-header h3 {
    margin: 0;
    font-size: 22px;
    font-weight: 800;
    color: #222;
}

.receipt-header p {
    margin: 6px 0 0;
    font-size: 14px;
    color: #22C55E;
    font-weight: 700;
}

.receipt-divider-dotted {
    border-top: 2px dotted #E5E7EB;
    margin: 20px 0;
    height: 0;
}

.receipt-divider-solid {
    border-top: 1px solid #EAEAEA;
    margin: 15px 0;
}

.receipt-details .receipt-row {
    display: flex;
    justify-content: space-between;
    margin-bottom: 12px;
    font-size: 14px;
}

.receipt-details .receipt-row:last-child {
    margin-bottom: 0;
}

.receipt-details .label {
    color: #888;
    font-weight: 500;
}

.receipt-details .val {
    color: #222;
    font-weight: 700;
}

.font-orange {
    color: #F08A28 !important;
}

.font-green {
    color: #22C55E !important;
}

.receipt-breakdown h4 {
    margin: 0 0 15px;
    font-size: 16px;
    font-weight: 800;
    color: #222;
}

.breakdown-row {
    display: flex;
    justify-content: space-between;
    margin-bottom: 12px;
    font-size: 14px;
    color: #555;
}

.breakdown-subtitle {
    font-size: 12px;
    font-weight: 700;
    color: #888;
    margin: 15px 0 8px;
    text-transform: uppercase;
}

.breakdown-row.sub-item {
    padding-left: 15px;
    font-size: 13px;
    color: #666;
    margin-bottom: 8px;
}

.total-row {
    font-size: 16px;
    font-weight: 800;
    color: #222;
    margin-bottom: 0;
}

.total-amount {
    font-size: 26px !important;
    color: #F08A28 !important;
    font-weight: 800;
}

.receipt-footer {
    text-align: center;
    margin-top: 30px;
    padding-top: 20px;
    border-top: 1px solid #F2F2F2;
}

.receipt-footer p {
    margin: 0;
    font-size: 13px;
    color: #666;
    font-weight: 600;
}

.receipt-footer small {
    display: block;
    margin-top: 6px;
    color: #aaa;
    font-size: 11px;
}
</style>
