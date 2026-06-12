<body>

    @include('user.navigation.navigation')

    @include('user.profile.components.header')

    @include('user.profile.components.profile-card')

    @include('user.profile.components.account-menu')

    @include('user.profile.components.settings-menu')

    @include('user.profile.components.support-menu')

    @include('user.profile.components.logout-button')

    @include('user.profile.components.modal-edit-profile')

    @include('user.profile.components.modal-address')

    @include('user.profile.components.modal-add-address')

    @include('user.profile.components.modal-payment')

    @include('user.profile.components.modal-notification')

    @include('user.profile.components.modal-theme')

    <script>

    function openAddressModal(){

        document
            .getElementById('addressModal')
            .classList.add('active');

    }

    function closeAddressModal(){

        document
            .getElementById('addressModal')
            .classList.remove('active');

    }

    function openAddAddressModal(){

        document
            .getElementById('addressModal')
            .classList.remove('active');

        document
            .getElementById('addAddressModal')
            .classList.add('active');

    }

    function closeAddAddressModal(){

        document
            .getElementById('addAddressModal')
            .classList.remove('active');

        document
            .getElementById('addressModal')
            .classList.add('active');

    }

    
        function openPaymentModal(){

            document
                .getElementById('paymentModal')
                .classList.add('active');

        }

        function closePaymentModal(){

            document
                .getElementById('paymentModal')
                .classList.remove('active');

        }

        function openNotificationModal(){

    document
        .getElementById('notificationModal')
        .classList.add('active');

}

function closeNotificationModal(){

    document
        .getElementById('notificationModal')
        .classList.remove('active');

}
function openThemeModal(){

    document
        .getElementById('themeModal')
        .classList.add('active');

}

function closeThemeModal(){

    document
        .getElementById('themeModal')
        .classList.remove('active');

}

    </script>

</body>

</html>