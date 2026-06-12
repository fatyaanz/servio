<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Layanan</title>
</head>
<body>

    @include('user.sub-layanan.components.header')

    <form
        action="{{ route('booking.normal') }}"
        method="GET"
    >
    
    <input
        type="hidden"
        name="provider_id"
        value="{{ $provider->id }}"
    >

        @include(
            'user.sub-layanan.components.service-list',
            ['subServices' => $subServices]
        )

        @include(
            'user.sub-layanan.components.diagnosis-card'
        )

        @include(
            'user.sub-layanan.components.continue-button'
        )

    </form>

</body>
<script>

    document.addEventListener('DOMContentLoaded', function(){

    const serviceCards =
        document.querySelectorAll('.service-card');

    const diagnosisCard =
        document.getElementById('diagnosisCard');

    serviceCards.forEach(card => {

    card.addEventListener('click', function(){

            if(
                diagnosisCard.classList.contains('selected')
            ){
                diagnosisCard.classList.remove('selected');
            }

            card.classList.toggle('selected');

            const checkbox =
                card.querySelector(
                    'input[type="checkbox"]'
                );

            checkbox.checked =
                card.classList.contains(
                    'selected'
                );

        });

    });

    diagnosisCard.addEventListener('click', function(){

        const selected =
            diagnosisCard.classList.contains('selected');

        if(selected){

            diagnosisCard.classList.remove('selected');

        }else{

            serviceCards.forEach(card => {
                card.classList.remove('selected');
            });

            diagnosisCard.classList.add('selected');

            }

             });

});

</script>
</html>