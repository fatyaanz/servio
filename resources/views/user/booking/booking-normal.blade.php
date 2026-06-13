<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Layanan</title>
</head>
<body>
    <form
        action="{{ route('booking.store') }}"
        method="POST"
        enctype="multipart/form-data"
    >

        @csrf

        <input
            type="hidden"
            name="provider_id"
            value="{{ $provider->id }}"
        >

        @foreach($subServices as $subService)

            <input
                type="hidden"
                name="sub_services[]"
                value="{{ $subService->id }}"
            >

        @endforeach

        @include('user.booking.components.header')

        @include('user.booking.components.location-card')

        @include('user.booking.components.provider-card')

        @include('user.booking.components.schedule-card')

        @include('user.booking.components.damage-card')

        @include('user.booking.components.service-detail-card')

        @include('user.booking.components.booking-button')

    </form>

</body>
</html>