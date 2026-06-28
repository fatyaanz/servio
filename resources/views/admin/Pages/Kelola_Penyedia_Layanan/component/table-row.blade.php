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
            @if($provider->categories->count())
                {{ $provider->categories->pluck('name')->join(', ') }}
            @else
                Belum ada kategori
            @endif
        </span>

    </td>

    <td>
        {{ $provider->city ?? $provider->address ?? '-' }}
    </td>

    <td>

        <div class="rating-display">

            <i class='bx bxs-star'></i>

            <span>{{ number_format($provider->providerReviews->avg('rating') ?? 0, 1) }}</span>

        </div>

    </td>

    <td>

        @if($provider->status == 'active')
            @if($provider->is_online === false)
                <span class="badge" style="background:#f3f4f6; color:#4b5563; padding:6px 12px; border-radius:999px; font-size:11px; font-weight:700; border: none;">
                    Offline
                </span>
            @else
                <span class="badge badge-success" style="background:#dcfce7; color:#16a34a; padding:6px 12px; border-radius:999px; font-size:11px; font-weight:700; border: none;">
                    Aktif
                </span>
            @endif
        @elseif($provider->status == 'pending')
            <span class="badge badge-warning" style="background:#fef3c7; color:#d97706; padding:6px 12px; border-radius:999px; font-size:11px; font-weight:700; border: none;">
                Pending
            </span>
        @elseif($provider->status == 'suspended')
            <span class="badge badge-danger" style="background:#fee2e2; color:#dc2626; padding:6px 12px; border-radius:999px; font-size:11px; font-weight:700; border: none;">
                Suspended
            </span>
        @else
            <span class="badge badge-secondary" style="background:#f1f5f9; color:#64748b; padding:6px 12px; border-radius:999px; font-size:11px; font-weight:700; border: none;">
                {{ ucfirst($provider->status) }}
            </span>
        @endif

    </td>

    <td>
        {{ $provider->created_at ? $provider->created_at->format('d M Y') : '-' }}
    </td>

    <td>

        <div style="display: flex; gap: 8px;">
            <a
                href="{{ route('admin.providers.show', $provider->id) }}"
                class="btn btn-secondary detail-btn"
            >
                Detail
            </a>
            
            <a
                href="{{ route('admin.Pages.chat.chat', ['user_id' => $provider->id]) }}"
                class="btn btn-primary chat-btn"
                style="padding: 8px 14px; background: #FFF4E6; color: #ff7a00; border: 1px solid rgba(255,122,0,0.2); border-radius: 10px; text-decoration: none; font-size: 12px; font-weight: 700; transition: .2s; display: flex; align-items: center; gap: 4px;"
                onmouseover="this.style.background='#ff7a00'; this.style.color='white';"
                onmouseout="this.style.background='#FFF4E6'; this.style.color='#ff7a00';"
            >
                <i class='bx bx-message-rounded-dots' style="font-size: 16px;"></i> Chat
            </a>
        </div>

    </td>

</tr>

@empty

<tr>

    <td colspan="7" class="empty-table">

        <div class="empty-content">

            <i class='bx bx-user-x'></i>

            <h4>
                Belum Ada Provider
            </h4>

            <p>
                Belum ada penyedia layanan yang tersedia saat ini.
            </p>

        </div>

    </td>

</tr>

@endforelse

<style>
.empty-table{
    background:white !important;
    padding:50px 20px !important;
}

.empty-content{
    display:flex;
    flex-direction:column;
    align-items:center;
    justify-content:center;
}

.empty-content i{
    font-size:56px;
    color:#cbd5e1;
    margin-bottom:12px;
}

.empty-content h4{
    font-size:18px;
    font-weight:600;
    color:var(--text-dark);
    margin-bottom:6px;
}

.empty-content p{
    font-size:14px;
    color:var(--text-secondary);
}
    .empty-table{

    text-align:center;

    padding:40px 20px;

    background:white;
}

.empty-table i{

    font-size:36px;

    color:var(--text-secondary);
}

.empty-table p{

    margin-top:10px;

    color:var(--text-secondary);
}

    .rating-display{

    display:flex;
    align-items:center;
    gap:6px;

    color:#f59e0b;

    font-weight:600;
}

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

    width:48px;
    height:48px;

    border-radius:14px;

    background:linear-gradient(
        135deg,
        var(--primary),
        #ffb347
    );

    display:flex;
    align-items:center;
    justify-content:center;

    color:white;

    font-size:16px;
    font-weight:700;

    flex-shrink:0;
}

.provider-name{

    font-size:14px;
    font-weight:600;

    color:var(--text-dark);

    margin-bottom:4px;
}

.provider-sub{

    font-size:12px;

    color:var(--text-secondary);

    line-height:1.5;
}

/* =========================
    BADGES
========================= */

.category-badge{
    display:inline-block;

    padding:6px 12px;

    border-radius:999px;

    background:#FFF4E6;

    color:var(--primary);

    font-size:12px;
    font-weight:600;
}



/* =========================
    DETAIL BUTTON
========================= */

.detail-btn{
    padding:8px 14px;
}

.detail-btn:hover{

    background:#ff7a00;

    color:white;

}

</style>