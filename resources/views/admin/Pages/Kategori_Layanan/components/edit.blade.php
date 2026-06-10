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
            ← Kembali
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

.edit-category-page{

    min-height:100vh;

}

.page-header{

    display:flex;

    justify-content:space-between;
    align-items:center;

    margin-bottom:28px;

}

.page-header h1{

    font-size:38px;

    font-weight:800;

    color:#111827;

    margin-bottom:8px;

}

.page-header p{

    color:#6b7280;

}

.back-btn{

    text-decoration:none;

    background:#ffffff;

    color:#111827;

    padding:12px 18px;

    border-radius:14px;

    border:1px solid #e5e7eb;

    font-weight:600;

}

.edit-card{

    background:white;

    border-radius:28px;

    padding:30px;

    border:1px solid #eef2f7;

    box-shadow:
    0 10px 28px rgba(15,23,42,0.05);

}

.form-group{

    margin-bottom:22px;

}

.form-group label{

    display:block;

    margin-bottom:8px;

    font-weight:600;

    color:#111827;

}

.form-group input{

    width:100%;

    padding:14px;

    border-radius:14px;

    border:1px solid #d1d5db;

    font-size:14px;

}

.current-icon{

    margin-bottom:25px;

}

.current-icon p{

    margin-bottom:10px;

    font-weight:600;

}

.current-icon img{

    width:120px;

    height:120px;

    object-fit:cover;

    border-radius:20px;

    border:1px solid #e5e7eb;

}

.save-btn{

    border:none;

    background:linear-gradient(
        135deg,
        #ffb066,
        #ff7a00
    );

    color:white;

    padding:14px 24px;

    border-radius:16px;

    cursor:pointer;

    font-weight:700;

}

.error{

    color:red;

    display:block;

    margin-top:6px;

}

</style>

@endsection