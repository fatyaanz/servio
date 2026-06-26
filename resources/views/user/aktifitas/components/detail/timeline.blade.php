
<div class="timeline-card">

    <div class="timeline-header">

        <div class="timeline-header-icon">
            📋
        </div>

        <div>

            <h3>
                Progress Pesanan
            </h3>

            <p>
                Pantau perkembangan layanan secara real-time
            </p>

        </div>

    </div>

    @php

    $steps = [

        'pending' => [
            'icon' => '⏳',
            'title' => 'Pesanan Dibuat'
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
            'title' => 'Diagnosa Kerusakan'
        ],

        'waiting_approval' => [
            'icon' => '📨',
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
            'title' => 'Perbaikan Berlangsung'
        ],

        'payment' => [
            'icon' => '💳',
            'title' => 'Menunggu Pembayaran'
        ],

        'completed' => [
            'icon' => '🎉',
            'title' => 'Pesanan Selesai'
        ],

    ];

    if ($booking->customer_location === 'inside') {
        unset($steps['waiting_approval']);
        unset($steps['rejected']);
        unset($steps['approved']);
    } else {
        if ($booking->status === 'rejected') {
            unset($steps['approved']);
        } elseif (in_array($booking->status, ['approved', 'working', 'payment', 'completed'])) {
            unset($steps['rejected']);
        }
    }

    $currentStatus = $booking->status;

    $statusOrder = array_keys($steps);

    $currentIndex = array_search($currentStatus, $statusOrder);
    if ($currentIndex === false) {
        $currentIndex = 0;
    }

    @endphp

    <div class="timeline-steps-wrapper collapsed">
        <div class="timeline">

            @foreach($steps as $key => $step)

                @php

                    $index =
                        array_search(
                            $key,
                            $statusOrder
                        );

                    $class = '';

                    if($index < $currentIndex){

                        $class = 'completed';

                    }elseif($index == $currentIndex){

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

                    </div>

                </div>

            @endforeach

        </div>
    </div>

    <div class="timeline-toggle-btn" onclick="toggleTimeline()" style="cursor: pointer; display: flex; align-items: center; justify-content: center; gap: 8px; padding: 14px 20px; background: #FFF6EE; border-radius: 16px; color: #F08A28; font-weight: 700; margin-top: 20px; font-size: 14px; transition: 0.3s; box-shadow: 0 4px 10px rgba(240,138,40,0.05);">
        <span id="toggle-text">Lihat Detail Progress</span>
        <span id="toggle-icon">▼</span>
    </div>

</div>

<script>
function toggleTimeline() {
    const wrapper = document.querySelector('.timeline-steps-wrapper');
    const text = document.getElementById('toggle-text');
    const icon = document.getElementById('toggle-icon');
    if (wrapper.classList.contains('collapsed')) {
        wrapper.classList.remove('collapsed');
        text.innerText = 'Sembunyikan';
        icon.innerText = '▲';
    } else {
        wrapper.classList.add('collapsed');
        text.innerText = 'Lihat Detail Progress';
        icon.innerText = '▼';
    }
}
</script>

<style>

/* =========================
   CARD
========================= */

.timeline-card{

    max-width:1200px;

    margin:20px auto;

    padding:25px;

    background:white;

    border-radius:24px;

    border:1px solid rgba(240,138,40,.08);

    box-shadow:
        0 10px 25px rgba(0,0,0,.05);
}

/* =========================
   HEADER
========================= */

.timeline-header{

    display:flex;

    align-items:center;

    gap:15px;

    margin-bottom:25px;
}

.timeline-header-icon{

    width:55px;
    height:55px;

    border-radius:18px;

    display:flex;

    align-items:center;

    justify-content:center;

    background:#FFF6EE;

    font-size:24px;
}

.timeline-header h3{

    margin:0;

    color:#222;

    font-size:22px;

    font-weight:800;
}

.timeline-header p{

    margin-top:5px;

    color:#777;

    font-size:14px;
}

/* =========================
   TIMELINE
========================= */

.timeline-steps-wrapper.collapsed .timeline-item:not(.active) {
    display: none !important;
}

.timeline-steps-wrapper.collapsed .timeline::before {
    display: none !important;
}

.timeline{

    position:relative;
}

.timeline::before{

    content:"";

    position:absolute;

    left:19px;

    top:0;

    bottom:0;

    width:3px;

    background:#ECECEC;
}

/* =========================
   ITEM
========================= */

.timeline-item{

    position:relative;

    display:flex;

    gap:18px;

    margin-bottom:28px;

    z-index:1;
}

.timeline-item:last-child{

    margin-bottom:0;
}

/* =========================
   ICON
========================= */

.timeline-icon{

    width:40px;

    height:40px;

    border-radius:50%;

    display:flex;

    align-items:center;

    justify-content:center;

    background:#F3F4F6;

    color:#9CA3AF;

    font-size:16px;

    flex-shrink:0;

    border:3px solid white;

    box-shadow:
        0 2px 6px rgba(0,0,0,.05);
}

/* =========================
   COMPLETED
========================= */

.timeline-item.completed .timeline-icon{

    background:#22C55E;

    color:white;
}

.timeline-item.completed h4{

    color:#22C55E;
}

/* =========================
   ACTIVE
========================= */

.timeline-item.active .timeline-icon{

    background:#F08A28;

    color:white;

    animation:pulse 2s infinite;
}

.timeline-item.active h4{

    color:#F08A28;
}

/* =========================
   CONTENT
========================= */

.timeline-content{

    padding-top:4px;
}

.timeline-content h4{

    margin:0;

    font-size:16px;

    font-weight:700;

    color:#444;
}

/* =========================
   ANIMATION
========================= */

@keyframes pulse{

    0%{
        box-shadow:0 0 0 0 rgba(240,138,40,.4);
    }

    70%{
        box-shadow:0 0 0 12px rgba(240,138,40,0);
    }

    100%{
        box-shadow:0 0 0 0 rgba(240,138,40,0);
    }
}

@media(max-width:768px){

    .timeline-card{

        margin:15px;

        padding:20px;
    }

    .timeline-header-icon{

        width:45px;

        height:45px;

        font-size:20px;
    }

    .timeline-header h3{

        font-size:18px;
    }

    .timeline-content h4{

        font-size:15px;
    }

}

</style>

