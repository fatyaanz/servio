@extends('provider.layouts.app')

@section('content')

<div class="notif-page-container">

    <div class="notif-page-wrapper">

        {{-- HEADER --}}
        <div class="notif-page-header">

            <div class="notif-page-title-section">
                <h1><i class='bx bx-bell'></i> Notifikasi</h1>
                <p>Semua pemberitahuan aktivitas Anda</p>
            </div>

            @if($notifications->where('is_read', false)->count() > 0)
                <form action="{{ route('notifications.markAllRead') }}" method="POST">
                    @csrf
                    <button type="submit" class="notif-page-mark-all-btn">
                        ✓ Tandai semua dibaca
                    </button>
                </form>
            @endif

        </div>

        {{-- STATS --}}
        <div class="notif-page-stats">

            <div class="notif-stat-card">
                <div class="notif-stat-icon" style="background:#FEF3C7;"><i class='bx bx-envelope' style="color:#d97706;"></i></div>
                <div class="notif-stat-info">
                    <span class="notif-stat-value">{{ $notifications->where('is_read', false)->count() }}</span>
                    <span class="notif-stat-label">Belum Dibaca</span>
                </div>
            </div>

            <div class="notif-stat-card">
                <div class="notif-stat-icon" style="background:#D1FAE5;"><i class='bx bx-check-circle' style="color:#16a34a;"></i></div>
                <div class="notif-stat-info">
                    <span class="notif-stat-value">{{ $notifications->where('is_read', true)->count() }}</span>
                    <span class="notif-stat-label">Sudah Dibaca</span>
                </div>
            </div>

            <div class="notif-stat-card">
                <div class="notif-stat-icon" style="background:#DBEAFE;"><i class='bx bx-bar-chart-alt-2' style="color:#2563eb;"></i></div>
                <div class="notif-stat-info">
                    <span class="notif-stat-value">{{ $notifications->count() }}</span>
                    <span class="notif-stat-label">Total</span>
                </div>
            </div>

        </div>

        {{-- NOTIFICATION LIST --}}
        <div class="notif-page-list glass-card">

            @forelse($notifications as $notif)
                @php
                    $url = '#';
                    if ($notif->type === 'chat_received') {
                        $url = route('provider.chat');
                    } elseif ($notif->booking_id) {
                        $url = route('provider.detail-pesanan', $notif->booking_id);
                    } elseif (in_array($notif->type, ['category_approved', 'category_rejected'])) {
                        $url = route('provider.layanan');
                    } elseif (in_array($notif->type, ['service_approved', 'service_rejected'])) {
                        $url = route('provider.layanan');
                    }

                    $icon = '<i class="bx bx-bell"></i>';
                    $iconClass = 'default';
                    if ($notif->type === 'chat_received') {
                        $icon = '<i class="bx bx-chat"></i>'; $iconClass = 'chat';
                    } elseif ($notif->type === 'order_created') {
                        $icon = '<i class="bx bx-package"></i>'; $iconClass = 'order';
                    } elseif ($notif->type === 'category_approved') {
                        $icon = '<i class="bx bx-check-circle"></i>'; $iconClass = 'category';
                    } elseif ($notif->type === 'category_rejected') {
                        $icon = '<i class="bx bx-x-circle"></i>'; $iconClass = 'category';
                    } elseif ($notif->type === 'service_approved') {
                        $icon = '<i class="bx bx-wrench"></i>'; $iconClass = 'service';
                    } elseif ($notif->type === 'service_rejected') {
                        $icon = '<i class="bx bx-block"></i>'; $iconClass = 'service';
                    } elseif ($notif->type === 'status_updated') {
                        $icon = '<i class="bx bx-clipboard"></i>'; $iconClass = 'status';
                    }
                @endphp

                <a href="{{ $url }}" class="notif-page-item {{ !$notif->is_read ? 'unread' : '' }}">

                    <div class="notif-page-item-icon {{ $iconClass }}">
                        {!! $icon !!}
                    </div>

                    <div class="notif-page-item-content">
                        <h4 class="notif-page-item-title">{{ $notif->title }}</h4>
                        <p class="notif-page-item-message">{{ $notif->message }}</p>
                        <span class="notif-page-item-time">{{ $notif->created_at->diffForHumans() }}</span>
                    </div>

                    @if(!$notif->is_read)
                        <div class="notif-page-unread-dot"></div>
                    @endif

                </a>

            @empty

                <div class="notif-page-empty">
                    <i class='bx bx-bell' style="font-size:56px;color:#cbd5e1;"></i>
                    <h3>Tidak ada notifikasi</h3>
                    <p>Semua pemberitahuan aktivitas Anda akan muncul di sini.</p>
                </div>

            @endforelse

        </div>

    </div>

</div>

