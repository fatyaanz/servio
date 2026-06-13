@extends('provider.layouts.app')

@section('content')

<div class="ulasan-container">
    <div class="ulasan-wrapper">
        <div class="ulasan-header">
            <span class="ulasan-badge">⭐ Ulasan Toko</span>
            <h1>Semua Ulasan & Rating</h1>
            <p>Berikut adalah ulasan dan rating yang diberikan oleh pelanggan Anda untuk seluruh pesanan selesai.</p>
        </div>

        <div class="reviews-list">
            @forelse($reviews as $review)
                <div class="review-card">
                    <div class="review-top">
                        <div class="review-user">
                            <img
                                src="{{ $review->customer->profile_photo
                                    ? asset('storage/' . $review->customer->profile_photo)
                                    : 'https://ui-avatars.com/api/?name=' . urlencode($review->customer->name)
                                }}"
                                class="review-profile"
                            >
                            <div>
                                <h3>{{ $review->customer->name }}</h3>
                                <p>ID Order: <span style="color: #F08A28; font-weight: 600;">#{{ $review->booking->formatted_id }}</span></p>
                            </div>
                        </div>
                        <div class="review-rating">
                            ⭐ {{ number_format($review->rating, 1) }}
                        </div>
                    </div>

                    <div class="review-service">
                        <span>Layanan Dipilih</span>
                        <p>
                            @foreach($review->booking->subServices as $subService)
                                {{ $subService->name }}{{ !$loop->last ? ', ' : '' }}
                            @endforeach
                        </p>
                    </div>

                    <div class="review-comment">
                        “{{ $review->comment }}”
                    </div>
                    
                    <div class="review-date" style="margin-top: 12px; font-size: 11px; color: #9ca3af; text-align: right;">
                        📅 {{ $review->created_at->format('d M Y - H:i') }}
                    </div>
                </div>
            @empty
                <div class="review-card" style="text-align: center; color: #888; padding: 40px;">
                    Belum ada ulasan yang diberikan oleh pelanggan.
                </div>
            @endforelse
        </div>
    </div>
</div>

<style>
    .ulasan-container {
        width: 100%;
        display: flex;
        justify-content: center;
    }

    .ulasan-wrapper {
        width: 100%;
        max-width: 1200px;
        display: flex;
        flex-direction: column;
        gap: 24px;
        padding-bottom: 40px;
    }

    .ulasan-header {
        background: linear-gradient(135deg, #FFF8F1, #FFFFFF);
        border: 1px solid rgba(240,138,40,.08);
        box-shadow: 0 10px 25px rgba(0,0,0,.05);
        padding: 25px;
        border-radius: 28px;
    }

    .ulasan-badge {
        display: inline-flex;
        padding: 8px 14px;
        border-radius: 999px;
        background: #FFF2E4;
        color: #F08A28;
        border: 1px solid #FFE0BE;
        font-size: 12px;
        font-weight: 700;
        margin-bottom: 12px;
    }

    .ulasan-header h1 {
        margin: 0 0 8px;
        font-size: 30px;
        font-weight: 800;
        color: #222;
    }

    .ulasan-header p {
        margin: 0;
        color: #777;
        font-size: 14px;
        line-height: 1.6;
    }

    .reviews-list {
        display: flex;
        flex-direction: column;
        gap: 18px;
    }

    .review-card {
        background: white;
        border: 1px solid #eef0f4;
        border-radius: 24px;
        padding: 24px;
        box-shadow: 0 6px 18px rgba(15,23,42,0.03);
        transition: 0.3s ease;
    }

    .review-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 24px rgba(15,23,42,0.06);
    }

    .review-top {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 18px;
    }

    .review-user {
        display: flex;
        align-items: center;
        gap: 14px;
    }

    .review-profile {
        width: 56px;
        height: 56px;
        border-radius: 18px;
        object-fit: cover;
    }

    .review-user h3 {
        margin: 0 0 4px;
        font-size: 16px;
        color: #111827;
    }

    .review-user p {
        margin: 0;
        font-size: 12px;
        color: #9ca3af;
    }

    .review-rating {
        background: #fff7ed;
        color: #ff7a00;
        padding: 10px 16px;
        border-radius: 14px;
        font-size: 14px;
        font-weight: 700;
    }

    .review-service {
        margin-bottom: 16px;
    }

    .review-service span {
        font-size: 12px;
        color: #9ca3af;
        display: block;
        margin-bottom: 4px;
    }

    .review-service p {
        margin: 0;
        font-size: 14px;
        font-weight: 600;
        color: #111827;
    }

    .review-comment {
        font-size: 14px;
        line-height: 1.7;
        color: #4b5563;
        background: #f9fafb;
        padding: 16px;
        border-radius: 16px;
    }
</style>

@endsection
