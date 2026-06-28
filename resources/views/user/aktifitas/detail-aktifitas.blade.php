<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Aktivitas</title>
</head>
<body>

    @include('user.aktifitas.components.detail.detail-header')

    <!-- INVISIBLE APPROVE FORM -->
    @if($booking->status == 'waiting_approval')
        <form id="approve-form" action="{{ route('booking.approve.estimation', $booking->id) }}" method="POST">
            @csrf
        </form>
    @endif

    <div class="detail-layout">
        <!-- LEFT COLUMN: Workflow & Information -->
        <div class="detail-left">
            @if(in_array($booking->status, ['completed', 'cancelled', 'rejected']))
                @if($booking->status == 'completed')
                    @include('user.aktifitas.components.detail.receipt-card', ['booking' => $booking])
                @endif
            @else
                @include(
                    'user.aktifitas.components.detail.booking-information',
                    ['booking' => $booking]
                )

                @if(!in_array($booking->status, ['pending', 'accepted', 'on_the_way', 'diagnosis']))
                    @include(
                        'user.aktifitas.components.detail.diagnosis-result',
                        ['booking' => $booking]
                    )

                    @include(
                        'user.aktifitas.components.detail.sparepart-recommendation',
                        ['booking' => $booking]
                    )

                    @include(
                        'user.aktifitas.components.detail.price-approval',
                        ['booking' => $booking]
                    )

                    @include(
                        'user.aktifitas.components.detail.damage-details',
                        ['booking' => $booking]
                    )
                @endif

                @if($booking->status == 'payment')
                    @include('user.aktifitas.components.detail.payment-card', ['booking' => $booking])
                @endif
            @endif
        </div>

        <!-- RIGHT COLUMN: Status, Address & Timeline -->
        <div class="detail-right">
            @include(
                'user.aktifitas.components.detail.status-banner',
                ['booking' => $booking]
            )

            @include(
                'user.aktifitas.components.detail.address-card',
                ['booking' => $booking]
            )

            @include(
                'user.aktifitas.components.detail.timeline',
                ['booking' => $booking]
            )
        </div>
    </div>

    <!-- ACTION BUTTONS ALWAYS FLOATING AT BOTTOM -->
    @include(
        'user.aktifitas.components.detail.action-buttons',
        ['booking' => $booking]
    )

    <style>
        .detail-layout {
            display: grid;
            grid-template-columns: 1fr 420px;
            gap: 20px;
            padding: 0 20px 40px;
            max-width: 1200px;
            margin: 0 auto;
            align-items: start;
            box-sizing: border-box;
        }

        .detail-left, .detail-right {
            min-width: 0;
            width: 100%;
        }

        .detail-layout > div > * {
            margin: 0 0 20px 0 !important;
            width: 100% !important;
            box-sizing: border-box !important;
            max-width: 100% !important;
        }

        @media(max-width: 1024px) {
            .detail-layout {
                grid-template-columns: 1fr;
            }
        }
    </style>

    @include('user.aktifitas.components.detail.modal-review', ['booking' => $booking])
    @if($booking->status == 'payment')
        @include('user.aktifitas.components.detail.modal-payment', ['booking' => $booking])
    @endif
          
</body>
</html>