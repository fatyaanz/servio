<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Aktivitas</title>
</head>
<body>

    @include('user.aktifitas.components.detail.detail-header')

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

    @if(in_array($booking->status, ['completed', 'cancelled', 'rejected']))
        @if($booking->status == 'completed')
            @include('user.aktifitas.components.detail.receipt-card', ['booking' => $booking])
        @endif

        @include(
            'user.aktifitas.components.detail.action-buttons',
            ['booking' => $booking]
        )
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
        @endif

        @if($booking->status == 'waiting_approval')

            <form
                action="{{ route(
                    'booking.approve.estimation',
                    $booking->id
                ) }}"
                method="POST"
            >

                @csrf

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
                
                @include(
                    'user.aktifitas.components.detail.action-buttons',
                    ['booking' => $booking]
                )

            </form>

        @else


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

            @if($booking->status == 'payment')
                @include('user.aktifitas.components.detail.payment-card', ['booking' => $booking])
            @endif

            @include(
                'user.aktifitas.components.detail.action-buttons',
                ['booking' => $booking]
            )
        @endif
    @endif

    @include('user.aktifitas.components.detail.modal-review', ['booking' => $booking])
    @if($booking->status == 'payment')
        @include('user.aktifitas.components.detail.modal-payment', ['booking' => $booking])
    @endif
          
</body>
</html>