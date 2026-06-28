<div class="category-grid">
    @forelse($categories as $category)
        <div class="category-card">
            <div class="card-header">
                <div class="category-icon">
                    @if($category->icon)
                        <img src="{{ asset('storage/'.$category->icon) }}" alt="{{ $category->name }}">
                    @else
                        <i class='bx bx-category'></i>
                    @endif
                </div>
                <div class="action-group">
                    @if($category->is_active)
                        <span class="badge badge-success">Aktif</span>
                    @else
                        <span class="badge badge-danger">Nonaktif</span>
                    @endif
                    <a href="{{ route('categories.edit', $category->id) }}" class="edit-btn" title="Edit Kategori">
                        <i class='bx bx-edit-alt'></i>
                    </a>
                </div>
            </div>
            
            <div class="card-body">
                <h4>{{ $category->name }}</h4>
                <p class="created-date">Dibuat: {{ $category->created_at->format('d M Y') }}</p>
                
                <div class="stats-row">
                    <div class="stat-box">
                        <i class='bx bx-group'></i>
                        <div class="stat-info">
                            <span class="stat-value">{{ $category->providers_count }}</span>
                            <span class="stat-label">Penyedia</span>
                        </div>
                    </div>
                    <div class="stat-box">
                        <i class='bx bx-shopping-bag'></i>
                        <div class="stat-info">
                            <span class="stat-value">{{ $category->orders_count ?? 0 }}</span>
                            <span class="stat-label">Pesanan</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="card-footer">
                <button class="provider-btn" onclick="openProviderModal('{{ $category->id }}')">
                    Lihat Detail Penyedia <i class='bx bx-right-arrow-alt'></i>
                </button>
            </div>
        </div>
    @empty
        <div class="empty-state">
            <i class='bx bx-category'></i>
            <h4>Belum Ada Kategori</h4>
            <p>Tambahkan kategori layanan pertama untuk mulai mengelola provider.</p>
        </div>
    @endforelse
</div>

<style>
.category-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
    gap: 24px;
}

.category-card {
    background: #ffffff;
    border-radius: 24px;
    border: 1px solid #eef2f7;
    padding: 24px;
    display: flex;
    flex-direction: column;
    gap: 20px;
    transition: all 0.3s ease;
    box-shadow: 0 4px 6px -1px rgba(0,0,0,0.02);
}

.category-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 20px -8px rgba(255, 122, 0, 0.15);
    border-color: rgba(255, 122, 0, 0.2);
}

.card-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
}

.category-icon {
    width: 56px;
    height: 56px;
    border-radius: 16px;
    background: linear-gradient(135deg, #fff7ed, #ffedd5);
    display: flex;
    align-items: center;
    justify-content: center;
    color: #ff7a00;
    font-size: 28px;
    overflow: hidden;
}

.category-icon img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.action-group {
    display: flex;
    align-items: center;
    gap: 12px;
}

.badge {
    padding: 6px 12px;
    border-radius: 99px;
    font-size: 11px;
    font-weight: 700;
}

.badge-success { background: #dcfce7; color: #16a34a; }
.badge-danger { background: #fee2e2; color: #dc2626; }

.edit-btn {
    width: 36px;
    height: 36px;
    border-radius: 10px;
    background: #f8fafc;
    color: #64748b;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    transition: 0.2s;
}

.edit-btn:hover {
    background: #ff7a00;
    color: white;
}

.card-body h4 {
    font-size: 18px;
    font-weight: 700;
    color: #1e293b;
    margin-bottom: 4px;
}

.created-date {
    font-size: 13px;
    color: #94a3b8;
    margin-bottom: 20px;
}

.stats-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 12px;
    background: #f8fafc;
    border-radius: 16px;
    padding: 16px;
}

.stat-box {
    display: flex;
    align-items: center;
    gap: 12px;
}

.stat-box i {
    font-size: 20px;
    color: #ff7a00;
    background: #fff7ed;
    width: 36px;
    height: 36px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.stat-info {
    display: flex;
    flex-direction: column;
}

.stat-value {
    font-size: 16px;
    font-weight: 700;
    color: #1e293b;
    line-height: 1.2;
}

.stat-label {
    font-size: 12px;
    color: #64748b;
    font-weight: 500;
}

.card-footer {
    margin-top: auto;
}

.provider-btn {
    width: 100%;
    padding: 12px;
    border-radius: 14px;
    border: none;
    background: #fff7ed;
    color: #ff7a00;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    transition: 0.2s;
}

.provider-btn:hover {
    background: #ff7a00;
    color: white;
}

.empty-state {
    grid-column: 1 / -1;
    background: white;
    border-radius: 24px;
    padding: 60px 20px;
    text-align: center;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.empty-state i {
    font-size: 56px;
    color: #cbd5e1;
    margin-bottom: 16px;
}

.empty-state h4 {
    font-size: 18px;
    font-weight: 600;
    color: #334155;
    margin-bottom: 8px;
}

.empty-state p {
    font-size: 14px;
    color: #94a3b8;
}
</style>