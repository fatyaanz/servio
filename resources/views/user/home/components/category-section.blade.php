<div class="category-section">

    <div class="section-header">

        <h2>Kategori Layanan</h2>

        <button id="showMoreBtn">
            Lihat Semua
        </button>

    </div>

    <div class="category-grid">

        @foreach($categories as $category)

            <a
                href="{{ route('layanan', [
                    'category' => $category->id
                ]) }}"
                class="category-card"
            >

                <div class="category-icon">

                    @if($category->icon)

                        <img
                            src="{{ asset('storage/' . $category->icon) }}"
                            alt="{{ $category->name }}"
                            width="50"
                        >

                    @endif

                </div>

                <span>

                    {{ $category->name }}

                </span>

            </a>

        @endforeach

    </div>

</div>

<style>

/* =========================
   SECTION
========================= */

.category-section{
    max-width:1400px;
    margin:30px auto;
    padding:0 30px;
}

/* =========================
   HEADER
========================= */

.section-header{
    display:flex;
    justify-content:space-between;
    align-items:center;

    margin-bottom:20px;
}
.category-icon img{

    width:50px;
    height:50px;

    object-fit:contain;
}
.section-header h2{
    margin:0;

    font-size:28px;
    font-weight:800;

    color:#222;
}

.section-header button{
    border:none;

    background:rgba(240,138,40,0.1);

    color:#F08A28;

    padding:10px 18px;

    border-radius:999px;

    font-size:14px;
    font-weight:700;

    cursor:pointer;

    transition:.3s ease;
}

.section-header button:hover{
    background:#F08A28;
    color:white;

    transform:translateY(-2px);
}

/* =========================
   GRID
========================= */

.category-grid{
    display:grid;

    grid-template-columns:repeat(4,1fr);

    gap:20px;
}

/* =========================
   CARD
========================= */

.category-card{
    text-decoration:none;
    color:inherit;

    display:flex;
    flex-direction:column;
    align-items:center;
    justify-content:center;

    min-height:150px;

    background:rgba(255,255,255,0.85);

    backdrop-filter:blur(18px);
    -webkit-backdrop-filter:blur(18px);

    border:1px solid rgba(255,255,255,0.4);

    border-radius:24px;

    box-shadow:0 10px 25px rgba(0,0,0,0.05);

    cursor:pointer;

    transition:all .35s ease;
}

.category-card:hover{
    transform:
        translateY(-8px);

    box-shadow:
        0 20px 35px rgba(240,138,40,0.15);

    border-color:
        rgba(240,138,40,0.25);
}

.category-icon{
    font-size:42px;

    margin-bottom:14px;

    transition:.3s ease;
}

.category-card:hover .category-icon{
    transform:scale(1.1);
}

.category-card span{
    font-size:16px;
    font-weight:700;

    color:#333;
}

/* =========================
   HIDDEN CATEGORY
========================= */

.hidden-category{
    display:none;

    margin-top:20px;

    animation:fadeIn .4s ease;
}

@keyframes fadeIn{
    from{
        opacity:0;
        transform:translateY(10px);
    }
    to{
        opacity:1;
        transform:translateY(0);
    }
}

/* =========================
   TABLET
========================= */

@media(max-width:1024px){

    .category-section{
        padding:0 20px;
    }

    .category-grid{
        grid-template-columns:repeat(2,1fr);
    }

}

/* =========================
   MOBILE
========================= */

@media(max-width:768px){

    .category-section{
        padding:0 15px;
    }

    .section-header h2{
        font-size:22px;
    }

    .section-header button{
        padding:8px 14px;
        font-size:13px;
    }

    .category-grid{
        gap:12px;
    }

    .category-card{
        min-height:120px;
        border-radius:18px;
    }

    .category-icon{
        font-size:34px;
    }

    .category-card span{
        font-size:14px;
    }

}

/* =========================
   MOBILE KECIL
========================= */

@media(max-width:480px){

    .category-grid{
        grid-template-columns:repeat(2,1fr);
    }

    .category-card{
        min-height:105px;
        padding:10px;
    }

    .category-icon{
        font-size:28px;
        margin-bottom:10px;
    }

    .category-card span{
        font-size:13px;
    }

    .section-header h2{
        font-size:20px;
    }

}

</style>

<script>

document.addEventListener('DOMContentLoaded', function(){

    const btn = document.getElementById('showMoreBtn');
    const more = document.getElementById('moreCategory');

    btn.addEventListener('click', function(){

        if(more.style.display === 'grid'){

            more.style.display = 'none';
            btn.innerText = 'Lihat Semua';

        }else{

            more.style.display = 'grid';
            btn.innerText = 'Sembunyikan';

        }

    });

});

</script>