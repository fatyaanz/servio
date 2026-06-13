<tr>

    <!-- KATEGORI -->

    <td>

        <div class="category-info">

            <div class="category-icon">

                @if($category->icon)

                    <img
                        src="{{ asset('storage/'.$category->icon) }}"
                        alt="{{ $category->name }}"
                    >

                @else

                    <i class='bx bx-category'></i>

                @endif

            </div>

            <div class="category-detail">

                <h4>
                    {{ $category->name }}
                </h4>

                <p>
                    Kategori layanan Servio
                </p>

            </div>

        </div>

    </td>

    <!-- JUMLAH PROVIDER -->

    <td>

        <div class="provider-count">

            {{ $category->providers_count }} Penyedia

        </div>

    </td>

    <!-- LIHAT PROVIDER -->

    <td>

        <button
            type="button"
            class="provider-btn"
            onclick="openProviderModal({{ $category->id }})"
            style="border: none; cursor: pointer; outline: none;"
        >
            <i class='bx bx-group'></i>
            Lihat Penyedia
        </button>

    </td>

    <!-- DIBUAT -->

    <td>

        <div class="date-info">

            {{ $category->created_at->format('d M Y') }}

            <span>
                {{ $category->created_at->format('H:i') }} WIB
            </span>

        </div>

    </td>

    <!-- STATUS -->

    <td>

        @if($category->is_active)

            <span class="badge badge-success">
                Aktif
            </span>

        @else

            <span class="badge badge-danger">
                Nonaktif
            </span>

        @endif

    </td>

    <!-- AKSI -->

    <td>

        <div class="action-group">

            <a
                href="{{ route('categories.edit', $category->id) }}"
                class="edit-btn"
                title="Edit Kategori"
            >

                <i class='bx bx-edit-alt'></i>

            </a>

        </div>

    </td>

</tr>

<style>

/* =========================
    CATEGORY INFO
========================= */

.category-info{

    display:flex;

    align-items:center;

    gap:14px;

    min-width:240px;

}

/* =========================
    ICON
========================= */

.category-icon{

    width:48px;
    height:48px;

    border-radius:14px;

    background:#FFF4E6;

    display:flex;

    align-items:center;
    justify-content:center;

    overflow:hidden;

    flex-shrink:0;

    color:var(--primary);

    font-size:20px;

}

.category-icon img{

    width:100%;
    height:100%;

    object-fit:cover;

}

/* =========================
    DETAIL
========================= */

.category-detail h4{

    font-size:14px;

    font-weight:600;

    color:var(--text-dark);

    margin-bottom:4px;

}

.category-detail p{

    font-size:12px;

    color:var(--text-secondary);

}

/* =========================
    PROVIDER COUNT
========================= */

.provider-count{

    font-size:14px;

    font-weight:600;

    color:var(--text-dark);

    white-space:nowrap;

}

/* =========================
    PROVIDER BUTTON
========================= */

.provider-btn{

    display:inline-flex;

    align-items:center;

    gap:8px;

    padding:8px 14px;

    border-radius:12px;

    background:#FFF4E6;

    color:var(--primary);

    text-decoration:none;

    font-size:13px;

    font-weight:600;

    transition:.3s;

}

.provider-btn:hover{

    background:var(--primary);

    color:white;

}

/* =========================
    DATE
========================= */

.date-info{

    display:flex;

    flex-direction:column;

    gap:2px;

    white-space:nowrap;

    font-size:13px;

    color:var(--text-dark);

    font-weight:500;

}

.date-info span{

    font-size:11px;

    color:var(--text-secondary);

}

/* =========================
    ACTION
========================= */

.action-group{

    display:flex;

    align-items:center;

    gap:8px;

}

/* =========================
    EDIT BUTTON
========================= */

.edit-btn{

    width:40px;
    height:40px;

    display:flex;

    align-items:center;
    justify-content:center;

    border-radius:12px;

    background:#FFF4E6;

    color:var(--primary);

    text-decoration:none;

    transition:.3s;

}

.edit-btn:hover{

    background:var(--primary);

    color:white;

}

/* =========================
    RESPONSIVE
========================= */

@media(max-width:768px){

    .category-info{

        min-width:220px;

    }

}

</style>