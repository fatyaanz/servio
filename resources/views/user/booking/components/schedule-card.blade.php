<div class="booking-card">

    <div class="card-header">

        <div class="header-icon">
            📅
        </div>

        <div>

            <h3>Jadwal Pengerjaan</h3>

            <p>
                Tentukan kapan layanan akan dilakukan
            </p>

        </div>

    </div>

    <div class="schedule-grid">

        <!-- TANGGAL -->

        <div class="schedule-box">

            <label>
                Tanggal
            </label>

            <div class="input-wrapper">

                <input
                    type="date"
                    name="booking_date"
                    class="schedule-input"
                    required
                >

            </div>

        </div>

        <!-- WAKTU -->

        <div class="schedule-box">

            <label>
                Waktu
            </label>

            <div class="input-wrapper">

                <input
                    type="time"
                    name="booking_time"
                    class="schedule-input"
                    required
                >

            </div>

        </div>

    </div>

</div>

<style>

/* =========================
   CARD
========================= */

.booking-card{

    max-width:1000px;

    margin:0 auto 25px;

    padding:28px;

    border-radius:28px;

    background:rgba(255,255,255,.88);

    backdrop-filter:blur(15px);
    -webkit-backdrop-filter:blur(15px);

    border:1px solid rgba(240,138,40,.08);

    box-shadow:
        0 10px 25px rgba(0,0,0,.04);
}

/* =========================
   HEADER
========================= */

.card-header{

    display:flex;
    align-items:center;

    gap:15px;

    margin-bottom:24px;
}

.header-icon{

    width:52px;
    height:52px;

    border-radius:16px;

    display:flex;
    align-items:center;
    justify-content:center;

    font-size:22px;

    background:rgba(240,138,40,.10);
}

.card-header h3{

    margin:0;

    color:#222;

    font-size:22px;
    font-weight:800;
}

.card-header p{

    margin-top:4px;

    color:#888;

    font-size:13px;
}

/* =========================
   GRID
========================= */

.schedule-grid{

    display:grid;

    grid-template-columns:1fr 1fr;

    gap:18px;
}

/* =========================
   BOX
========================= */

.schedule-box{

    padding:18px;

    border-radius:20px;

    border:1px solid #EEEEEE;

    background:#FCFCFC;

    transition:.3s ease;
}

.schedule-box:hover{

    border-color:#F08A28;

    box-shadow:
        0 10px 20px rgba(240,138,40,.08);
}

.schedule-box label{

    display:block;

    margin-bottom:12px;

    color:#888;

    font-size:12px;
    font-weight:600;
}

/* =========================
   INPUT
========================= */

.input-wrapper{

    width:100%;
}

.schedule-input{

    width:100%;

    border:none;

    outline:none;

    background:transparent;

    color:#222;

    font-size:16px;
    font-weight:700;

    cursor:pointer;
}

/* =========================
   DATE/TIME ICON
========================= */

.schedule-input::-webkit-calendar-picker-indicator{

    cursor:pointer;

    opacity:1;
}

/* =========================
   TABLET
========================= */

@media(max-width:1024px){

    .booking-card{
        margin:0 20px 25px;
    }

}

/* =========================
   MOBILE
========================= */

@media(max-width:768px){

    .booking-card{

        margin:0 15px 20px;

        padding:20px;
    }

    .schedule-grid{

        grid-template-columns:1fr;
    }

    .card-header h3{

        font-size:18px;
    }

}

/* =========================
   MOBILE KECIL
========================= */

@media(max-width:480px){

    .schedule-input{

        font-size:14px;
    }

}

</style>