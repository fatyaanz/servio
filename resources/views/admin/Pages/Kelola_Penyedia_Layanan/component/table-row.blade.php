@forelse($providers as $provider)

<tr>

    <td>

        <div class="provider-info">

            <div class="provider-avatar">
                {{ strtoupper(substr($provider->name, 0, 2)) }}
            </div>

            <div>

                <div class="provider-name">
                    {{ $provider->name }}
                </div>

                <div class="provider-sub">
                    {{ $provider->email }}
                </div>

                <div class="provider-sub">
                    ID: {{ $provider->id }}
                </div>

            </div>

        </div>

    </td>

    <td>

        <span class="category-badge">
            Provider
        </span>

    </td>

    <td>
        -
    </td>

    <td>
        ⭐ 0
    </td>

    <td>

        <span class="status active">
            Aktif
        </span>

    </td>

    <td>
        {{ $provider->created_at ? $provider->created_at->format('d M Y') : '-' }}
    </td>

    <td>

        <a
            href="{{ route('admin.providers.show', $provider->id) }}"
            class="detail-btn"
            style="text-decoration:none;display:inline-block;"
        >
            Detail
        </a>

    </td>

</tr>

@empty

<tr>

    <td colspan="7" style="text-align:center;padding:40px;">
        Belum ada provider aktif
    </td>

</tr>

@endforelse

<style>

/* =========================
    PROVIDER INFO
========================= */

.provider-info{

    display:flex;

    align-items:center;

    gap:14px;

    min-width:240px;

}

.provider-avatar{

    width:60px;
    height:60px;

    border-radius:18px;

    background:linear-gradient(
        135deg,
        #ffb066,
        #ff7a00
    );

    display:flex;

    justify-content:center;
    align-items:center;

    color:white;

    font-size:22px;
    font-weight:700;

    flex-shrink:0;

}

.provider-name{

    font-size:15px;
    font-weight:700;

    color:#111827;

    margin-bottom:4px;

}

.provider-sub{

    font-size:13px;

    color:#6b7280;

    line-height:1.5;

}

/* =========================
    BADGES
========================= */

.category-badge{

    padding:7px 14px;

    border-radius:999px;

    background:#fff4e8;

    color:#ff7a00;

    font-size:12px;
    font-weight:700;

}

.status{

    padding:7px 15px;

    border-radius:999px;

    font-size:12px;
    font-weight:700;

}

.active{

    background:#dcfce7;

    color:#16a34a;

}

/* =========================
    DETAIL BUTTON
========================= */

.detail-btn{

    padding:10px 16px;

    border:none;

    border-radius:12px;

    background:#fff4e8;

    color:#ff7a00;

    font-size:13px;
    font-weight:700;

    cursor:pointer;

    transition:0.25s ease;

}

.detail-btn:hover{

    background:#ff7a00;

    color:white;

}

</style>