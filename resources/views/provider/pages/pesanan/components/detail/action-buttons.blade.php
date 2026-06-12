
<div class="action-container">

    @if($booking->status == 'accepted')

        <form
            action="{{ route('provider.booking.start-trip',$booking->id) }}"
            method="POST"
        >
            @csrf

            <button
                type="submit"
                class="action-btn btn-orange"
            >
                🚗 Berangkat ke Lokasi
            </button>

        </form>

    @elseif($booking->status == 'on_the_way')

        <form
            action="{{ route('provider.booking.arrived',$booking->id) }}"
            method="POST"
        >
            @csrf

            <button
                type="submit"
                class="action-btn btn-blue"
            >
                📍 Saya Sudah Sampai
            </button>

        </form>

    @elseif($booking->status == 'diagnosis')

        <form
            action="{{ route('provider.booking.send-estimation',$booking->id) }}"
            method="POST"
        >
            @csrf

            <button
                type="submit"
                class="action-btn btn-purple"
            >
                📨 Kirim Estimasi ke Pelanggan
            </button>

        </form>

    @elseif($booking->status == 'waiting_approval')

        <button
            class="action-btn btn-gray"
            disabled
        >
            ⏳ Menunggu Persetujuan Pelanggan
        </button>

    @elseif($booking->status == 'approved')

        <form
            action="{{ route(
                'provider.booking.start-work',
                $booking->id
            ) }}"
            method="POST"
        >

            @csrf

            <button
                type="submit"
                class="action-btn btn-yellow"
            >

                🛠 Mulai Perbaikan

            </button>

        </form>

    @elseif($booking->status == 'working')

        <form
            action="{{ route(
                'provider.booking.finish-work',
                $booking->id
            ) }}"
            method="POST"
        >

            @csrf

            <button
                type="submit"
                class="action-btn btn-yellow"
            >

                ✅ Selesaikan Perbaikan

            </button>

        </form>

    @elseif($booking->status == 'payment')
    
        <button
            class="action-btn btn-green"
            disabled

        >
            💳 Menunggu Pembayaran
        </button>

    @elseif($booking->status == 'completed')

        <button
            class="action-btn btn-darkgreen"
            disabled
        >
            ✅ Pesanan Selesai
        </button>

    @endif

</div>

<style>

.action-container{
    position:sticky;
    bottom:20px;
    margin:20px;
    z-index:50;
}

.action-btn{
    width:100%;
    height:60px;
    border:none;
    border-radius:18px;
    font-size:15px;
    font-weight:700;
    display:flex;
    align-items:center;
    justify-content:center;
    gap:10px;
    cursor:pointer;
    transition:.3s ease;
    box-shadow:0 8px 24px rgba(0,0,0,.12);
}

.action-btn:hover{
    transform:translateY(-2px);
}

.action-btn:active{
    transform:scale(.98);
}

.btn-orange{
    background:#F08A28;
    color:white;
}

.btn-blue{
    background:#3B82F6;
    color:white;
}

.btn-purple{
    background:#8B5CF6;
    color:white;
}

.btn-gray{
    background:#E5E7EB;
    color:#6B7280;
}

.btn-yellow{
    background:#FACC15;
    color:#111827;
}

.btn-green{
    background:#10B981;
    color:white;
}

.btn-darkgreen{
    background:#059669;
    color:white;
}

.action-btn:disabled{
    opacity:.8;
    cursor:not-allowed;
    transform:none;
}

</style>
