<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\ProviderService;

class LayananController extends Controller
{
    public function index(Request $request)
    {
        $categoryId = $request->category;

        $providers = ProviderService::with([
            'provider.providerReviews',
            'category',
            'subServices'
        ])
        ->where('status', 'approved')
        ->when($categoryId, function ($query) use ($categoryId) {

            $query->where(
                'category_id',
                $categoryId
            );

        })
        ->get();

        $categories = Category::where('is_active', true)->get();

        return view(
            'user.layanan.layanan',
            compact('providers', 'categories')
        );
    }
    
}
