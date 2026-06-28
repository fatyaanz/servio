<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\CategoryRequest;
use App\Models\ProviderService;

class CategoryController extends Controller
{
    public function index()
{
    $categories = Category::with(['providers.providerServices.subServices', 'providers'])
        ->latest()
        ->paginate(10);

    // Calculate Orders per Category using Manual Mapping
    $bookingSubServices = \App\Models\BookingSubService::all();
    $subServiceIds = $bookingSubServices->pluck('sub_service_id')->unique();
    $subServices = \App\Models\SubService::with('providerService')->whereIn('_id', $subServiceIds)->get();
    
    // Map sub_service_id -> category_id
    $subServiceToCategory = [];
    foreach ($subServices as $sub) {
        if ($sub->providerService && $sub->providerService->category_id) {
            $subServiceToCategory[$sub->id] = $sub->providerService->category_id;
        }
    }

    $categoryOrderCounts = [];
    $bookingCategories = [];
    
    // Group categories per booking
    foreach ($bookingSubServices as $bss) {
        $catId = $subServiceToCategory[$bss->sub_service_id] ?? null;
        if ($catId) {
            $bookingCategories[$bss->booking_id][$catId] = true;
        }
    }
    
    // Sum counts (unique categories per booking)
    foreach ($bookingCategories as $bookingId => $cats) {
        foreach (array_keys($cats) as $catId) {
            if (!isset($categoryOrderCounts[$catId])) {
                $categoryOrderCounts[$catId] = 0;
            }
            $categoryOrderCounts[$catId]++;
        }
    }

    foreach ($categories as $category) {
        $category->providers_count = count($category->providers ?? []);
        $category->orders_count = $categoryOrderCounts[$category->id] ?? 0;
    }

    $totalCategories = Category::count();

    $activeCategories = Category::where(
        'is_active',
        true
    )->count();

    $totalProviders = User::where(
        'role',
        'provider'
    )->count();

    $popularCategory = $categories->sortByDesc('providers_count')->first();

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
        $providerServices = \App\Models\ProviderService::with([
                'provider',
                'subServices'
            ])
            ->where('category_id', $category->id)
            ->where('status', 'approved')
            ->get();

        return view(
            'admin.Pages.Kategori_Layanan.providers',
            compact(
                'category',
                'providerServices'
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

    // Notify provider
    Notification::create([
        'user_id' => $requestData->provider_id,
        'title' => 'Pengajuan Kategori Disetujui',
        'message' => 'Pengajuan kategori "' . $requestData->category->name . '" Anda telah disetujui oleh admin.',
        'type' => 'category_approved',
        'is_read' => false
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

        // Notify provider
        Notification::create([
            'user_id' => $requestData->provider_id,
            'title' => 'Pengajuan Kategori Ditolak',
            'message' => 'Pengajuan kategori "' . $requestData->category->name . '" Anda ditolak.' . ($request->reason ? ' Alasan: ' . $request->reason : ''),
            'type' => 'category_rejected',
            'is_read' => false
        ]);

        return back()->with(
            'success',
            'Pengajuan berhasil ditolak'
        );
    }
}