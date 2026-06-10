<div class="modal-overlay" id="themeModal">

    <div class="modal-card">

        <div class="modal-header">

            <h2>
                Pilih Tema
            </h2>

            <button
                class="close-modal"
                onclick="closeThemeModal()">

                ✕

            </button>

        </div>

        <div class="theme-option active">

            <div class="theme-info">

                ☀️ Light Mode

            </div>

            <input
                type="radio"
                name="theme"
                checked>

        </div>

        <div class="theme-option">

            <div class="theme-info">

                🌙 Dark Mode

            </div>

            <input
                type="radio"
                name="theme">

        </div>

        <div class="theme-option">

            <div class="theme-info">

                📱 Ikuti Sistem

            </div>

            <input
                type="radio"
                name="theme">

        </div>

    </div>

</div>

<style>
    .theme-option{

    display:flex;

    justify-content:space-between;

    align-items:center;

    padding:18px;

    border:1px solid #EEEEEE;

    border-radius:16px;

    margin-bottom:12px;

    transition:.3s ease;
}

.theme-option:hover{

    border-color:#F08A28;

    background:#FFF8F1;
}

.theme-info{

    font-weight:600;

    color:#222;
}

.theme-option input{

    width:20px;

    height:20px;

    accent-color:#F08A28;
}
</style>