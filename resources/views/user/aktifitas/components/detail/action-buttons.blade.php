
<div class="action-section">


    @if($booking->status == 'pending')

        <div class="action-group">

            <button
                type="button"
                class="danger-btn"
            >

                ❌ Batalkan Pesanan

            </button>

        </div>

    @elseif($booking->status == 'accepted')

        <div class="action-group">

            <a
                href="{{ route('chat.detail', ['user' => $booking->provider_id, 'booking_id' => $booking->id]) }}"
                class="secondary-btn"
                style="text-decoration: none;"
            >

                💬 Chat Teknisi

            </a>

        </div>

    @elseif($booking->status == 'on_the_way')

        <div class="action-group">

            <button
                type="button"
                class="primary-btn"
            >

                📍 Lacak Teknisi

            </button>

            <a
                href="{{ route('chat.detail', ['user' => $booking->provider_id, 'booking_id' => $booking->id]) }}"
                class="secondary-btn"
                style="text-decoration: none;"
            >

                💬 Chat

            </a>

        </div>

    @elseif($booking->status == 'diagnosis')

        <div class="action-group">

            <button
                type="button"
                class="secondary-btn"
                disabled
            >

                🔍 Teknisi Sedang Diagnosis

            </button>

            <a
                href="{{ route('chat.detail', ['user' => $booking->provider_id, 'booking_id' => $booking->id]) }}"
                class="secondary-btn"
                style="text-decoration: none;"
            >

                💬 Chat

            </a>

        </div>

    @elseif($booking->status == 'waiting_approval')

    <div class="action-group">

        <button
            type="submit"
            class="success-btn"
            form="approve-form"
        >
            ✓ Setujui Harga
        </button>

        <form
            action="{{ route(
                'booking.reject.estimation',
                $booking->id
            ) }}"
            method="POST"
            class="action-form"
        >

            @csrf

            <button
                type="submit"
                class="danger-btn"
            >
                ✖ Tolak Estimasi
            </button>

        </form>

        <a
            href="{{ route('chat.detail', ['user' => $booking->provider_id, 'booking_id' => $booking->id]) }}"
            class="secondary-btn"
            style="text-decoration: none; width: auto; flex: unset; padding: 0 20px;"
        >
            💬 Chat
        </a>

    </div>

    @elseif($booking->status == 'approved')

    <div class="action-group">

        <button
            type="button"
            class="secondary-btn"
            disabled
        >

            ⏳ Menunggu Teknisi Memulai Perbaikan

        </button>

        <a
            href="{{ route('chat.detail', ['user' => $booking->provider_id, 'booking_id' => $booking->id]) }}"
            class="secondary-btn"
            style="text-decoration: none;"
        >
            💬 Chat
        </a>

    </div>

    @elseif($booking->status == 'working')

        <div class="action-group">

            <button
                type="button"
                class="secondary-btn"
                disabled
            >

                🛠 Sedang Dikerjakan

            </button>

            <a
                href="{{ route('chat.detail', ['user' => $booking->provider_id, 'booking_id' => $booking->id]) }}"
                class="secondary-btn"
                style="text-decoration: none;"
            >

                💬 Chat

            </a>

        </div>

    @elseif($booking->status == 'payment')

    <div class="action-group" style="flex: 1; display: flex; gap: 14px;">

        @if(!$booking->payment_proof)
            <button
                type="button"
                class="primary-btn"
                onclick="openPaymentModal()"
                style="flex: 2;"
            >
                💳 Bayar Sekarang
            </button>
        @else
            <button
                type="button"
                class="secondary-btn"
                disabled
                style="flex: 2; display: flex; align-items: center; justify-content: center;"
            >
                ⏳ Menunggu Verifikasi
            </button>
        @endif

        <a
            href="{{ route('chat.detail', ['user' => $booking->provider_id, 'booking_id' => $booking->id]) }}"
            class="secondary-btn"
            style="flex: 1; text-decoration: none;"
        >

            💬 Chat

        </a>

    </div>

    @elseif($booking->status == 'completed')

        <div class="action-group">

            @if(!$booking->review)
                <button
                    type="button"
                    class="success-btn"
                    onclick="openReviewModal()"
                >

                    ⭐ Beri Ulasan

                </button>
            @else
                <button
                    type="button"
                    class="success-btn"
                    disabled
                >

                    ✓ Sudah Diulas

                </button>
            @endif

            <button
                type="button"
                class="primary-btn"
            >

                🔄 Pesan Lagi

            </button>

        </div>

    @endif

