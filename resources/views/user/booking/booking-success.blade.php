<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Berhasil</title>
</head>
<body>

<div class="success-container">

    <div class="success-card">

        <div class="success-icon">

            ✓

        </div>

        <h1>

            Booking Berhasil

        </h1>

        <p>

            Permintaan layanan berhasil dikirim.

            Penyedia layanan akan segera menghubungi Anda.

        </p>

        <div class="success-info">

            Silahkan pantau perkembangan pesanan
            melalui halaman Aktivitas.

        </div>

        <a href="{{ route('aktifitas') }}"
           class="activity-btn">

            Lihat Aktivitas

        </a>

    </div>

</div>

</body>
</html>

<style>

body{

    margin:0;

    min-height:100vh;

    display:flex;

    justify-content:center;

    align-items:center;

    background:#F8F9FB;

    font-family:sans-serif;
}

.success-container{

    width:100%;

    padding:30px;
}

.success-card{

    max-width:650px;

    margin:auto;

    background:white;

    border-radius:30px;

    padding:60px 40px;

    text-align:center;

    box-shadow:
        0 20px 50px rgba(0,0,0,.08);
}

.success-icon{

    width:120px;
    height:120px;

    margin:auto auto 30px;

    border-radius:50%;

    background:#E9F8EE;

    color:#28A745;

    display:flex;

    align-items:center;

    justify-content:center;

    font-size:60px;

    font-weight:700;
}

.success-card h1{

    margin:0;

    color:#222;

    font-size:42px;

    font-weight:800;
}

.success-card p{

    margin-top:20px;

    color:#666;

    font-size:18px;

    line-height:1.8;
}

.success-info{

    margin-top:25px;

    padding:18px;

    border-radius:16px;

    background:#FFF8F2;

    color:#777;
}

.activity-btn{

    margin-top:35px;

    display:inline-flex;

    align-items:center;

    justify-content:center;

    width:280px;

    height:65px;

    border-radius:18px;

    text-decoration:none;

    background:#F08A28;

    color:white;

    font-size:18px;

    font-weight:700;

    transition:.3s ease;
}

.activity-btn:hover{

    transform:translateY(-2px);

    background:#E67C14;
}

/* MOBILE */

@media(max-width:768px){

    .success-card{

        padding:40px 25px;
    }

    .success-icon{

        width:90px;
        height:90px;

        font-size:45px;
    }

    .success-card h1{

        font-size:30px;
    }

    .activity-btn{

        width:100%;
    }

}

</style>