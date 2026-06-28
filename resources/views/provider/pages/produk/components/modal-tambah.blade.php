
<div class="modal-overlay" id="modalTambah">

    <div class="tambahproduk-container">

        <!-- HEADER -->

        <div class="page-header">

            <div>

                <h1>
                    Tambah Produk
                </h1>

                <p>
                    Tambahkan produk baru untuk toko layanan kamu
                </p>

            </div>

            <button 
                class="close-modal"
                id="closeModal"
            >
                ✕

            </button>

        </div>

        <!-- FORM -->

        <form
            class="product-form"
            action="/provider/produk/store"
            method="POST"
            enctype="multipart/form-data"
        >

        @csrf

            <!-- TOP GRID -->

            <div class="form-top-grid">

                <!-- UPLOAD -->

                <div class="upload-wrapper">

                    <label>
                        Foto Produk
                    </label>

                    <div class="upload-box">

                        <div class="upload-icon">
                            <i class='bx bx-cloud-upload' style="font-size:40px; color:#9ca3af; margin-bottom:10px;"></i>
                        </div>

                        <h4>
                            Upload Foto
                        </h4>

                        <p>
                            PNG, JPG maksimal 10MB
                        </p>

                        <input
                            type="file"
                            name="foto"
                        >

                    </div>

                </div>

                <!-- INPUT -->

                <div class="form-right">

                    <!-- NAMA -->

                    <div class="input-group">

                        <label>
                            Nama Produk
                        </label>

                        <input
                            type="text"
                            name="nama_produk"
                            placeholder="Masukkan nama produk"
                        >

                    </div>

                </div>

            </div>

            <!-- BOTTOM GRID -->

            <div class="bottom-grid">

                <!-- HARGA -->

                <div class="input-group">

                    <label>
                        Harga
                    </label>

                    <input
                        type="text"
                        name="harga"
                        id="hargaInput"
                        placeholder="Masukkan harga"
                    >

                </div>

                <!-- STOK -->

                <div class="input-group">

                    <label>
                        Stok
                    </label>

                    <input
                        type="text"
                        inputmode="numeric"
                        name="stok"
                        placeholder="Masukkan stok"
                    >

                </div>

                <!-- SATUAN -->

                <div class="input-group">

                    <label>
                        Satuan
                    </label>

                    <select name="satuan">

                        <option value="">
                            Pilih satuan
                        </option>

                        <option value="Pcs">
                            Pcs
                        </option>

                        <option value="Unit">
                            Unit
                        </option>

                    </select>

                </div>

            </div>

            <!-- DESKRIPSI -->

            <div class="input-group textarea-group">

                <label>
                    Deskripsi Produk
                </label>

                <textarea
                    name="deskripsi"
                    placeholder="Masukkan deskripsi produk..."
                ></textarea>

            </div>

            <!-- BUTTON -->

            <div class="form-action">

                <a
                    href="/provider/produk"
                    class="cancel-btn"
                >
                    Batal
                </a>

                <button
                    type="submit"
                    class="save-btn"
                >
                    Simpan Produk
                </button>

            </div>

        </form>

    </div>

</div>

<style>

/* =========================
    PAGE
========================== */

.modal-overlay{

    position: fixed;

    top: 0;
    left: 260px;

    width: calc(100% - 260px);

    height: 100vh;

    background: rgba(15,23,42,0.45);

    display: none;

    justify-content: center;
    align-items: center;

    z-index: 999;

    padding: 20px;

}

.modal-overlay.active{

    display:flex;

}

/* =========================
    CONTAINER
========================== */
.tambahproduk-container{

    width:100%;
    max-width:900px;

    background:white;

    border-radius:28px;

    padding:26px;

    box-shadow:
    0 10px 30px rgba(15,23,42,0.08);

    animation: modalFade 0.3s ease;

}

/* =========================
    HEADER
========================== */

.page-header{

    display:flex;
    justify-content:space-between;
    align-items:flex-start;

    margin-bottom:18px;

}

.page-header h1{

    font-size:24px;
    font-weight:800;

    color:#111827;

    margin-bottom:4px;

}

.page-header p{

    font-size:13px;

    color:#6b7280;

}

/* =========================
    BACK BUTTON
========================== */

.back-btn{

    text-decoration:none;

    padding:10px 16px;

    border-radius:14px;

    background:#f3f4f6;

    color:#374151;

    font-size:13px;
    font-weight:700;

    transition:0.3s ease;

}

.back-btn:hover{

    background:#e5e7eb;

}

/* =========================
    FORM
========================== */

.product-form{

    display:flex;
    flex-direction:column;

}

/* =========================
    TOP GRID
========================== */

.form-top-grid{

    display:grid;

    grid-template-columns:
    220px 1fr;

    gap:14px;

    margin-bottom:16px;

}

/* =========================
    UPLOAD
========================== */

.upload-wrapper{

    display:flex;
    flex-direction:column;

    gap:8px;

}

