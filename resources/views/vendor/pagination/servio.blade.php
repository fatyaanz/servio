@if ($paginator->hasPages())
    <div class="pagination-wrapper">

        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <button class="pagination-btn disabled" disabled aria-label="@lang('pagination.previous')">
                <i class='bx bx-chevron-left'></i>
            </button>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="pagination-btn" rel="prev" aria-label="@lang('pagination.previous')">
                <i class='bx bx-chevron-left'></i>
            </a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <button class="pagination-number disabled" disabled>{{ $element }}</button>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <button class="pagination-number active" aria-current="page">{{ $page }}</button>
                    @else
                        <a href="{{ $url }}" class="pagination-number">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="pagination-btn" rel="next" aria-label="@lang('pagination.next')">
                <i class='bx bx-chevron-right'></i>
            </a>
        @else
            <button class="pagination-btn disabled" disabled aria-label="@lang('pagination.next')">
                <i class='bx bx-chevron-right'></i>
            </button>
        @endif
    </div>

    <style>
    /* =========================
        PAGINATION
    ========================= */
    .pagination-wrapper{
        display:flex;
        justify-content:center;
        align-items:center;
        gap:10px;
        margin-top:28px;
        flex-wrap:wrap;
    }
    /* =========================
        BUTTON
    ========================= */
    .pagination-btn,
    .pagination-number{
        width:42px;
        height:42px;
        display:flex;
        align-items:center;
        justify-content:center;
        border:1px solid var(--border, #E2E8F0);
        border-radius:12px;
        background:white;
        color:var(--text-secondary, #64748B);
        font-size:14px;
        font-weight:600;
        cursor:pointer;
        transition:.3s;
        text-decoration:none;
        outline:none;
    }
    .pagination-btn.disabled,
    .pagination-number.disabled {
        opacity: 0.5;
        cursor: not-allowed;
    }
    /* =========================
        ACTIVE
    ========================= */
    .pagination-number.active{
        background:var(--primary, #F08A28);
        color:white;
        border-color:var(--primary, #F08A28);
    }
    /* =========================
        HOVER
    ========================= */
    .pagination-btn:not(.disabled):hover,
    .pagination-number:not(.disabled):hover{
        border-color:var(--primary, #F08A28);
        color:var(--primary, #F08A28);
        transform:translateY(-2px);
    }
    .pagination-number.active:hover{
        color:white;
    }
    /* =========================
        RESPONSIVE
    ========================= */
    @media(max-width:768px){
        .pagination-wrapper{
            gap:8px;
        }
        .pagination-btn,
        .pagination-number{
            width:38px;
            height:38px;
            font-size:13px;
        }
    }
    </style>
@endif
