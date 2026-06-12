<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryRequest;
use App\Models\ProviderService;
use App\Models\SubService;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class ProviderServiceController extends Controller
{
    public function takeService(Request $request)
    {
        ProviderService::create([

            'provider_id' => auth()->id(),

            'category_id' => $request->category_id,

            'status' => 'pending'
        ]);
    }

    public function storeSubService(Request $request)
        {
            $request->validate([

                'provider_service_id' => 'required',

                'name' => 'required',

                'price_min' => 'required|numeric',

                'price_max' => 'required|numeric'
            ]);

            $providerService = ProviderService::findOrFail(
                $request->provider_service_id
            );

            if($providerService->status != 'approved')
            {
                return back()->with(
                    'error',
                    'Layanan belum disetujui admin'
                );
            }

            SubService::create([

                'provider_service_id' =>
                    $request->provider_service_id,

                'name' => $request->name,

                'price_min' => $request->price_min,

                'price_max' => $request->price_max,

                'description' => $request->description
            ]);

            return back()->with(
                'success',
                'Sub layanan berhasil ditambahkan'
            );
        }


    public function submitCategory(Request $request)
    {
    

        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'certificate_file' => 'nullable|file|mimes:pdf,jpg,jpeg,png'
        ]);

        $file = null;

        if ($request->hasFile('certificate_file')) {

            $file = $request
                ->file('certificate_file')
                ->store(
                    'certificates',
                    'public'
                );
        }

        CategoryRequest::create([

            'provider_id' => auth()->id(),

            'category_id' => $request->category_id,

            'certificate_file' => $file ?? '',

            'status' => 'pending'
        
        ]);

        $providerService = ProviderService::create([

                'provider_id' => auth()->id(),

                'category_id' => $request->category_id,

                'status' => 'pending'
            ]);

            if($request->sub_name){

                foreach($request->sub_name as $index => $name){

                    if(!empty($name)){

                        SubService::create([

                            'provider_service_id' =>
                                $providerService->id,

                            'name' => $name,

                            'price_min' =>
                                $request->sub_price_min[$index] ?? 0,

                            'price_max' =>
                                $request->sub_price_max[$index] ?? 0,

                            'description' => null
                        ]);
                    }
                }
            }

            return back()->with(
                'success',
                'Pengajuan layanan berhasil dikirim'
            );

        // $providerService = ProviderService::create([
        //     'provider_id' => auth()->id(),
        //     'service_id' => $request->category_id,
        //     'status' => 'approved'
        // ]);

        // if($request->sub_name){

        //     foreach($request->sub_name as $index => $name){

        //         if(!empty($name)){

        //             SubService::create([

        //                 'provider_service_id' => $providerService->id,

        //                 'name' => $name,

        //                 'price_min' =>
        //                     $request->sub_price_min[$index] ?? 0,

        //                 'price_max' =>
        //                     $request->sub_price_max[$index] ?? 0,

        //                 'description' => null

        //             ]);
        //         }
        //     }
        // }

        return back()->with(
            'success',
            'Pengajuan layanan berhasil dikirim'
        );
    }

   public function layanan()
    {
        $services = ProviderService::with([
            'category',
            'subServices'
        ])
        ->where('provider_id', auth()->id())
        ->where('status', 'approved')
        ->get();

        $categories = Category::all();

       $requests = CategoryRequest::with('category')
            ->where('provider_id', auth()->id())
            ->whereIn('status', [
                'pending',
                'rejected'
            ])
            ->latest()
            ->get();

        $activeCount = $services->count();

        $requestCount = $requests->count();
        return view(
            'provider.pages.layanan.layanan',
            compact(
                'services',
                'categories',
                'requests',
                'activeCount',
                'requestCount'
            )
        );
    }

    public function updateSubService(Request $request, $id)
{
    $request->validate([

        'name' => 'required',

        'price_min' => 'required|numeric',

        'price_max' => 'required|numeric'

    ]);

    $subService = SubService::findOrFail($id);

    $subService->update([

        'name' => $request->name,

        'price_min' => $request->price_min,

        'price_max' => $request->price_max,

        'description' => $request->description

    ]);

    return back()->with(
        'success',
        'Sub layanan berhasil diperbarui'
    );
}

    public function deleteSubService($id)
    {
        $subService = SubService::findOrFail($id);

        $subService->delete();

        return back()->with(
            'success',
            'Sub layanan berhasil dihapus'
        );
    }

    public function getSubServices($id)
    {
        $service = ProviderService::with(
            'subServices'
        )->findOrFail($id);

        return response()->json(
            $service->subServices
        );
    }
}