.upload-wrapper label{

    font-size:12px;
    font-weight:700;

    color:#374151;

}

.upload-box{

    position:relative;

    border:
    2px dashed #d1d5db;

    border-radius:22px;

    padding:20px 14px;

    text-align:center;

    background:#fafafa;

    overflow:hidden;

}

.upload-box input{

    position:absolute;

    inset:0;

    opacity:0;

    cursor:pointer;

}

.upload-icon{

    font-size:34px;

    margin-bottom:6px;

}

.upload-box h4{

    font-size:15px;

    color:#111827;

    margin-bottom:4px;

}

.upload-box p{

    font-size:11px;

    color:#9ca3af;

}

/* =========================
    FORM RIGHT
========================== */

.form-right{

    display:flex;
    flex-direction:column;

    gap:12px;

}

/* =========================
    INPUT
========================== */

.input-group{

    display:flex;
    flex-direction:column;

    gap:6px;

}

.input-group label{

    font-size:12px;
    font-weight:700;

    color:#374151;

}

.input-group input,
.input-group select,
.input-group textarea{

    width:100%;

    border:none;

    outline:none;

    background:#f9fafb;

    border:
    1px solid #e5e7eb;

    border-radius:14px;

    padding:12px 14px;

    font-size:13px;

    color:#111827;

    transition:0.3s ease;

}

.input-group input:focus,
.input-group select:focus,
.input-group textarea:focus{

    border-color:#ff9b45;

    box-shadow:
    0 0 0 4px rgba(255,122,0,0.08);

}

/* =========================
    TEXTAREA
========================== */

.input-group textarea{

    min-height:70px;

    resize:none;

}

/* =========================
    BOTTOM GRID
========================== */

.bottom-grid{

    display:grid;

    grid-template-columns:
    repeat(3,1fr);

    gap:10px;

    margin-bottom:16px;

}

/* =========================
    ACTION
========================== */

.form-action{

    display:flex;
    justify-content:flex-end;

    gap:10px;

    margin-top:16px;

}

/* =========================
    CANCEL BUTTON
========================== */

.cancel-btn{

    text-decoration:none;

    padding:12px 22px;

    border-radius:14px;

    background:#f3f4f6;

    color:#374151;

    font-size:13px;
    font-weight:700;

    transition:0.3s ease;

}

.cancel-btn:hover{

    background:#e5e7eb;

}

/* =========================
    SAVE BUTTON
========================== */

.save-btn{

    padding:12px 24px;

    border:none;

    border-radius:14px;

    background:
    linear-gradient(
        135deg,
        #ffb066,
        #ff7a00
    );

    color:white;

    font-size:13px;
    font-weight:700;

    cursor:pointer;

    box-shadow:
    0 8px 20px rgba(255,122,0,0.18);

    transition:0.3s ease;

}

.save-btn:hover{

    transform:translateY(-2px);

}

/* =========================
    RESPONSIVE
========================== */

@media(max-width:768px){

    .tambahproduk-page{

        left:0;

        padding:14px;

        overflow:auto;

    }

    .tambahproduk-container{

        padding:20px;

    }

    .form-top-grid{

        grid-template-columns:1fr;

    }

    .bottom-grid{

        grid-template-columns:1fr;

    }

    .page-header{

        flex-direction:column;

        gap:12px;

    }
    @keyframes modalFade{

    from{
        opacity:0;
        transform:translateY(20px);
    }

    to{
        opacity:1;
        transform:translateY(0);
    }

}

}

</style>

<script>

/* =========================
   MODAL TAMBAH PRODUK
========================= */

window.onload = function () {

    const addProductBtn =
        document.querySelector(".add-product-btn");

    const modalTambah =
        document.getElementById("modalTambah");

    const closeModal =
        document.getElementById("closeModal");

    // OPEN

    if(addProductBtn){

        addProductBtn.onclick = function () {

            modalTambah.classList.add("active");

            document.body.style.overflow = "hidden";

        };

    }

    // CLOSE

    if(closeModal){

        closeModal.onclick = function () {

            modalTambah.classList.remove("active");

            document.body.style.overflow = "auto";

        };

    }

    // OUTSIDE CLICK

    window.onclick = function (e) {

        if(e.target === modalTambah){

            modalTambah.classList.remove("active");

            document.body.style.overflow = "auto";

        }

    };

};

</script>

<script>

document.addEventListener('DOMContentLoaded', function(){

    const hargaInput =
    document.getElementById('hargaInput');

    if(hargaInput){

        hargaInput.addEventListener('input', function(){

            let value = this.value
                .replace(/\D/g, '');

            value = new Intl.NumberFormat('id-ID')
                .format(value);

            this.value = value;

        });

    }

});

</script>

<style>
input[type=number] {

    -moz-appearance: textfield;

}

/* HILANGKAN SPINNER */

input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {

    -webkit-appearance: none;

    margin: 0;

}

input[type=number] {

    -moz-appearance: textfield;

}

</style>