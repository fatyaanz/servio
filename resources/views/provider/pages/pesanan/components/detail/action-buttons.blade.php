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
            style="background: white; padding: 20px; border-radius: 18px; border: 1px solid #ECECEC; box-shadow: 0 4px 12px rgba(0,0,0,0.05); display: flex; flex-direction: column; gap: 15px; margin-top: 10px;"
        >
            @csrf
            
            <div style="display: flex; flex-direction: column; gap: 8px;">
                <label style="font-weight: 700; font-size: 14px; color: #374151; text-align: left;">📍 Lokasi Pelanggan Saat Ini:</label>
                <div style="display: flex; gap: 20px; align-items: center;">
                    <label style="display: flex; align-items: center; gap: 8px; font-size: 14px; font-weight: 600; cursor: pointer; color: #4b5563;">
                        <input type="radio" name="customer_location" value="outside" checked style="accent-color: #F08A28; width: 16px; height: 16px;">
                        🏠 Di Luar Rumah (Butuh Persetujuan)
                    </label>
                    <label style="display: flex; align-items: center; gap: 8px; font-size: 14px; font-weight: 600; cursor: pointer; color: #4b5563;">
                        <input type="radio" name="customer_location" value="inside" style="accent-color: #F08A28; width: 16px; height: 16px;">
                        🤝 Di Dalam Rumah (Langsung Kerja)
                    </label>
                </div>
            </div>

            <button
                type="submit"
                class="action-btn btn-purple"
                style="box-shadow: none;"
            >
                📨 Kirim & Proses Lanjut
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
        @if(!$booking->payment_proof)
            <button
                class="action-btn btn-green"
                disabled
            >
                💳 Menunggu Pembayaran
            </button>
        @endif

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