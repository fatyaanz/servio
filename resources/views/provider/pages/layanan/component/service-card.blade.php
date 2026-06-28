@php
    $category = $service->category;
@endphp

<div class="service-card">
    <!-- LEFT -->
    <div class="service-left">
        <div class="service-icon">
            @if($category->icon)
                <img src="{{ asset('storage/'.$category->icon) }}" alt="{{ $category->name }}" style="width: 100%; height: 100%; object-fit: cover; border-radius: 24px;">
            @else
                <i class='bx bx-category' style="color: #FF8A00;"></i>
            @endif
        </div>
        <h3>{{ $category->name }}</h3>
        
        <div class="service-status">
            <span>Status Layanan</span>
            <span class="status-badge">Aktif</span>
        </div>
    </div>

    <!-- RIGHT -->
    <div class="service-right">
        <div class="service-header">
            <div class="sub-count">
                {{ $service->subServices->count() }} Sub Layanan
            </div>
            <button class="add-btn" onclick="openKelolaModal('{{ $service->id }}')">
                + Tambah Layanan
            </button>
        </div>

        <div class="sub-services-grid">
            @forelse($service->subServices as $sub)
                <div class="sub-service-card">
                    <div class="sub-card-top">
                        <div class="sub-photo">
                            @if($sub->photo)
                                <img src="{{ asset('storage/' . $sub->photo) }}" alt="{{ $sub->name }}">
                            @else
                                <div class="photo-placeholder"><i class='bx bx-image' style="font-size:24px;color:#94a3b8;"></i></div>
                            @endif
                        </div>
                        <div class="sub-info">
                            <h4>{{ $sub->name }}</h4>
                            <p class="sub-desc">{{ $sub->description ?? 'Belum ada deskripsi untuk sub layanan ini.' }}</p>
                        </div>
                    </div>
                    
                    <div class="sub-card-bottom">
                        <div class="sub-stats">
                            <div class="stat-item price-stat">
                                <span class="stat-label">Harga</span>
                                <span class="stat-val">Rp{{ number_format($sub->price_min, 0, ',', '.') }} - Rp{{ number_format($sub->price_max, 0, ',', '.') }}</span>
                            </div>
                            <div class="stat-item order-stat">
                                <span class="stat-label">Pesanan</span>
                                <span class="stat-badge"><i class='bx bx-package'></i> {{ $subServiceOrderCounts[$sub->id] ?? 0 }}</span>
                            </div>
                        </div>
                        
                        <div class="sub-actions">
                            <button
                                class="edit-btn"
                                data-id="{{ $sub->id }}"
                                data-name="{{ $sub->name }}"
                                data-min="{{ $sub->price_min }}"
                                data-max="{{ $sub->price_max }}"
                                data-description="{{ $sub->description }}"
                                data-photo="{{ $sub->photo }}"
                                onclick="openEditModal(this)"
                                title="Edit Sub Layanan"
                            >
                                <i class='bx bx-edit-alt'></i>
                            </button>
                            <form action="{{ route('provider.subservice.delete', $sub->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="delete-btn" onclick="return confirm('Hapus sub layanan ini?')" title="Hapus Sub Layanan">
                                    <i class='bx bx-trash'></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="empty-sub">
                    <div class="empty-icon"><i class='bx bx-inbox' style="font-size:40px;color:#94a3b8;"></i></div>
                    <h4>Belum ada sub layanan</h4>
                    <p>Silakan tambah sub layanan untuk mulai menerima pesanan.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>

<style>
/* =========================
   CARD
========================= */
.service-card {
    background: #fff;
    border-radius: 28px;
    padding: 30px;
    display: flex;
    gap: 32px;
    margin-bottom: 24px;
    border: 1px solid #f1f5f9;
    box-shadow: 0 10px 35px rgba(15,23,42,.06);
    transition: .3s ease;
}
.service-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 18px 40px rgba(15,23,42,.10);
}

/* =========================
   LEFT
========================= */
.service-left {
    width: 260px;
    flex-shrink: 0;
}
.service-icon {
    width: 90px;
    height: 90px;
    border-radius: 24px;
    background: linear-gradient(135deg, #FFF4E8, #FFE7C7);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 40px;
    margin-bottom: 20px;
}
.service-left h3 {
    font-size: 32px;
    font-weight: 800;
    color: #111827;
    margin-bottom: 24px;
}
.service-status {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-top: 14px;
    border-top: 1px solid #f1f5f9;
}
.service-status span:first-child {
    color: #64748B;
    font-size: 14px;
}
.status-badge {
    background: #ECFDF3;
    color: #16A34A;
    padding: 8px 14px;
    border-radius: 999px;
    font-size: 12px;
    font-weight: 700;
}

/* =========================
   RIGHT (SUB SERVICES)
========================= */
.service-right {
    flex: 1;
}
.service-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}
.sub-count {
    background: #FFF4E8;
    color: #FF8A00;
    padding: 10px 16px;
    border-radius: 12px;
    font-weight: 700;
    font-size: 14px;
}
.add-btn {
    border: none;
    background: linear-gradient(135deg, #FFA63D, #FF8A00);
    color: white;
    padding: 12px 18px;
    border-radius: 14px;
    cursor: pointer;
    font-weight: 700;
    transition: .25s ease;
}
.add-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(255,138,0,.25);
}

