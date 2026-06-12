<div class="diagnosis-container">

    <a href="{{ url()->previous() }}" class="back-btn">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
            <path d="M15 18L9 12L15 6" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </a>

    <div class="diagnosis-card">

        <div class="step-badge">
            Langkah 2 dari 4
        </div>

        <h1>Cek kerusakan apa yang terjadi</h1>

        <p class="diagnosis-subtitle">
            Isi detail di bawah ini untuk membantu sistem dan teknisi menganalisa kerusakan yang terjadi.
        </p>

        <form id="formDiagnosis">
            @csrf

            <div class="form-group">
                <label for="deskripsi_masalah">Deskripsi Kerusakan</label>
                
                <textarea 
                    id="deskripsi_masalah" 
                    name="deskripsi_masalah" 
                    placeholder="Contoh: AC tidak dingin, mengeluarkan suara berisik, atau bocor air..."
                    required
                ></textarea>
            </div>

            <div class="form-group">
                <label class="upload-label">Upload Foto (Opsional)</label>
                <label class="upload-box">
                    <input type="file" name="foto_kerusakan" accept="image/*" hidden>
                    <div class="upload-content">
                        <div class="upload-icon">📷</div>
                        <div class="upload-text">Tambah Foto</div>
                        <div class="upload-format">JPG, PNG atau JPEG</div>
                    </div>
                </label>
            </div>

            <div class="mt-6">
                <button type="submit" id="btnSubmit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-4 rounded-xl transition-all duration-200 flex items-center justify-center gap-2 shadow-sm">
                    <span id="btnText">Mulai Diagnosis Otomatis ✨</span>
                </button>
            </div>

        </form> </div>
</div>

<style>

/* =========================
   CONTAINER
========================= */

.diagnosis-container{

    max-width:900px;

    margin:20px auto 20px;

    padding:0 30px;
    label{
    display:block;
}
small{
    position:absolute;
}
}

/* =========================
   BACK BUTTON
========================= */

.back-btn{

    width:48px;
    height:48px;

    display:flex;
    align-items:center;
    justify-content:center;

    text-decoration:none;

    color:#333;

    border-radius:16px;

    background:rgba(255,255,255,.85);

    backdrop-filter:blur(15px);
    -webkit-backdrop-filter:blur(15px);

    border:1px solid rgba(255,255,255,.4);

    box-shadow:
        0 8px 20px rgba(0,0,0,.06);

    margin-bottom:20px;

    transition:.3s ease;
}

.back-btn:hover{

    background:#F08A28;

    color:white;

    transform:translateY(-2px);
}

/* =========================
   CARD
========================= */

.diagnosis-card{

    background:rgba(255,255,255,.88);

    backdrop-filter:blur(15px);
    -webkit-backdrop-filter:blur(15px);

    border-radius:28px;

    padding:30px;

    border:1px solid rgba(240,138,40,.08);

    box-shadow:
        0 10px 25px rgba(0,0,0,.04);
}

/* =========================
   STEP BADGE
========================= */

.step-badge{

    width:fit-content;

    padding:8px 14px;

    border-radius:999px;

    background:rgba(240,138,40,.10);

    color:#F08A28;

    font-size:12px;
    font-weight:700;

    border:1px solid rgba(240,138,40,.15);

    margin-bottom:15px;
}

/* =========================
   TITLE
========================= */

.diagnosis-card h1{

    margin:0;

    color:#222;

    font-size:32px;
    font-weight:800;

    line-height:1.3;
}

.diagnosis-subtitle{

    margin-top:12px;

    color:#777;

    font-size:15px;

    line-height:1.8;
}

/* =========================
   FORM
========================= */

.form-group{

    margin-top:25px;
}

.form-group label{

    display:block;

    margin-bottom:10px;

    color:#444;

    font-size:14px;
    font-weight:700;
}

/* =========================
   TEXTAREA
========================= */

textarea{

    width:100%;

    min-height:150px;

    resize:none;

    border:1px solid #EAEAEA;

    border-radius:18px;

    padding:16px;

    font-size:15px;

    color:#333;

    outline:none;

    transition:.3s ease;
}

textarea:focus{

    border-color:#F08A28;

    box-shadow:
        0 0 0 4px rgba(240,138,40,.08);
}

/* =========================
   UPLOAD
========================= */


.upload-label{

    display:block;

    margin-bottom:12px;

    color:#444;

    font-size:14px;
    font-weight:700;
}

.upload-box{

    width:180px;
    height:180px;

    display:flex !important;
    align-items:center;
    justify-content:center;

    border:2px dashed #F08A28;

    border-radius:24px;

    background:#FFFDFB;

    cursor:pointer;

    transition:.3s ease;

    overflow:hidden;
}

.upload-box:hover{

    background:#FFF7EF;

    transform:translateY(-2px);
}

.upload-icon{

    font-size:40px;
}

.upload-text{

    color:#F08A28;

    font-size:16px;
    font-weight:700;
}

.upload-format{

    color:#999;

    font-size:11px;

    line-height:1.4;

    max-width:120px;
}

.upload-box small{

    margin-top:6px;

    color:#999;

    font-size:11px;
}
/* =========================
   CONTENT
========================= */

.upload-content{

    display:flex;
    flex-direction:column;

    align-items:center;
    justify-content:center;

    text-align:center;

    width:100%;
    height:100%;
}


/* =========================
   TABLET
========================= */

@media(max-width:1024px){

    .diagnosis-container{
        padding:0 20px;
    }

}

/* =========================
   MOBILE
========================= */

@media(max-width:768px){

    .diagnosis-container{

        padding:0 15px;
    }

    .diagnosis-card{

        padding:20px;
    }

    .diagnosis-card h1{

        font-size:24px;
    }

    .diagnosis-subtitle{

        font-size:14px;
    }

    .upload-box{

        width:140px;
        height:140px;
    }

}

/* =========================
   MOBILE KECIL
========================= */

@media(max-width:480px){

    .diagnosis-card h1{

        font-size:22px;
    }

    .upload-box{

        width:120px;
        height:120px;
    }

}

</style>