<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\CategoryRequest;
use App\Models\ProviderService;

class CategoryController extends Controller
{
    public function index()
{
    $categories = Category::with(['providers.providerServices.subServices'])
        ->withCount('providers')
        ->latest()
        ->get();

    $totalCategories = Category::count();

    $activeCategories = Category::where(
        'is_active',
        true
    )->count();

    $totalProviders = User::where(
        'role',
        'provider'
    )->count();

    $popularCategory = Category::withCount('providers')
        ->orderByDesc('providers_count')
        ->first();

    $pendingRequests = CategoryRequest::with([
        'provider',
        'category'
    ])
    ->where('status', 'pending')
    ->latest()
    ->get();

    $pendingCategories = $pendingRequests->count();

    return view(
        'admin.Pages.Kategori_Layanan.categories',
        compact(
            'categories',
            'totalCategories',
            'activeCategories',
            'totalProviders',
            'popularCategory',
            'pendingCategories',
            'pendingRequests'
        )
    );
}

   public function providers(Category $category)
    {
        $providers = $category
            ->providers()
            ->with([
                'providerServices.subServices'
            ])
            ->get();

        return view(
            'admin.Pages.Kategori_Layanan.providers',
            compact(
                'category',
                'providers'
            )
        );
    }

    public function store(Request $request)
    {
        $request->validate([
        'name' => 'required|unique:categories,name',
        'icon' => 'nullable|image|mimes:jpg,jpeg,png,webp',
    ]);

        $icon = null;

        if ($request->hasFile('icon')) {
            $icon = $request
                ->file('icon')
                ->store(
                    'categories',
                    'public'
                );
        }

        Category::create([
            'name' => $request->name,
            'icon' => $icon,
            'is_active' => true
        ]);

        return back()->with(
            'success',
            'Kategori berhasil ditambahkan'
        );
    }

    public function removeProvider(
    Category $category,
    User $provider
    )
    {
        $category->providers()->detach(
            $provider->id
        );

        return back()->with(
            'success',
            'Provider berhasil dihapus dari kategori'
        );
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view(
            'admin.Pages.Kategori_Layanan.components.edit',
            compact('category')
        );
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:categories,name,' . $id,
            'icon' => 'nullable|image|mimes:jpg,jpeg,png,webp',
        ]);

        $category = Category::findOrFail($id);

        $category->name = $request->name;

        if ($request->hasFile('icon')) {

            if (
                $category->icon &&
                Storage::disk('public')->exists($category->icon)
            ) {
                Storage::disk('public')
                    ->delete($category->icon);
            }

            $path = $request
                ->file('icon')
                ->store('categories', 'public');

            $category->icon = $path;
        }

        $category->save();

        return redirect()
            ->route('categories.index')
            ->with('success','Kategori berhasil diperbarui');
    }

    public function approveRequest($id)
{
    $requestData =
        CategoryRequest::findOrFail($id);

    $requestData->update([
        'status' => 'approved'
    ]);

    ProviderService::where(
        'provider_id',
        $requestData->provider_id
    )
    ->where(
        'category_id',
        $requestData->category_id
    )
    ->update([
        'status' => 'approved'
    ]);

    $requestData
        ->category
        ->providers()
        ->syncWithoutDetaching([
            $requestData->provider_id
        ]);

    return back()->with(
        'success',
        'Pengajuan berhasil disetujui'
    );
}

    public function rejectRequest(
        Request $request,
        $id
    )
    {
        $requestData =
            CategoryRequest::findOrFail($id);

        $requestData->update([
            'status' => 'rejected',
            'rejection_reason' =>
                $request->reason
        ]);

        return back()->with(
            'success',
            'Pengajuan berhasil ditolak'
        );
    }
}