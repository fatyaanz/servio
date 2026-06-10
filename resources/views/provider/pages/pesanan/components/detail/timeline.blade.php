@php

$steps = [

    'pending' => [
        'icon' => '⏳',
        'title' => 'Menunggu Konfirmasi'
    ],

    'accepted' => [
        'icon' => '✅',
        'title' => 'Pesanan Diterima'
    ],

    'on_the_way' => [
        'icon' => '🚗',
        'title' => 'Teknisi Menuju Lokasi'
    ],

    'diagnosis' => [
        'icon' => '🔍',
        'title' => 'Pengecekan Kerusakan'
    ],

    'waiting_approval' => [
        'icon' => '💰',
        'title' => 'Menunggu Persetujuan'
    ],

    'rejected'=>[
        'icon' => '⚠️',
        'title' => 'Estimasi Ditolak'
    ],

    'approved' => [
        'icon' => '👍',
        'title' => 'Harga Disetujui'
    ],

    'working' => [
        'icon' => '🛠️',
        'title' => 'Sedang Dikerjakan'
    ],

    'payment' => [
        'icon' => '💳',
        'title' => 'Pembayaran'
    ],

    'completed' => [
        'icon' => '🎉',
        'title' => 'Selesai'
    ]

];

$statuses = array_keys($steps);

$currentIndex =
    array_search(
        $booking->status,
        $statuses
    );

@endphp

<div class="timeline">

    @foreach($steps as $status => $step)

        @php

        $stepIndex =
            array_search(
                $status,
                $statuses
            );

        $class = '';

        if($stepIndex < $currentIndex){

            $class = 'completed';

        }elseif($stepIndex == $currentIndex){

            $class = 'active';
        }

        @endphp

        <div class="timeline-item {{ $class }}">

            <div class="timeline-icon">

                {{ $step['icon'] }}

            </div>

            <div class="timeline-content">

                <h4>
                    {{ $step['title'] }}
                </h4>

                @if($class == 'completed')
                    <span class="timeline-status done">
                        Selesai
                    </span>

                @elseif($class == 'active')
                    <span class="timeline-status active">
                        Sedang Berjalan
                    </span>
                @endif

            </div>

        </div>

    @endforeach

</div>

<style>

.timeline{
    position:relative;

    display:flex;
    flex-direction:column;
    gap:18px;

    padding:20px;

    background:#fff;

    border-radius:22px;

    border:1px solid #E2E8F0;

    box-shadow:
        0 8px 24px rgba(15,23,42,.05);
}

.timeline-item{
    position:relative;

    display:flex;
    align-items:flex-start;

    gap:16px;

    padding-bottom:20px;
}

.timeline-item:last-child{
    padding-bottom:0;
}

.timeline-item:not(:last-child)::after{
    content:"";

    position:absolute;

    left:21px;
    top:48px;

    width:3px;

    height:calc(100% - 20px);

    background:#E2E8F0;

    border-radius:999px;
}

/* ICON */

.timeline-icon{
    width:44px;
    height:44px;

    min-width:44px;

    display:flex;
    align-items:center;
    justify-content:center;

    border-radius:50%;

    background:#F8FAFC;

    border:2px solid #CBD5E1;

    font-size:18px;

    transition:.3s;
}

/* CONTENT */

.timeline-content{
    flex:1;
    padding-top:4px;
}

.timeline-content h4{
    margin:0;

    font-size:15px;
    font-weight:600;

    color:#64748B;
}

/* COMPLETED */

.timeline-item.completed .timeline-icon{
    background:#22C55E;
    border-color:#22C55E;
    color:white;
}

.timeline-item.completed::after{
    background:#22C55E;
}

.timeline-item.completed h4{
    color:#0F172A;
}

/* ACTIVE */

.timeline-item.active .timeline-icon{
    background:#F59E0B;
    border-color:#F59E0B;

    color:white;

    box-shadow:
        0 0 0 8px rgba(245,158,11,.15);
}

.timeline-item.active h4{
    color:#0F172A;
    font-weight:700;
}

/* PENDING */

.timeline-item:not(.completed):not(.active) .timeline-icon{
    background:#F8FAFC;
    border-color:#CBD5E1;
}

.timeline-item:not(.completed):not(.active) h4{
    color:#94A3B8;
}

/* MOBILE */

@media(max-width:768px){

    .timeline{
        padding:16px;
    }

    .timeline-icon{
        width:40px;
        height:40px;
        min-width:40px;

        font-size:16px;
    }

    .timeline-item:not(:last-child)::after{
        left:19px;
    }

    .timeline-content h4{
        font-size:14px;
    }

}

</style>