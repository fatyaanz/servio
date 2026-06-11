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
                    Tambahkan kategori layanan baru untuk provider Servio.
                </p>

            </div>

            <button
                class="close-btn"
                type="button"
                onclick="closeAddCategoryModal()"
            >

                <i class='bx bx-x'></i>

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
                    Icon / Foto Kategori
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

function openAddCategoryModal()
{
    document
        .getElementById('addCategoryModal')
        .classList
        .add('active');
}

function closeAddCategoryModal()
{
    document
        .getElementById('addCategoryModal')
        .classList
        .remove('active');
}

window.addEventListener('click', function(e)
{
    const modal =
        document.getElementById('addCategoryModal');

    if(e.target === modal)
    {
        closeAddCategoryModal();
    }
});

</script>

<style>

/* =========================
    OVERLAY
========================= */

.add-category-overlay{

    position:fixed;

    inset:0;

    background:rgba(15,23,42,.45);

    display:flex;

    justify-content:center;
    align-items:center;

    padding:20px;

    z-index:1000;

    opacity:0;
    visibility:hidden;

    transition:.3s;

}

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

    border-radius:20px;

    border:1px solid var(--border);

    padding:24px;

    box-shadow:var(--shadow-md);

    transform:translateY(15px);

    transition:.3s;

}

.add-category-overlay.active .add-category-modal{

    transform:translateY(0);

}

/* =========================
    HEADER
========================= */

.modal-header{

    display:flex;

    justify-content:space-between;

    align-items:flex-start;

    gap:16px;

    margin-bottom:24px;

}

.modal-header h2{

    font-size:20px;

    font-weight:600;

    color:var(--text-dark);

    margin-bottom:6px;

}

.modal-header p{

    font-size:14px;

    color:var(--text-secondary);

    line-height:1.6;

}

/* =========================
    CLOSE BUTTON
========================= */

.close-btn{

    width:40px;
    height:40px;

    border:none;

    border-radius:12px;

    background:#F8FAFC;

    color:var(--text-secondary);

    cursor:pointer;

    transition:.3s;

    display:flex;

    justify-content:center;
    align-items:center;

    font-size:20px;

}

.close-btn:hover{

    background:#EEF2F7;

}

/* =========================
    FORM
========================= */

.input-group{

    margin-bottom:18px;

}

.input-group label{

    display:block;

    margin-bottom:8px;

    font-size:14px;

    font-weight:600;

    color:var(--text-dark);

}

.input-group input{

    width:100%;

    padding:12px 14px;

    border:1px solid var(--border);

    border-radius:12px;

    font-size:14px;

    outline:none;

    transition:.3s;

}

.input-group input:focus{

    border-color:var(--primary);

}

/* =========================
    FILE INPUT
========================= */

.file-input{

    cursor:pointer;

}

.file-input::file-selector-button{

    border:none;

    padding:10px 14px;

    border-radius:10px;

    background:var(--primary);

    color:white;

    font-weight:600;

    margin-right:10px;

    cursor:pointer;

}

/* =========================
    BUTTON
========================= */

.submit-btn{

    width:100%;

    border:none;

    border-radius:12px;

    padding:12px;

    background:var(--primary);

    color:white;

    font-size:14px;

    font-weight:600;

    cursor:pointer;

    transition:.3s;

}

.submit-btn:hover{

    opacity:.95;

    transform:translateY(-2px);

}

/* =========================
    RESPONSIVE
========================= */

@media(max-width:768px){

    .add-category-modal{

        padding:20px;

    }

}

</style>