</div>
<style>
    /* =========================
   ACTION SECTION V3
========================= */

/* =========================
   ACTION SECTION
========================= */

.action-section{

    position: sticky;

    bottom: 20px;

    max-width: 1200px;

    width: calc(100% - 40px);

    margin: 20px auto;

    padding: 18px;

    box-sizing: border-box;

    background: rgba(255,255,255,.95);

    backdrop-filter: blur(20px);

    -webkit-backdrop-filter: blur(20px);

    border: 1px solid rgba(240,138,40,.08);

    border-radius: 24px;

    box-shadow:
        0 12px 30px rgba(15,23,42,.08);

    z-index: 100;
}
/* =========================
   ACTION GROUP
========================= */


.action-group{

    display: flex;

    gap: 14px;

    width: 100%;
}

/* =========================
   FORM WRAPPER
========================= */

.action-form{

    width: 100%;
}

.action-group button{
    flex:1;
}

/* =========================
   BUTTON BASE
========================= */

.primary-btn,
.secondary-btn,
.success-btn,
.danger-btn{

    width: 100%;

    height: 58px;

    border: none;

    border-radius: 18px;

    display: flex;

    align-items: center;

    justify-content: center;

    gap: 10px;

    font-size: 15px;

    font-weight: 700;

    cursor: pointer;

    transition: .25s ease;
}

/* =========================
   PRIMARY
========================= */

.primary-btn{

    background: linear-gradient(
        135deg,
        #F08A28,
        #FFB347
    );

    color: white;

    box-shadow:
        0 8px 20px rgba(240,138,40,.25);
}

.primary-btn:hover{

    transform: translateY(-2px);

    box-shadow:
        0 12px 25px rgba(240,138,40,.35);
}

/* =========================
   SUCCESS
========================= */

.success-btn{

    background: linear-gradient(
        135deg,
        #22C55E,
        #34D399
    );

    color: white;

    box-shadow:
        0 8px 20px rgba(34,197,94,.25);
}

.success-btn:hover{

    transform: translateY(-2px);

    box-shadow:
        0 12px 25px rgba(34,197,94,.35);
}

/* =========================
   SECONDARY
========================= */

.secondary-btn{

    background: #F8FAFC;

    border: 1px solid #E2E8F0;

    color: #334155;
}

.secondary-btn:hover{

    background: #F1F5F9;

    transform: translateY(-2px);
}

/* =========================
   DANGER
========================= */

.danger-btn{

    background: linear-gradient(
        135deg,
        #EF4444,
        #F87171
    );

    color: white;

    box-shadow:
        0 8px 20px rgba(239,68,68,.25);
}

.danger-btn:hover{

    transform: translateY(-2px);

    box-shadow:
        0 12px 25px rgba(239,68,68,.35);
}

/* =========================
   DISABLED
========================= */

button:disabled{

    opacity: .65;

    cursor: not-allowed;

    transform: none !important;

    box-shadow: none !important;
}

/* =========================
   MOBILE
========================= */

@media(max-width:768px){

    .action-section{

        margin: 16px;
        padding: 16px;
        border-radius: 20px;
    }

    .action-group{

        flex-direction: column;
    }

    .primary-btn,
    .secondary-btn,
    .success-btn,
    .danger-btn{

        width: 100%;
        max-width: 100%;
        min-width: unset;

        min-height: 54px;
    }

}

</style>
