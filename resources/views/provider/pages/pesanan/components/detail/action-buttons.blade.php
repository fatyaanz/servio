<!-- <h1>TES FILE ACTION BUTTONS JALAN</h1> -->


<div class="action-container">

    {{-- KONDISI 1: JIKA PESANAN BARU MASUK (PENDING) --}}
    @if($booking->status == 'pending')

        <div class="pending-actions-wrapper">

            <form
                action="{{ route('provider.booking.reject', $booking->id) }}"
                method="POST"
                style="flex: 1"
            >
                @csrf
                <button
                    type="submit"
                    class="action-btn btn-reject"
                >
                    ❌ Tolak
                </button>
            </form>

            <form
                action="{{ route('provider.booking.accept', $booking->id) }}"
                method="POST"
                style="flex: 1"
            >
                @csrf
                <button
                    type="submit"
                    class="action-btn btn-orange"
                >
                    👍 Terima
                </button>
            </form>

        </div>

    {{-- KONDISI 2: JIKA SUDAH DITERIMA & AKAN BERANGKAT --}}
    @elseif($booking->status == 'accepted')

        <form
            action="{{ route('provider.booking.start-trip', $booking->id) }}"
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

    {{-- KONDISI 3: DALAM PERJALANAN --}}
    @elseif($booking->status == 'on_the_way')

        <form
            action="{{ route('provider.booking.arrived', $booking->id) }}"
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

    {{-- KONDISI 4: PROSES CEK KERUSAKAN --}}
    @elseif($booking->status == 'diagnosis')

        <form
            action="{{ route('provider.booking.send-estimation', $booking->id) }}"
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

    {{-- KONDISI 5: MENUNGGU PERSETUJUAN --}}
    @elseif($booking->status == 'waiting_approval')

        <button
            class="action-btn btn-gray"
            disabled
        >
            ⏳ Menunggu Persetujuan Pelanggan
        </button>

    {{-- KONDISI 6: ESTIMASI DISETUJUI, SIAP KERJA --}}
    @elseif($booking->status == 'approved')

        <form
            action="{{ route('provider.booking.start-work', $booking->id) }}"
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

    {{-- KONDISI 7: PROSES PENGERJAAN --}}
    @elseif($booking->status == 'working')

        <form
            action="{{ route('provider.booking.finish-work', $booking->id) }}"
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

    {{-- KONDISI 8: MENUNGGU PEMBAYARAN --}}
    @elseif($booking->status == 'payment')
    
        <button
            class="action-btn btn-green"
            disabled
        >
            💳 Menunggu Pembayaran
        </button>

    {{-- KONDISI 9: SELESAI --}}
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
.pending-actions-wrapper {
    display: flex;
    gap: 12px;
    width: 100%;
}

.btn-reject {
    background: #FEE2E2;
    color: #DC2626;
}

.btn-reject:hover {
    background: #FCA5A5;
}

.action-container{
    position: sticky;
    bottom: 20px;
    margin: 20px;
    z-index: 50;
}

.action-btn{
    width: 100%;
    height: 60px;
    border: none;
    border-radius: 18px;
    font-size: 15px;
    font-weight: 700;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    cursor: pointer;
    transition: .3s ease;
    box-shadow: 0 8px 24px rgba(0,0,0,.12);
}

.action-btn:hover{
    transform: translateY(-2px);
}

.action-btn:active{
    transform: scale(.98);
}

.btn-orange{
    background: #F08A28;
    color: white;
}

.btn-blue{
    background: #3B82F6;
    color: white;
}

.btn-purple{
    background: #8B5CF6;
    color: white;
}

.btn-gray{
    background: #E5E7EB;
    color: #6B7280;
}

.btn-yellow{
    background: #FACC15;
    color: #111827;
}

.btn-green{
    background: #10B981;
    color: white;
}

.btn-darkgreen{
    background: #059669;
    color: white;
}

.action-btn:disabled{
    opacity: .8;
    cursor: not-allowed;
    transform: none;
}
</style>