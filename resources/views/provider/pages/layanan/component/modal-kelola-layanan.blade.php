<div id="kelolaModal" class="modal">

    <div class="modal-content">

        <div class="modal-header">

            <h2>

                Tambah Sub Layanan

            </h2>

            <button
                onclick="closeKelolaModal()"
            >
                ✕

            </button>

        </div>

        <form
            action="{{ route('provider.subservice.store') }}"
            method="POST"
        >

            @csrf

            <input
                type="hidden"
                name="provider_service_id"
                id="kelola_provider_service_id"
            >

            <div class="form-group">

                <label>

                    Nama Sub Layanan

                </label>

                <input
                    type="text"
                    name="name"
                    required
                >

            </div>

            <div class="price-grid">

                <div class="form-group">

                    <label>

                        Harga Minimum

                    </label>

                    <input
                        type="number"
                        name="price_min"
                        required
                    >

                </div>

                <div class="form-group">

                    <label>

                        Harga Maksimum

                    </label>

                    <input
                        type="number"
                        name="price_max"
                        required
                    >

                </div>

            </div>

            <div class="form-group">

                <label>

                    Deskripsi

                </label>

                <textarea
                    name="description"
                    rows="4"
                ></textarea>

            </div>

            <button
                type="submit"
                class="submit-btn"
            >

                Simpan Layanan

            </button>

        </form>

    </div>

</div>

<style>

.modal{

    position:fixed;

    inset:0;

    background:rgba(15,23,42,.55);

    backdrop-filter:blur(4px);

    display:none;

    justify-content:center;

    align-items:center;

    z-index:9999;

    padding:20px;

}

.modal.active{

    display:flex;

}

.modal-content{

    width:100%;

    max-width:700px;

    background:white;

    border-radius:24px;

    padding:24px;

    box-shadow:
    0 20px 60px rgba(0,0,0,.15);

    animation:fadeIn .25s ease;

}

@keyframes fadeIn{

    from{
        opacity:0;
        transform:translateY(15px);
    }

    to{
        opacity:1;
        transform:translateY(0);
    }

}

.modal-header{

    display:flex;

    justify-content:space-between;

    align-items:center;

    margin-bottom:20px;

}

.modal-header h2{

    font-size:22px;

    font-weight:700;

    color:#111827;

}

.modal-header button{

    width:40px;

    height:40px;

    border:none;

    border-radius:12px;

    background:#f3f4f6;

    cursor:pointer;

}

.form-group{

    margin-bottom:16px;

}

.form-group label{

    display:block;

    margin-bottom:8px;

    font-size:14px;

    font-weight:600;

    color:#374151;

}

.form-group input,
.form-group textarea{

    width:100%;

    border:1px solid #e5e7eb;

    border-radius:14px;

    padding:12px 14px;

    background:#fafafa;

    font-size:14px;

    box-sizing:border-box;

}

.form-group input:focus,
.form-group textarea:focus{

    outline:none;

    border-color:#FF8A00;

    background:white;

    box-shadow:
    0 0 0 4px rgba(255,138,0,.10);

}

.price-grid{

    display:grid;

    grid-template-columns:1fr 1fr;

    gap:14px;

}

.submit-btn{

    width:100%;

    border:none;

    padding:14px;

    border-radius:14px;

    background:linear-gradient(
        135deg,
        #FFA63D,
        #FF8A00
    );

    color:white;

    font-weight:700;

    cursor:pointer;

    margin-top:10px;

}

.submit-btn:hover{

    transform:translateY(-2px);

}

@media(max-width:768px){

    .price-grid{

        grid-template-columns:1fr;

    }

}

</style>