<style>

    /* =========================
        CONTAINER
    ========================== */

    .notif-page-container{

        width:100%;

        display:flex;
        justify-content:center;

    }

    .notif-page-wrapper{

        width:100%;
        max-width:900px;

        display:flex;
        flex-direction:column;

        gap:24px;

        padding-bottom:40px;

    }

    /* =========================
        HEADER
    ========================== */

    .notif-page-header{

        display:flex;
        justify-content:space-between;
        align-items:center;
        flex-wrap:wrap;

        gap:16px;

        padding:20px 28px;

        border-radius:24px;

        background:rgba(255,255,255,0.18);
        backdrop-filter:blur(20px);
        -webkit-backdrop-filter:blur(20px);

        border:1px solid rgba(255,255,255,0.25);

        box-shadow:0 8px 30px rgba(15,23,42,0.06);

    }

    .notif-page-title-section h1{

        font-size:22px;
        font-weight:700;
        color:#111827;

        margin:0 0 4px;

    }

    .notif-page-title-section p{

        font-size:13px;
        color:#6b7280;
        margin:0;

    }

    .notif-page-mark-all-btn{

        border:none;

        padding:12px 22px;

        border-radius:14px;

        background:linear-gradient(135deg, #ffb066, #ff7a00);

        color:white;
        font-weight:600;
        font-size:13px;

        cursor:pointer;

        box-shadow:0 6px 18px rgba(255,122,0,0.2);

        transition:0.3s;

    }

    .notif-page-mark-all-btn:hover{
        transform:translateY(-2px);
        box-shadow:0 8px 24px rgba(255,122,0,0.3);
    }

    /* =========================
        STATS
    ========================== */

    .notif-page-stats{

        display:grid;
        grid-template-columns:repeat(3, 1fr);
        gap:16px;

    }

    .notif-stat-card{

        display:flex;
        align-items:center;
        gap:14px;

        padding:18px 20px;

        border-radius:20px;

        background:rgba(255,255,255,0.75);
        backdrop-filter:blur(16px);
        -webkit-backdrop-filter:blur(16px);

        border:1px solid rgba(255,255,255,0.2);

        box-shadow:0 4px 16px rgba(0,0,0,0.04);

    }

    .notif-stat-icon{

        width:44px;
        height:44px;

        border-radius:14px;

        display:flex;
        justify-content:center;
        align-items:center;

        font-size:20px;

    }

    .notif-stat-info{
        display:flex;
        flex-direction:column;
    }

    .notif-stat-value{

        font-size:22px;
        font-weight:700;
        color:#111827;

    }

    .notif-stat-label{

        font-size:12px;
        color:#6b7280;

    }

    /* =========================
        NOTIFICATION LIST
    ========================== */

    .notif-page-list{

        display:flex;
        flex-direction:column;

        padding:0;
        overflow:hidden;

    }

    /* Item */
    .notif-page-item{

        display:flex;
        align-items:flex-start;
        gap:16px;

        padding:18px 24px;

        border-bottom:1px solid #f1f5f9;

        text-decoration:none;
        color:inherit;

        transition:0.25s ease;

        position:relative;

    }

    .notif-page-item:last-child{
        border-bottom:none;
    }

    .notif-page-item:hover{
        background:rgba(255,250,235,0.6);
        transform:translateX(4px);
    }

    .notif-page-item.unread{
        background:rgba(255,251,245,0.8);
        border-left:4px solid #f59e0b;
    }

    /* Icon */
    .notif-page-item-icon{

        width:48px;
        height:48px;
        min-width:48px;

        border-radius:16px;

        display:flex;
        justify-content:center;
        align-items:center;

        font-size:20px;

    }

    .notif-page-item-icon.chat{ background:#dbeafe; }
    .notif-page-item-icon.order{ background:#d1fae5; }
    .notif-page-item-icon.category{ background:#fef3c7; }
    .notif-page-item-icon.service{ background:#ede9fe; }
    .notif-page-item-icon.status{ background:#fee2e2; }
    .notif-page-item-icon.default{ background:#f1f5f9; }

    /* Content */
    .notif-page-item-content{
        flex:1;
        min-width:0;
    }

    .notif-page-item-title{

        font-size:14px;
        font-weight:600;
        color:#111827;
        margin:0 0 4px;

    }

    .notif-page-item-message{

        font-size:13px;
        color:#6b7280;
        margin:0 0 6px;
        line-height:1.5;

    }

    .notif-page-item-time{

        font-size:11px;
        color:#9ca3af;
        font-weight:500;

    }

    /* Unread dot */
    .notif-page-unread-dot{

        width:10px;
        height:10px;
        min-width:10px;

        border-radius:50%;

        background:linear-gradient(135deg, #f59e0b, #ff7a00);

        margin-top:6px;

        box-shadow:0 0 8px rgba(245,158,11,0.4);

        animation: dotPulse 2s ease-in-out infinite;

    }

    @keyframes dotPulse{
        0%, 100% { transform:scale(1); opacity:1; }
        50% { transform:scale(1.3); opacity:0.7; }
    }

    /* Empty */
    .notif-page-empty{

        text-align:center;
        padding:60px 20px;

    }

    .notif-page-empty h3{

        margin:16px 0 6px;
        font-weight:700;
        color:#374151;
        font-size:18px;

    }

    .notif-page-empty p{

        margin:0;
        color:#6b7280;
        font-size:14px;

    }

    /* =========================
        RESPONSIVE
    ========================== */

    @media(max-width:768px){

        .notif-page-stats{
            grid-template-columns:1fr;
        }

        .notif-page-item{
            padding:14px 16px;
        }

    }

</style>

@endsection
