<div class="analyze-section">

    <div class="analyze-info">

        Foto dan deskripsi akan digunakan
        untuk membantu proses analisis
        kerusakan.

    </div>

    <a href="{{ route('diagnosis.result') }}"
       class="analyze-btn">

        Analisis Kerusakan

    </a>

</div>

<style>

.analyze-section{

    max-width:900px;

    margin:25px auto 80px;

    padding:0 30px;
}

.analyze-info{

    color:#777;

    font-size:14px;

    line-height:1.7;

    margin-bottom:18px;
}

.analyze-btn{

    width:100%;

    height:65px;

    display:flex;

    align-items:center;
    justify-content:center;

    background:#F08A28;

    color:white;

    text-decoration:none;

    border-radius:16px;

    font-size:18px;
    font-weight:700;

    transition:.3s ease;

    box-shadow:
        0 10px 25px rgba(240,138,40,.25);
}

.analyze-btn:hover{

    background:#E67C14;

    transform:translateY(-2px);
}

@media(max-width:768px){

    .analyze-section{

        padding:0 20px;
    }

    .analyze-btn{

        height:55px;

        font-size:16px;
    }

}

</style>