@extends('admin.layouts.app')

@section('content')

<style>

    .form-wrapper{
        display:flex;
        justify-content:center;
        align-items:center;
        min-height:90vh;
    }

    .form-card{
        width:100%;
        max-width:520px;
        background:white;
        border-radius:28px;
        padding:35px;
        box-shadow:0 8px 30px rgba(0,0,0,0.08);
    }

    .form-header{
        display:flex;
        justify-content:space-between;
        align-items:center;
        margin-bottom:30px;
    }

    .form-header h2{
        font-size:28px;
        color:#222;
    }

    .close-btn{
        font-size:24px;
        color:#777;
        cursor:pointer;
    }

    .input-group{
        margin-bottom:25px;
    }

    .input-label{
        display:block;
        margin-bottom:10px;
        font-weight:bold;
        color:#333;
    }

    .input-field{
        width:100%;
        padding:16px;
        border:1px solid #e5e5e5;
        border-radius:16px;
        outline:none;
        font-size:15px;
        transition:0.3s;
    }

    .input-field:focus{
        border-color:#ff7a00;
        box-shadow:0 0 10px rgba(255,122,0,0.15);
    }

    .upload-box{
        border:2px dashed #ddd;
        border-radius:20px;
        padding:35px;
        text-align:center;
        transition:0.3s;
        cursor:pointer;
    }

    .upload-box:hover{
        border-color:#ff7a00;
        background:#fff8f2;
    }

    .upload-icon{
        font-size:42px;
        margin-bottom:12px;
    }

    .upload-text{
        color:#666;
        font-size:14px;
    }

    .toggle-wrapper{
        display:flex;
        align-items:center;
        gap:14px;
    }

    .toggle-switch{
        width:58px;
        height:30px;
        background:#ff7a00;
        border-radius:30px;
        position:relative;
    }

    .toggle-switch::before{
        content:'';
        position:absolute;
        width:24px;
        height:24px;
        border-radius:50%;
        background:white;
        top:3px;
        left:30px;
    }

    .form-buttons{
        display:flex;
        justify-content:flex-end;
        gap:15px;
        margin-top:35px;
    }

    .cancel-btn{
        padding:14px 24px;
        border:none;
        border-radius:14px;
        background:#f3f3f3;
        cursor:pointer;
        font-weight:bold;
    }

    .save-btn{
        padding:14px 26px;
        border:none;
        border-radius:14px;
        background:linear-gradient(to right,#ffb066,#ff7a00);
        color:white;
        font-weight:bold;
        cursor:pointer;
        box-shadow:0 6px 18px rgba(255,122,0,0.25);
    }

</style>

<div class="form-wrapper">

    <div class="form-card">

        <div class="form-header">

            <h2>
                Tambah Kategori
            </h2>

            <div class="close-btn">
                ×
            </div>

        </div>

        <form>

            <div class="input-group">

                <label class="input-label">
                    Nama Kategori
                </label>

                <input
                    type="text"
                    class="input-field"
                    placeholder="Contoh: AC, TV, Mesin Cuci"
                >

            </div>

            <div class="input-group">

                <label class="input-label">
                    Upload Icon Kategori
                </label>

                <label class="upload-box">

                    <div class="upload-icon">
                        ⬆
                    </div>

                    <div class="upload-text">
                        Klik untuk upload icon kategori
                    </div>

                    <input
                        type="file"
                        hidden
                    >

                </label>

            </div>

            <div class="input-group">

                <label class="input-label">
                    Status Kategori
                </label>

                <div class="toggle-wrapper">

                    <div class="toggle-switch"></div>

                    <span>
                        Aktif
                    </span>

                </div>

            </div>

            <div class="form-buttons">

                <button
                    type="button"
                    class="cancel-btn"
                >
                    Batal
                </button>

                <button
                    type="submit"
                    class="save-btn"
                >
                    Simpan Kategori
                </button>

            </div>

        </form>

    </div>

</div>

@endsection