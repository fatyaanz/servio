@extends('provider.layouts.app')

@section('content')

    {{-- HEADER --}}
    @include(
        'provider.pages.pesanan.components.detail.detail-header'
    )

    <div class="detail-layout">
        
        <!-- LEFT COLUMN: Workflow & Information -->
        <div class="detail-left">
            @if(in_array($booking->status, ['completed', 'cancelled', 'rejected']))
                @if($booking->status == 'completed')
                    @include('user.aktifitas.components.detail.receipt-card', ['booking' => $booking])
                @endif
            @else
                {{-- INFORMASI BOOKING --}}
                @include(
                    'provider.pages.pesanan.components.detail.booking-information'
                )

                {{-- DETAIL KERUSAKAN AWAL --}}
                @include(
                    'provider.pages.pesanan.components.detail.damage-details'
                )

                {{-- WORKFLOW DIAGNOSIS --}}
                @if(
                    in_array(
                        $booking->status,
                        [
                            'diagnosis',
                            'waiting_approval',
                            'working',
                            'payment',
                            'completed'
                        ]
                    )
                )

                    @include(
                        'provider.pages.pesanan.components.detail.workflow.diagnosis-form'
                    )

                    @include(
                        'provider.pages.pesanan.components.detail.workflow.sparepart-selection'
                    )

                    @include(
                        'provider.pages.pesanan.components.detail.workflow.price-estimation'
                    )

                @endif

                {{-- VERIFIKASI PEMBAYARAN --}}
                @if($booking->status == 'payment' && $booking->payment_proof)
                    @include(
                        'provider.pages.pesanan.components.detail.payment-verification-card'
                    )
                @endif
            @endif
        </div>

        <!-- RIGHT COLUMN: Status, Address, Timeline & Actions -->
        <div class="detail-right">
            {{-- STATUS BANNER --}}
            @include(
                'provider.pages.pesanan.components.detail.status-banner'
            )

            {{-- ALAMAT & JADWAL --}}
            @include(
                'provider.pages.pesanan.components.detail.address-card'
            )

            {{-- TIMELINE --}}
            @include(
                'provider.pages.pesanan.components.detail.timeline'
            )

            {{-- ACTION BUTTONS --}}
            @include(
                'provider.pages.pesanan.components.detail.action-buttons'
            )
        </div>

    </div>

    <style>
        .detail-layout {
            display: grid;
            grid-template-columns: 1fr 420px;
            gap: 20px;
            padding: 0 20px 40px;
            align-items: start;
        }

        .detail-layout > div > * {
            margin: 0 0 20px 0 !important;
            width: 100% !important;
        }

        @media(max-width: 1024px) {
            .detail-layout {
                grid-template-columns: 1fr;
            }
        }
    </style>

@endsection