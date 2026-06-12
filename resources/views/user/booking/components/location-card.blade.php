<div class="booking-card">

    <div class="card-title">
        Lokasi Pengerjaan
    </div>
    <div class="form-group">

        <label>
            Alamat Lengkap
        </label>

        <textarea
            name="address"
            rows="4"
            class="booking-input"
            placeholder="Masukkan alamat lengkap lokasi pengerjaan"
            required
        ></textarea>

    </div>

    <div class="form-group">

        <label>
            Catatan Lokasi (Opsional)
        </label>

        <textarea
            name="location_note"
            rows="3"
            class="booking-input"
            placeholder="Contoh: pagar hitam, rumah cat putih, dekat minimarket"
        ></textarea>

    </div>

</div>

<style>

.booking-card{

    max-width:1000px;

    margin:0 auto 25px;

    padding:25px;

    background:white;

    border-radius:24px;

    box-shadow:
        0 8px 20px rgba(0,0,0,.05);
}

/* =========================
   TITLE
========================= */

.card-title{

    font-size:22px;
    font-weight:700;

    color:#222;

    margin-bottom:20px;
}

/* =========================
   LOCATION
========================= */

.location-content{

    display:flex;

    justify-content:space-between;

    align-items:center;

    gap:20px;
}

.location-left{

    display:flex;

    align-items:flex-start;

    gap:15px;
}

.location-icon{

    font-size:24px;
}

.location-detail h4{

    margin:0;

    font-size:18px;
    font-weight:600;

    color:#222;
}

.location-detail p{

    margin-top:6px;

    color:#777;

    line-height:1.6;

    font-size:14px;
}

/* =========================
   BUTTON
========================= */

.edit-btn{

    border:none;

    background:#F08A28;

    color:white;

    padding:10px 20px;

    border-radius:999px;

    cursor:pointer;

    font-weight:600;
}

.edit-btn:hover{

    background:#E67C14;
}

/* =========================
   NOTE
========================= */

.note-box{

    margin-top:20px;

    background:#F8F8F8;

    border-radius:14px;

    padding:15px;
}

.note-title{

    display:block;

    font-size:12px;

    color:#888;

    margin-bottom:8px;
}

.note-box p{

    margin:0;

    color:#444;

    font-size:14px;
}

.form-group{
    margin-bottom:20px;
}

.form-group label{

    display:block;

    margin-bottom:10px;

    font-size:14px;
    font-weight:700;

    color:#333;
}

.booking-input{

    width:100%;

    padding:14px;

    border:1px solid #E5E5E5;

    border-radius:14px;

    resize:none;

    font-size:14px;

    outline:none;

    transition:.3s;
}

.booking-input:focus{

    border-color:#F08A28;

    box-shadow:
        0 0 0 4px rgba(240,138,40,.08);
}
/* =========================
   MOBILE
========================= */

@media(max-width:768px){

    .location-content{

        flex-direction:column;

        align-items:flex-start;
    }

    .edit-btn{

        width:100%;
    }

}

</style>