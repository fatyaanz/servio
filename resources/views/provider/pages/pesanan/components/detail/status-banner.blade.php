@php

$statusConfig = [

    'pending' => [
        'icon' => '<i class="bx bx-time-five"></i>',
        'title' => 'Menunggu Konfirmasi',
        'description' => 'Pesanan baru masuk dan menunggu keputusan Anda.',
        'class' => 'waiting'
    ],

    'accepted' => [
        'icon' => '<i class="bx bx-check-circle"></i>',
        'title' => 'Pesanan Diterima',
        'description' => 'Pesanan telah diterima. Silakan berangkat ke lokasi pelanggan.',
        'class' => 'success'
    ],

    'on_the_way' => [
        'icon' => '<i class="bx bxs-car"></i>',
        'title' => 'Menuju Lokasi',
        'description' => 'Teknisi sedang dalam perjalanan menuju lokasi pelanggan.',
        'class' => 'primary'
    ],

    'diagnosis' => [
        'icon' => '<i class="bx bx-search"></i>',
        'title' => 'Pengecekan Kerusakan',
        'description' => 'Lakukan inspeksi dan catat kerusakan yang ditemukan.',
        'class' => 'warning'
    ],

    'waiting_approval' => [
        'icon' => '<i class="bx bx-wallet"></i>',
        'title' => 'Menunggu Persetujuan',
        'description' => 'Estimasi biaya telah dikirim ke pelanggan.',
        'class' => 'warning'
    ],

    'approved' => [
        'icon' => '<i class="bx bx-like"></i>',
        'title' => 'Harga Disetujui',
        'description' => 'Pelanggan telah menyetujui estimasi biaya. Anda dapat memulai perbaikan.',
        'class' => 'info'
    ],

    'working' => [
        'icon' => '<i class="bx bx-wrench"></i>',
        'title' => 'Sedang Dikerjakan',
        'description' => 'Perbaikan sedang berlangsung.',
        'class' => 'primary'
    ],

    'payment' => [
        'icon' => '<i class="bx bx-credit-card"></i>',
        'title' => 'Menunggu Pembayaran',
        'description' => 'Pekerjaan selesai dan menunggu pembayaran.',
        'class' => 'success'
    ],

    'completed' => [
        'icon' => '<i class="bx bx-party"></i>',
        'title' => 'Pesanan Selesai',
        'description' => 'Layanan telah selesai dikerjakan.',
        'class' => 'success'
    ],

    'cancelled' => [
        'icon' => '<i class="bx bx-x-circle"></i>',
        'title' => 'Pesanan Dibatalkan',
        'description' => 'Pesanan telah dibatalkan.',
        'class' => 'danger'
    ],

    'rejected' => [

        'icon' => '<i class="bx bx-error"></i>',

        'title' => 'Estimasi Ditolak',

        'description' => 'Pelanggan menolak estimasi biaya yang diberikan.',

        'class' => 'warning'

    ],  

];

$current =
    $statusConfig[$booking->status];

@endphp

<div class="status-banner {{ $current['class'] }}">

    <div class="status-icon">

        {!! $current['icon'] !!}

    </div>

    <div class="status-content">

        <span class="status-badge">

            Status Pesanan

        </span>

        <h3>

            {{ $current['title'] }}

        </h3>

        <p>

            {{ $current['description'] }}

        </p>

    </div>

</div>

<style>
    

.status-banner{
    position:relative;
    overflow:hidden;

    display:flex;
    align-items:center;
    gap:18px;

    padding:22px;

    border-radius:22px;

    border:1px solid;

    margin-bottom:24px;

    box-shadow:
        0 8px 24px rgba(15,23,42,.06);

    transition:.3s ease;
}

.status-banner:hover{
    transform:translateY(-2px);
}

.status-banner.warning{

    border-left:6px solid #F59E0B;

    background:#FFF7E6;

}

.status-banner.warning .status-icon{

    background:#FEF3C7;

    color:#D97706;

}

.status-banner::before{
    content:"";
    position:absolute;
    top:0;
    left:0;
    width:6px;
    height:100%;
}

.status-banner::after{
    content:"";
    position:absolute;
    width:180px;
    height:180px;
    right:-70px;
    top:-70px;
    border-radius:50%;
    opacity:.08;
    background:currentColor;
}

.status-icon{
    width:72px;
    height:72px;

    flex-shrink:0;

    display:flex;
    align-items:center;
    justify-content:center;

    font-size:34px;

    border-radius:20px;

    background:white;

    box-shadow:
        0 4px 12px rgba(0,0,0,.05);
}

.status-content{
    flex:1;
}

.status-badge{
    display:inline-flex;
    align-items:center;

    padding:6px 12px;

    border-radius:999px;

    font-size:12px;
    font-weight:700;

    margin-bottom:10px;

    background:rgba(255,255,255,.7);
    backdrop-filter:blur(10px);
}

.status-content h3{
    margin:0;

    font-size:22px;
    font-weight:700;

    line-height:1.3;
}

.status-content p{
    margin-top:6px;

    font-size:14px;

    color:#64748B;

    line-height:1.6;
}

/* SUCCESS */

.status-banner.success{
    background:linear-gradient(
        135deg,
        #ECFDF5,
        #F0FDF4
    );

    border-color:#BBF7D0;

    color:#15803D;
}

.status-banner.success::before{
    background:#22C55E;
}

/* PRIMARY */

.status-banner.primary{
    background:linear-gradient(
        135deg,
        #EFF6FF,
        #F8FAFC
    );

    border-color:#BFDBFE;

    color:#2563EB;
}

.status-banner.primary::before{
    background:#3B82F6;
}

/* WARNING */

.status-banner.warning{
    background:linear-gradient(
        135deg,
        #FFF8E8,
        #FFFBEB
    );

    border-color:#FDE68A;

    color:#D97706;
}

.status-banner.warning::before{
    background:#F59E0B;
}

/* DANGER */

.status-banner.danger{
    background:linear-gradient(
        135deg,
        #FEF2F2,
        #FFF5F5
    );

    border-color:#FECACA;

    color:#DC2626;
}

.status-banner.danger::before{
    background:#EF4444;
}

/* MOBILE */

@media(max-width:768px){

    .status-banner{
        padding:18px;
        gap:14px;
    }

    .status-icon{
        width:60px;
        height:60px;
        font-size:28px;
    }

    .status-content h3{
        font-size:18px;
    }

    .status-content p{
        font-size:13px;
    }

}

</style>
