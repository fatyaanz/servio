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

    {{-- TIMELINE --}}
    @include(
        'provider.pages.pesanan.components.detail.timeline'
    )

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

    {{-- ACTION BUTTONS --}}
    @include(
        'provider.pages.pesanan.components.detail.action-buttons'
    )

@endsection