/* =========================
   RICH LIST (GRID)
========================= */
.sub-services-grid {
    display: flex;
    flex-direction: column;
    gap: 16px;
}
.sub-service-card {
    background: #F8FAFC;
    border: 1px solid #e2e8f0;
    border-radius: 20px;
    padding: 20px;
    display: flex;
    flex-direction: column;
    gap: 16px;
    transition: .2s ease;
}
.sub-service-card:hover {
    background: #fff;
    border-color: #cbd5e1;
    box-shadow: 0 4px 15px rgba(0,0,0,0.03);
}

/* Top Section (Photo & Info) */
.sub-card-top {
    display: flex;
    gap: 16px;
}
.sub-photo {
    width: 80px;
    height: 80px;
    flex-shrink: 0;
}
.sub-photo img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 14px;
    border: 1px solid #e2e8f0;
}
.photo-placeholder {
    width: 100%;
    height: 100%;
    border-radius: 14px;
    border: 1px dashed #cbd5e1;
    background: #f1f5f9;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    color: #94a3b8;
}
.sub-info {
    flex: 1;
}
.sub-info h4 {
    font-size: 16px;
    font-weight: 700;
    color: #1e293b;
    margin-bottom: 6px;
}
.sub-desc {
    font-size: 13px;
    color: #64748b;
    line-height: 1.5;
}

/* Bottom Section (Stats & Actions) */
.sub-card-bottom {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-top: 16px;
    border-top: 1px solid #e2e8f0;
}
.sub-stats {
    display: flex;
    gap: 24px;
}
.stat-item {
    display: flex;
    flex-direction: column;
    gap: 4px;
}
.stat-label {
    font-size: 11px;
    font-weight: 600;
    color: #94a3b8;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}
.stat-val {
    font-size: 14px;
    font-weight: 800;
    color: #FF8A00;
}
.stat-badge {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    background: #FFF4E8;
    color: #FF8A00;
    padding: 4px 10px;
    border-radius: 8px;
    font-weight: 700;
    font-size: 12px;
}
.sub-actions {
    display: flex;
    gap: 8px;
}
.edit-btn {
    width: 38px;
    height: 38px;
    border: none;
    border-radius: 10px;
    background: #e0f2fe;
    color: #0369a1;
    cursor: pointer;
    font-size: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: .2s ease;
}
.edit-btn:hover {
    background: #bae6fd;
}
.delete-btn {
    width: 38px;
    height: 38px;
    border: none;
    border-radius: 10px;
    background: #fee2e2;
    color: #b91c1c;
    cursor: pointer;
    font-size: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: .2s ease;
}
.delete-btn:hover {
    background: #fecaca;
}

/* Empty State */
.empty-sub {
    background: #F8FAFC;
    border: 1px dashed #cbd5e1;
    border-radius: 20px;
    padding: 40px;
    text-align: center;
    display: flex;
    flex-direction: column;
    align-items: center;
}
.empty-icon {
    font-size: 40px;
    margin-bottom: 12px;
}
.empty-sub h4 {
    font-size: 16px;
    font-weight: 600;
    color: #334155;
    margin-bottom: 4px;
}
.empty-sub p {
    font-size: 13px;
    color: #94a3b8;
}

/* =========================
   RESPONSIVE
========================= */
@media(max-width:1000px){
    .service-card {
        flex-direction: column;
        padding: 22px;
    }
    .service-left {
        width: 100%;
        display: flex;
        align-items: center;
        gap: 20px;
        flex-wrap: wrap;
    }
    .service-icon {
        width: 60px;
        height: 60px;
        margin-bottom: 0;
    }
    .service-left h3 {
        margin-bottom: 0;
        font-size: 24px;
    }
    .service-status {
        width: 100%;
        margin-top: 10px;
    }
    .service-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 12px;
    }
}
@media(max-width:600px){
    .sub-card-bottom {
        flex-direction: column;
        align-items: flex-start;
        gap: 16px;
    }
    .sub-actions {
        width: 100%;
        justify-content: flex-end;
    }
}
</style>
