@extends('admin.Layouts.app')

@section('content')

<div class="providers-page">

    <div class="page-header">

        <div>

            <h1>
                Penyedia Layanan
            </h1>

            <p>
                Kategori :
                <strong>
                    {{ $category->name }}
                </strong>
            </p>

        </div>

        <a
            href="{{ route('categories.index') }}"
            class="back-btn"
        >
            ← Kembali
        </a>

    </div>

    <div class="provider-wrapper">

        @forelse($providers as $provider)

            <div class="provider-card">

                <div class="provider-info">

                    <div class="avatar">

                        {{ strtoupper(substr($provider->name,0,1)) }}

                    </div>

                    <div>

                        <h3>
                            {{ $provider->name }}
                        </h3>

                        <p>
                            {{ $provider->email }}
                        </p>

                    </div>

                </div>

                <div class="provider-status">

                    <span class="badge">
                        Provider Aktif
                    </span>

                </div>

                    <div class="sub-service-section">

                        <h4>
                            Daftar Sub Layanan
                        </h4>

                        <table class="sub-table">

                            <thead>

                                <tr>

                                    <th>
                                        Sub Layanan
                                    </th>

                                    <th>
                                        Harga Min
                                    </th>

                                    <th>
                                        Harga Max
                                    </th>

                                </tr>

                            </thead>

                            <tbody>

                            @php
                                $providerService =
                                    $provider->providerServices
                                    ->where(
                                        'category_id',
                                        $category->id
                                    )
                                    ->first();
                            @endphp

                            @if(
                                $providerService &&
                                $providerService->subServices->count()
                            )

                                @foreach(
                                    $providerService->subServices
                                    as $sub
                                )

                                <tr>

                                    <td>
                                        {{ $sub->name }}
                                    </td>

                                    <td>
                                        Rp{{ number_format($sub->price_min,0,',','.') }}
                                    </td>

                                    <td>
                                        Rp{{ number_format($sub->price_max,0,',','.') }}
                                    </td>

                                </tr>

                                @endforeach

                            @else

                                <tr>

                                    <td colspan="3">

                                        Belum ada sub layanan

                                    </td>

                                </tr>

                            @endif

                            </tbody>

                        </table>

                    </div>

            </div>

        @empty

            <div class="empty-state">

                Belum ada provider pada kategori ini.

            </div>

        @endforelse

    </div>

</div>

<style>

.providers-page{

    min-height:100vh;

}
.sub-service-section{

    margin-top:24px;

    width:100%;

}

.sub-service-section h4{

    margin-bottom:12px;

    font-size:15px;

    color:#111827;

}

.sub-table{

    width:100%;

    border-collapse:collapse;

    background:#f8fafc;

    border-radius:12px;

    overflow:hidden;

}

.sub-table th{

    background:#f1f5f9;

    padding:12px;

    text-align:left;

}

.sub-table td{

    padding:12px;

    border-top:1px solid #e5e7eb;

}

.page-header{

    display:flex;
    justify-content:space-between;
    align-items:center;

    margin-bottom:30px;

}

.page-header h1{

    font-size:40px;

    font-weight:800;

    color:#111827;

}

.page-header p{

    color:#6b7280;

    margin-top:8px;

}

.back-btn{

    text-decoration:none;

    background:white;

    padding:12px 18px;

    border-radius:14px;

    color:#111827;

    border:1px solid #e5e7eb;

}

.provider-wrapper{

    display:flex;

    flex-direction:column;

    gap:18px;

}

.provider-card{

    background:white;

    border-radius:24px;

    padding:24px;

    display:flex;

    justify-content:space-between;
    align-items:center;

    border:1px solid #eef2f7;

}

.provider-info{

    display:flex;

    align-items:center;

    gap:16px;

}

.avatar{

    width:60px;
    height:60px;

    border-radius:50%;

    background:#fff7ed;

    color:#ff7a00;

    font-weight:700;

    display:flex;

    align-items:center;
    justify-content:center;
}

.provider-info h3{

    margin-bottom:4px;

    color:#111827;

}

.provider-info p{

    color:#6b7280;

}

.badge{

    background:#ecfdf3;

    color:#16a34a;

    padding:8px 14px;

    border-radius:999px;

    font-size:12px;

    font-weight:700;

}

.empty-state{

    background:white;

    padding:50px;

    text-align:center;

    border-radius:24px;

    color:#94a3b8;

}

</style>

@endsection