<div class="modal-overlay" id="addAddressModal">

    <div class="modal-card">

        <div class="modal-header">

            <h2>
                Tambah Alamat
            </h2>

            <button
                class="close-modal"
                onclick="closeAddAddressModal()">

                ✕

            </button>

        </div>

        <div class="form-group">

            <label>
                Label Alamat
            </label>

            <input
                type="text"
                placeholder="Contoh: Rumah, Kantor">

        </div>

        <div class="form-group">

            <label>
                Nama Penerima
            </label>

            <input
                type="text"
                placeholder="Masukkan nama penerima">

        </div>

        <div class="form-group">

            <label>
                Nomor Telepon
            </label>

            <input
                type="text"
                placeholder="08xxxxxxxxxx">

        </div>

        <div class="form-group">

            <label>
                Alamat Lengkap
            </label>

            <textarea
                placeholder="Masukkan alamat lengkap"></textarea>

        </div>

        <button class="save-btn">

            Simpan Alamat

        </button>

    </div>

</div>

<style>
    textarea{

    width:100%;

    min-height:120px;

    padding:15px;

    border-radius:14px;

    border:1px solid #E5E7EB;

    resize:none;
}

textarea:focus{

    outline:none;

    border-color:#F08A28;
}
</style>
<script>

function openAddAddressModal(){

    document
        .getElementById('addAddressModal')
        .classList.add('active');

}

function closeAddAddressModal(){

    document
        .getElementById('addAddressModal')
        .classList.remove('active');

}

</script>