<div class="modal-overlay" id="notificationModal">

    <div class="modal-card">

        <div class="modal-header">

            <h2>
                Pengaturan Notifikasi
            </h2>

            <button
                class="close-modal"
                onclick="closeNotificationModal()">

                ✕

            </button>

        </div>

        <div class="notification-item">

            <div>

                <h4>
                    Booking Layanan
                </h4>

                <p>
                    Notifikasi saat booking dibuat
                </p>

            </div>

            <input
                type="checkbox"
                checked>
        </div>

        <div class="notification-item">

            <div>

                <h4>
                    Status Pengerjaan
                </h4>

                <p>
                    Update progres dari teknisi
                </p>

            </div>

            <input
                type="checkbox"
                checked>
        </div>

        <div class="notification-item">

            <div>

                <h4>
                    Pesan Chat
                </h4>

                <p>
                    Notifikasi pesan baru
                </p>

            </div>

            <input
                type="checkbox"
                checked>
        </div>

        <div class="notification-item">

            <div>

                <h4>
                    Promo & Diskon
                </h4>

                <p>
                    Informasi promo terbaru Servio
                </p>

            </div>

            <input
                type="checkbox">
        </div>

    </div>

</div>

<style>
    .notification-item{

    display:flex;

    justify-content:space-between;

    align-items:center;

    gap:20px;

    padding:16px 0;

    border-bottom:1px solid #F2F2F2;
}

.notification-item:last-child{

    border-bottom:none;
}

.notification-item h4{

    margin:0;

    color:#222;

    font-size:15px;
}

.notification-item p{

    margin-top:4px;

    color:#777;

    font-size:13px;
}

.notification-item input{

    width:20px;

    height:20px;

    accent-color:#F08A28;
}
</style>