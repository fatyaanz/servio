@extends('admin.Layouts.app')

@section('content')

<div class="edit-category-page">

    <div class="page-header">

        <div>
            <h1>Edit Kategori Layanan</h1>
            <p>
                Perbarui informasi kategori layanan Servio.
            </p>
        </div>

        <a
            href="{{ route('categories.index') }}"
            class="back-btn"
        >
            <i class='bx bx-arrow-back'></i>
            Kembali
        </a>

    </div>

    <div class="edit-card">

        <form
            action="{{ route('categories.update', $category->id) }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf
            @method('PUT')

            <div class="form-group">

                <label>
                    Nama Kategori
                </label>

                <input
                    type="text"
                    name="name"
                    value="{{ old('name', $category->name) }}"
                    required
                >

                @error('name')
                    <small class="error">
                        {{ $message }}
                    </small>
                @enderror

            </div>

            <div class="form-group">

                <label>
                    Icon Kategori
                </label>

                <input
                    type="file"
                    name="icon"
                >

                @error('icon')
                    <small class="error">
                        {{ $message }}
                    </small>
                @enderror

            </div>

            @if($category->icon)

            <div class="current-icon">

                <p>Icon Saat Ini</p>

                <img
                    src="{{ asset('storage/' . $category->icon) }}"
                    alt="Category Icon"
                >

            </div>

            @endif

            <button
                type="submit"
                class="save-btn"
            >
                Simpan Perubahan
            </button>

        </form>

    </div>

</div>

<style>

/* =========================
    PAGE
========================= */

.edit-category-page{

    min-height:100vh;

}

/* =========================
    HEADER
========================= */

.page-header{

    display:flex;

    justify-content:space-between;

    align-items:flex-start;

    gap:20px;

    margin-bottom:28px;

    flex-wrap:wrap;

}

.page-header h1{

    font-size:32px;

    font-weight:700;

    color:var(--text-dark);

    margin-bottom:6px;

}

.page-header p{

    font-size:14px;

    color:var(--text-secondary);

    line-height:1.6;

}

/* =========================
    BACK BUTTON
========================= */

.back-btn{

    display:flex;

    align-items:center;

    gap:8px;

    text-decoration:none;

    padding:12px 18px;

    border-radius:12px;

    border:1px solid var(--border);

    background:white;

    color:var(--text-dark);

    font-size:14px;

    font-weight:600;

    transition:.3s;

}

.back-btn:hover{

    background:#F8FAFC;

}

/* =========================
    CARD
========================= */

.edit-card{

    background:white;

    border:1px solid var(--border);

    border-radius:20px;

    padding:24px;

    box-shadow:var(--shadow-sm);

}

/* =========================
    FORM
========================= */

.form-group{

    margin-bottom:20px;

}

.form-group label{

    display:block;

    margin-bottom:8px;

    font-size:14px;

    font-weight:600;

    color:var(--text-dark);

}

.form-group input{

    width:100%;

    padding:12px 14px;

    border:1px solid var(--border);

    border-radius:12px;

    font-size:14px;

    outline:none;

    transition:.3s;

}

.form-group input:focus{

    border-color:var(--primary);

}

/* =========================
    FILE INPUT
========================= */

input[type="file"]{

    cursor:pointer;

}

input[type="file"]::file-selector-button{

    border:none;

    padding:10px 14px;

    border-radius:10px;

    background:var(--primary);

    color:white;

    font-weight:600;

    cursor:pointer;

    margin-right:10px;

}

/* =========================
    CURRENT ICON
========================= */

.current-icon{

    margin-bottom:24px;

}

.current-icon p{

    font-size:14px;

    font-weight:600;

    color:var(--text-dark);

    margin-bottom:10px;

}

.current-icon img{

    width:120px;

    height:120px;

    object-fit:cover;

    border-radius:16px;

    border:1px solid var(--border);

}

/* =========================
    ERROR
========================= */

.error{

    display:block;

    margin-top:6px;

    font-size:12px;

    color:#EF4444;

}

/* =========================
    SAVE BUTTON
========================= */

.save-btn{

    border:none;

    padding:12px 20px;

    border-radius:12px;

    background:var(--primary);

    color:white;

    font-size:14px;

    font-weight:600;

    cursor:pointer;

    transition:.3s;

}

.save-btn:hover{

    opacity:.95;

    transform:translateY(-2px);

}

/* =========================
    RESPONSIVE
========================= */

@media(max-width:768px){

    .page-header{

        flex-direction:column;

    }

    .edit-card{

        padding:20px;

    }

}

</style>

@endsection