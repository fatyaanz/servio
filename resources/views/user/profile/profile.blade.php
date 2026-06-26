<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
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

    <style>
    .modal-overlay {
        position: fixed;
        inset: 0;
        background: rgba(0, 0, 0, 0.6);
        display: none;
        align-items: center;
        justify-content: center;
        z-index: 9999;
        padding: 20px;
        box-sizing: border-box;
        backdrop-filter: blur(4px);
        animation: fadeIn 0.25s ease;
    }

    .modal-overlay.active {
        display: flex;
    }

    .modal-card {
        background: white;
        border-radius: 24px;
        width: 100%;
        max-width: 600px;
        padding: 30px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        animation: slideUp 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
        position: relative;
    }

    .modal-card.large {
        max-width: 750px;
    }

    .modal-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        border-bottom: 1px solid #F3F4F6;
        padding-bottom: 15px;
    }

    .modal-header h2 {
        margin: 0;
        font-size: 20px;
        font-weight: 800;
        color: #111827;
    }

    .close-modal {
        background: #F3F4F6;
        border: none;
        width: 36px;
        height: 36px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
        color: #4B5563;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .close-modal:hover {
        background: #E5E7EB;
        color: #111827;
        transform: rotate(90deg);
    }

    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    @keyframes slideUp {
        from {
            transform: translateY(30px);
            opacity: 0;
        }
        to {
            transform: translateY(0);
            opacity: 1;
        }
    }
    </style>

</body>

</html>