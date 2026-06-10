<div
    class="add-category-overlay"
    id="addCategoryModal"
>

    <div class="add-category-modal">

        <!-- HEADER -->
        <div class="modal-header">

            <div>

                <h2>
                    Tambah Kategori
                </h2>

                <p>
                    Tambahkan kategori layanan baru
                    untuk provider Servio.
                </p>

            </div>

            <button
                class="close-btn"
                onclick="closeAddCategoryModal()"
            >

                ✕

            </button>

        </div>

        <!-- FORM -->
        <form
            action="{{ route('categories.store') }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf

            <!-- NAMA -->
            <div class="input-group">

                <label>
                    Nama Kategori
                </label>

                <input
                    type="text"
                    name="name"
                    placeholder="Masukkan nama kategori"
                    required
                >

            </div>

            <!-- FOTO -->
            <div class="input-group">

                <label>
                    Foto Kategori
                </label>

                <input
                    type="file"
                    name="icon"
                    class="file-input"
                >

            </div>

            <!-- BUTTON -->
            <button
                type="submit"
                class="submit-btn"
            >

                Simpan Kategori

            </button>

        </form>

    </div>

</div>

<script>

/* =========================
    OPEN MODAL
========================= */

function openAddCategoryModal(){

    document
    .getElementById('addCategoryModal')
    .classList
    .add('active');

}

/* =========================
    CLOSE MODAL
========================= */

function closeAddCategoryModal(){

    document
    .getElementById('addCategoryModal')
    .classList
    .remove('active');

}

</script>

<style>

/* =========================
    OVERLAY
========================= */

.add-category-overlay{

    position:fixed;

    inset:0;

    background:rgba(15,23,42,0.45);

    display:flex;

    align-items:center;
    justify-content:center;

    padding:24px;

    z-index:9999;

    opacity:0;

    visibility:hidden;

    transition:0.25s ease;

}

/* ACTIVE */

.add-category-overlay.active{

    opacity:1;

    visibility:visible;

}

/* =========================
    MODAL
========================= */

.add-category-modal{

    width:100%;

    max-width:520px;

    background:white;

    border-radius:30px;

    padding:30px;

    box-shadow:
    0 20px 60px rgba(15,23,42,0.18);

    animation:modalUp 0.25s ease;

}

/* =========================
    ANIMATION
========================= */

@keyframes modalUp{

    from{

        transform:translateY(20px);

        opacity:0;

    }

    to{

        transform:translateY(0);

        opacity:1;

    }

}

/* =========================
    HEADER
========================= */

.modal-header{

    display:flex;

    justify-content:space-between;
    align-items:flex-start;

    gap:20px;

    margin-bottom:28px;

}

.modal-header h2{

    font-size:30px;

    font-weight:800;

    color:#111827;

    margin-bottom:8px;

}

.modal-header p{

    color:#6b7280;

    font-size:15px;

    line-height:1.7;

}

/* =========================
    CLOSE BUTTON
========================= */

.close-btn{

    width:50px;
    height:50px;

    border:none;

    border-radius:16px;

    background:#f3f4f6;

    font-size:20px;

    cursor:pointer;

    transition:0.25s ease;

}

.close-btn:hover{

    background:#e5e7eb;

}

/* =========================
    INPUT GROUP
========================= */

.input-group{

    margin-bottom:22px;

}

.input-group label{

    display:block;

    margin-bottom:10px;

    font-size:14px;

    font-weight:700;

    color:#334155;

}

/* INPUT */

.input-group input{

    width:100%;

    padding:16px;

    border-radius:16px;

    border:1px solid #e2e8f0;

    outline:none;

    font-size:14px;

    transition:0.25s ease;

}

.input-group input:focus{

    border-color:#ff7a00;

}

/* FILE */

.file-input{

    background:#fafafa;

    cursor:pointer;

}

.file-input::file-selector-button{

    border:none;

    padding:10px 14px;

    border-radius:12px;

    background:#ffb066;

    color:white;

    font-weight:700;

    margin-right:12px;

    cursor:pointer;

}

/* =========================
    BUTTON
========================= */

.submit-btn{

    width:100%;

    border:none;

    padding:16px;

    border-radius:18px;

    background:linear-gradient(
        135deg,
        #ffb066,
        #ff7a00
    );

    color:white;

    font-size:15px;

    font-weight:700;

    cursor:pointer;

    transition:0.25s ease;

    box-shadow:
    0 10px 24px rgba(255,122,0,0.18);

}

.submit-btn:hover{

    transform:translateY(-2px);

}

</style>