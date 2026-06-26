<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Voucher;
use App\Models\Favorite;
use App\Models\Booking;
use App\Models\Review;
use App\Models\SubService;
use App\Models\Produk;
use App\Models\User;
use App\Models\UserAddress;

class ProfileController extends Controller
{
    public function index()
    {
        return view('admin.Profile.profile');
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name'             => 'required|string|max:255',
            'phone'            => 'nullable|string|max:20',
            'profile_photo'    => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'current_password' => 'nullable|string',
            'password'         => 'nullable|string|min:8|confirmed',
        ]);

        // Handle photo upload
        if ($request->hasFile('profile_photo')) {
            $path = $request->file('profile_photo')->store('profile', 'public');
            $user->profile_photo = $path;
        }

        // Update basic info
        $user->name  = $request->name;
        $user->phone = $request->phone;

        // Change password only if provided
        if ($request->filled('password')) {
            if (!$request->filled('current_password') || !\Hash::check($request->current_password, $user->password)) {
                return back()
                    ->withErrors(['current_password' => 'Password lama tidak sesuai.'])
                    ->withInput();
            }
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return back()->with('success', 'Profil admin berhasil diperbarui.');
    }

    public function updateProvider(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'city' => 'nullable',
            'address' => 'nullable',
            'description' => 'nullable',
            'warranty' => 'nullable',
            'experience' => 'nullable|integer',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('profile_photo')) {
            $path = $request->file('profile_photo')
                ->store('profile', 'public');
            $user->profile_photo = $path;
        }

        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->city = $request->city;
        $user->address = $request->address;
        $user->description = $request->description;
        $user->warranty = $request->warranty;
        $user->experience = $request->experience;
        $user->latitude = $request->latitude;
        $user->longitude = $request->longitude;

        $user->save();

        return back()->with(
            'success',
            'Profil berhasil diperbarui'
        );
    }

    public function updateCustomer(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'nullable',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('profile_photo')) {
            $path = $request->file('profile_photo')
                ->store('profile', 'public');
            $user->profile_photo = $path;
        }

        $user->name = $request->name;
        $user->phone = $request->phone;
        
        if ($request->has('address')) {
            $user->address = $request->address;
        }
        if ($request->has('latitude')) {
            $user->latitude = $request->latitude;
        }
        if ($request->has('longitude')) {
            $user->longitude = $request->longitude;
        }

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return back()->with(
            'success',
            'Profil berhasil diperbarui'
        );
    }

    public function topup(Request $request)
    {
        return back()->with(
            'error',
            'Fitur Servio Pay tidak lagi tersedia.'
        );
    }

    public function deleteAccount()
    {
        $user = Auth::user();
        Auth::logout();
        $user->delete();
        return redirect()->route('landingpage')->with('success', 'Akun Anda berhasil dihapus.');
    }

    public function showCustomerProfile()
    {
        $user = Auth::user();
        $userId = $user->id;

        // Auto-seed user points if default/empty
        if ($user->points == 180 && !$user->gopay_linked && !$user->ovo_linked) {
            $user->points = 180;
            $user->save();
        }

        // Auto-seed Vouchers if user has 0 vouchers
        if ($user->vouchers()->count() == 0) {
            $v1 = Voucher::firstOrCreate(
                ['code' => 'SERVIOBARU'],
                ['title' => 'Potongan Perdana', 'discount_amount' => 15000, 'description' => 'Diskon Rp15.000 untuk transaksi pertama.']
            );
            $v2 = Voucher::firstOrCreate(
                ['code' => 'PROMOAC'],
                ['title' => 'Spesial AC Servis', 'discount_amount' => 20000, 'description' => 'Diskon Rp20.000 khusus servis AC.']
            );
            
            $user->vouchers()->syncWithoutDetaching([$v1->id, $v2->id]);
        }

        // Auto-seed Favorites if user has 0 favorites
        if ($user->favorites()->count() == 0) {
            $provider = User::where('role', 'provider')->first();
            $service = SubService::first();
            $produk = Produk::first();

            if ($provider) {
                Favorite::firstOrCreate([
                    'user_id' => $userId,
                    'provider_id' => $provider->id
                ]);
            }
            if ($service) {
                Favorite::firstOrCreate([
                    'user_id' => $userId,
                    'sub_service_id' => $service->id
                ]);
            }
            if ($produk) {
                Favorite::firstOrCreate([
                    'user_id' => $userId,
                    'produk_id' => $produk->id
                ]);
            }
        }

        // Fetch actual profile info, stats, recent activities, reviews, favorites
        $totalBookings = Booking::where('customer_id', $userId)->count();
        $completedBookingsCount = Booking::where('customer_id', $userId)->where('status', 'completed')->count();
        $activeBookingsCount = Booking::where('customer_id', $userId)
            ->whereNotIn('status', ['completed', 'cancelled', 'rejected'])->count();
        $cancelledBookingsCount = Booking::where('customer_id', $userId)
            ->whereIn('status', ['cancelled', 'rejected'])->count();
        $reviewsCount = Review::where('customer_id', $userId)->count();

        $recentBookings = Booking::with(['subServices.providerService.category', 'provider'])
            ->where('customer_id', $userId)
            ->latest()
            ->take(3)
            ->get();

        $myReviews = Review::with(['provider'])
            ->where('customer_id', $userId)
            ->latest()
            ->take(3)
            ->get();

        // Get favorites
        $favoriteProviders = Favorite::where('user_id', $userId)
            ->whereNotNull('provider_id')
            ->with('provider')
            ->get();
            
        $favoriteServices = Favorite::where('user_id', $userId)
            ->whereNotNull('sub_service_id')
            ->with('subService.providerService.category')
            ->get();
            
        $favoriteProduks = Favorite::where('user_id', $userId)
            ->whereNotNull('produk_id')
            ->with('produk')
            ->get();

        // Vouchers
        $myVouchers = $user->vouchers()->wherePivot('is_used', false)->get();

        $addresses = $user->addresses()->orderBy('is_primary', 'desc')->get();

        return view('user.profile.profile', compact(
            'totalBookings',
            'completedBookingsCount',
            'activeBookingsCount',
            'cancelledBookingsCount',
            'reviewsCount',
            'recentBookings',
            'myReviews',
            'favoriteProviders',
            'favoriteServices',
            'favoriteProduks',
            'myVouchers',
            'addresses'
        ));
    }

    public function updatePreferences(Request $request)
    {
        $user = Auth::user();
        
        if ($request->has('notif_booking')) {
            $user->notif_booking = $request->notif_booking;
        }
        if ($request->has('notif_promo')) {
            $user->notif_promo = $request->notif_promo;
        }
        if ($request->has('notif_chat')) {
            $user->notif_chat = $request->notif_chat;
        }
        if ($request->has('language')) {
            $user->language = $request->language;
        }
        if ($request->has('dark_mode')) {
            $user->dark_mode = $request->dark_mode;
        }
        
        $user->save();
        
        return response()->json(['success' => true]);
    }

    public function linkWallet(Request $request)
    {
        $user = Auth::user();
        $wallet = $request->wallet;
        
        if ($wallet === 'gopay') {
            $user->gopay_linked = !$user->gopay_linked;
            $linked = $user->gopay_linked;
        } elseif ($wallet === 'ovo') {
            $user->ovo_linked = !$user->ovo_linked;
            $linked = $user->ovo_linked;
        } else {
            return response()->json(['success' => false, 'message' => 'Invalid wallet type']);
        }
        
        $user->save();
        
        return response()->json([
            'success' => true,
            'linked' => $linked
        ]);
    }

    public function toggleFavorite(Request $request)
    {
        $user = Auth::user();
        $providerId = $request->provider_id;
        $subServiceId = $request->sub_service_id;
        $produkId = $request->produk_id;
        
        $query = Favorite::where('user_id', $user->id);
        if ($providerId) {
            $query->where('provider_id', $providerId);
        } elseif ($subServiceId) {
            $query->where('sub_service_id', $subServiceId);
        } elseif ($produkId) {
            $query->where('produk_id', $produkId);
        }
        
        $fav = $query->first();
        if ($fav) {
            $fav->delete();
            $status = 'removed';
        } else {
            Favorite::create([
                'user_id' => $user->id,
                'provider_id' => $providerId,
                'sub_service_id' => $subServiceId,
                'produk_id' => $produkId
            ]);
            $status = 'added';
        }
        
        return response()->json(['success' => true, 'status' => $status]);
    }

    public function storeAddress(Request $request)
    {
        $request->validate([
            'label' => 'required|string|max:255',
            'receiver_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address_text' => 'required|string',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
        ]);

        $user = Auth::user();
        
        $isFirst = $user->addresses()->count() === 0;
        $isPrimary = $request->has('is_primary') ? $request->boolean('is_primary') : $isFirst;

        if ($isPrimary) {
            $user->addresses()->update(['is_primary' => false]);
        }

        $address = $user->addresses()->create([
            'label' => $request->label,
            'receiver_name' => $request->receiver_name,
            'phone' => $request->phone,
            'address_text' => $request->address_text,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'is_primary' => $isPrimary,
        ]);

        if ($isPrimary) {
            $user->update([
                'address' => $address->address_text,
                'latitude' => $address->latitude,
                'longitude' => $address->longitude,
            ]);
        }

        return back()->with('success', 'Alamat berhasil ditambahkan.');
    }

    public function updateAddress(Request $request, UserAddress $address)
    {
        if ($address->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'label' => 'required|string|max:255',
            'receiver_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address_text' => 'required|string',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
        ]);

        $user = Auth::user();
        
        $isPrimary = $request->has('is_primary') ? $request->boolean('is_primary') : $address->is_primary;
        if ($isPrimary && !$address->is_primary) {
            $user->addresses()->where('id', '!=', $address->id)->update(['is_primary' => false]);
        } elseif (!$isPrimary && $address->is_primary) {
            if ($user->addresses()->count() <= 1) {
                $isPrimary = true;
            }
        }

        $address->update([
            'label' => $request->label,
            'receiver_name' => $request->receiver_name,
            'phone' => $request->phone,
            'address_text' => $request->address_text,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'is_primary' => $isPrimary,
        ]);

        if ($isPrimary) {
            $user->update([
                'address' => $address->address_text,
                'latitude' => $address->latitude,
                'longitude' => $address->longitude,
            ]);
        }

        return back()->with('success', 'Alamat berhasil diperbarui.');
    }

    public function deleteAddress(UserAddress $address)
    {
        if ($address->user_id !== Auth::id()) {
            abort(403);
        }

        $user = Auth::user();
        $wasPrimary = $address->is_primary;

        $address->delete();

        if ($wasPrimary) {
            $nextAddress = $user->addresses()->first();
            if ($nextAddress) {
                $nextAddress->update(['is_primary' => true]);
                $user->update([
                    'address' => $nextAddress->address_text,
                    'latitude' => $nextAddress->latitude,
                    'longitude' => $nextAddress->longitude,
                ]);
            } else {
                $user->update([
                    'address' => null,
                    'latitude' => null,
                    'longitude' => null,
                ]);
            }
        }

        return back()->with('success', 'Alamat berhasil dihapus.');
    }

    public function setPrimaryAddress(UserAddress $address)
    {
        if ($address->user_id !== Auth::id()) {
            abort(403);
        }

        $user = Auth::user();

        $user->addresses()->update(['is_primary' => false]);

        $address->update(['is_primary' => true]);

        $user->update([
            'address' => $address->address_text,
            'latitude' => $address->latitude,
            'longitude' => $address->longitude,
        ]);

        return back()->with('success', 'Alamat utama berhasil diubah.');
    }
}