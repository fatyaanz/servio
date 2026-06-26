@extends('provider.layouts.app')

@section('content')

    {{-- HEADER --}}
    @include(
        'provider.pages.pesanan.components.detail.detail-header'
    )

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

    @if(in_array($booking->status, ['completed', 'cancelled', 'rejected']))
        @if($booking->status == 'completed')
            @include('user.aktifitas.components.detail.receipt-card', ['booking' => $booking])
        @endif

        {{-- ACTION BUTTONS --}}
        @include(
            'provider.pages.pesanan.components.detail.action-buttons'
        )
    @else
        {{-- INFORMASI BOOKING --}}
        @include(
            'provider.pages.pesanan.components.detail.booking-information'
        )

        {{-- =========================
            WORKFLOW DIAGNOSIS
        ========================== --}}

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

        {{-- DETAIL KERUSAKAN AWAL --}}
        @include(
            'provider.pages.pesanan.components.detail.damage-details'
        )

        {{-- VERIFIKASI PEMBAYARAN --}}
        @if($booking->status == 'payment' && $booking->payment_proof)
            @include(
                'provider.pages.pesanan.components.detail.payment-verification-card'
            )
        @endif

        {{-- ACTION BUTTONS --}}
        @include(
            'provider.pages.pesanan.components.detail.action-buttons'
        )
    @endif

@endsection