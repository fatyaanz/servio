
@php

$statusConfig = [

    'pending' => [
        'class' => 'waiting',
        'icon' => '⏳',
        'title' => 'Menunggu Konfirmasi',
        'description' =>
            'Penyedia layanan sedang meninjau pesanan Anda.'
    ],

    'accepted' => [
        'class' => 'accepted',
        'icon' => '✅',
        'title' => 'Pesanan Diterima',
        'description' =>
            'Penyedia layanan telah menerima pesanan Anda.'
    ],

    'on_the_way' => [
        'class' => 'progress',
        'icon' => '🚗',
        'title' => 'Teknisi Menuju Lokasi',
        'description' =>
            'Teknisi sedang menuju lokasi Anda.'
    ],

    'diagnosis' => [
        'class' => 'progress',
        'icon' => '🔍',
        'title' => 'Proses Diagnosa',
        'description' =>
            'Teknisi sedang memeriksa kerusakan dan menyiapkan estimasi biaya.'
    ],

    'waiting_approval' => [
        'class' => 'waiting',
        'icon' => '📨',
        'title' => 'Menunggu Persetujuan',
        'description' =>
            'Estimasi biaya telah dikirim. Mohon tinjau dan berikan persetujuan.'
    ],

    'approved' => [
        'class' => 'approved',
        'icon' => '👍',
        'title' => 'Harga Disetujui',
        'description' =>
            'Estimasi biaya telah disetujui. Menunggu teknisi memulai perbaikan.'
    ],

    'working' => [
        'class' => 'progress',
        'icon' => '🛠️',
        'title' => 'Perbaikan Sedang Berlangsung',
        'description' =>
            'Teknisi sedang melakukan proses perbaikan.'
    ],

    'payment' => [
        'class' => 'accepted',
        'icon' => '💳',
        'title' => 'Menunggu Pembayaran',
        'description' =>
            'Perbaikan selesai. Silakan lakukan pembayaran.'
    ],

    'completed' => [
        'class' => 'completed',
        'icon' => '🎉',
        'title' => 'Pesanan Selesai',
        'description' =>
            'Layanan telah berhasil diselesaikan.'
    ],

    'cancelled' => [
        'class' => 'cancelled',
        'icon' => '❌',
        'title' => 'Pesanan Dibatalkan',
        'description' =>
            'Pesanan tidak dapat diproses.'
    ],

    'rejected' => [

        'icon' => '⚠️',

        'title' => 'Estimasi Ditolak',

        'description' => 'Kamu menolak harga yang ditawarkan provider.',

        'class' => 'warning'

    ],

];

$current = $statusConfig[$booking->status];

@endphp
<div class="status-banner {{ $current['class'] }}">

    <div class="status-icon">

        {{ $current['icon'] }}

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

/* =========================
   STATUS BANNER
========================= */

.status-banner{

    max-width:1200px;

    margin:20px auto;

    padding:22px;

    display:flex;

    align-items:center;

    gap:18px;

    border-radius:24px;

    position:relative;

    overflow:hidden;

    border:1px solid transparent;
}
.status-banner.warning{

    border-left:6px solid #F59E0B;

    background:#FFF7E6;

}

.status-banner.warning .status-icon{

    background:#FEF3C7;

    color:#D97706;

}

/* =========================
   WAITING
========================= */

.status-banner.waiting{

    background:#FFF8E8;

    border-color:#FDE68A;
}

.status-banner.waiting::before{

    content:"";

    position:absolute;

    left:0;
    top:0;

    width:6px;
    height:100%;

    background:#F59E0B;
}
.status-banner.accepted{

    background:#ECFDF5;

    border-color:#86EFAC;
}

.status-banner.accepted::before{

    content:"";

    position:absolute;

    left:0;
    top:0;

    width:6px;
    height:100%;

    background:#22C55E;
}

.status-banner.accepted{

    background:#ECFDF5;

    border-color:#86EFAC;
}

.status-banner.accepted::before{

    content:"";

    position:absolute;

    left:0;
    top:0;

    width:6px;
    height:100%;

    background:#22C55E;
}

.status-banner.progress{

    background:#EFF6FF;

    border-color:#93C5FD;
}

.status-banner.progress::before{

    content:"";

    position:absolute;

    left:0;
    top:0;

    width:6px;
    height:100%;

    background:#3B82F6;
}

.status-banner.completed{

    background:#F0FDF4;

    border-color:#4ADE80;
}

.status-banner.completed::before{

    content:"";

    position:absolute;

    left:0;
    top:0;

    width:6px;
    height:100%;

    background:#16A34A;
}

.status-banner.cancelled{

    background:#FEF2F2;

    border-color:#FCA5A5;
}

.status-banner.cancelled::before{

    content:"";

    position:absolute;

    left:0;
    top:0;

    width:6px;
    height:100%;

    background:#EF4444;
}

.status-banner.approved{

    background:#EFF6FF;

    border-color:#93C5FD;
}

.status-banner.approved::before{

    content:"";

    position:absolute;

    left:0;
    top:0;

    width:6px;
    height:100%;

    background:#3B82F6;
}

/* =========================
   ICON
========================= */

.status-icon{

    width:65px;
    height:65px;

    display:flex;

    align-items:center;
    justify-content:center;

    border-radius:18px;

    background:white;

    font-size:30px;

    flex-shrink:0;

    box-shadow:
        0 4px 12px rgba(0,0,0,.05);
}

/* =========================
   CONTENT
========================= */

.status-content{

    flex:1;
}

.status-badge{

    display:inline-flex;

    padding:6px 12px;

    border-radius:999px;

    background:rgba(245,158,11,.12);

    color:#D97706;

    font-size:12px;
    font-weight:700;

    margin-bottom:10px;
}

.status-content h3{

    margin:0;

    color:#D97706;

    font-size:24px;
    font-weight:800;
}

.status-content p{

    margin-top:8px;

    color:#7C6F57;

    line-height:1.7;

    font-size:14px;
}

/* =========================
   MOBILE
========================= */

@media(max-width:768px){

    .status-banner{

        margin:15px;

        padding:18px;
    }

    .status-icon{

        width:52px;
        height:52px;

        font-size:24px;
    }

    .status-content h3{

        font-size:18px;
    }

    .status-content p{

        font-size:13px;
    }

}

</style>