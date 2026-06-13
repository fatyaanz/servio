<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubService;
use App\Models\User;
use App\Models\Booking;
use App\Models\BookingSubService;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
   public function index(Request $request)
    {
        $subServices = SubService::whereIn(
            'id',
            $request->sub_services ?? []
        )->get();

        $provider = User::with(
            'providerServices.category'
        )->findOrFail(
            $request->provider_id
        );

        return view(
            'user.booking.booking-normal',
            compact(
                'subServices',
                'provider'
            )
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'address' => 'required',
            'booking_date' => 'required',
            'booking_time' => 'required',
            'provider_id' => 'required',
            'sub_services' => 'required|array',
            'damage_description' => 'required|string|min:5',
            'damage_photo' => 'nullable|array',
            'damage_photo.*' => 'image|max:2048',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
        ]);

        $damagePhotos = [];
        if ($request->hasFile('damage_photo')) {
            $files = $request->file('damage_photo');
            if (is_array($files)) {
                foreach ($files as $file) {
                    $damagePhotos[] = $file->store('damage_photos', 'public');
                }
            } else {
                $damagePhotos[] = $files->store('damage_photos', 'public');
            }
        }

        $booking = Booking::create([
            'customer_id' => Auth::id(),
            'provider_id' => $request->provider_id,
            'address' => $request->address,
            'location_note' => $request->location_note,
            'booking_date' => $request->booking_date,
            'booking_time' => $request->booking_time,
            'notes' => $request->notes,
            'status' => 'pending',
            'damage_description' => $request->damage_description,
            'damage_photo' => $damagePhotos,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);

        foreach ($request->sub_services as $subServiceId) {

            BookingSubService::create([

                'booking_id' => $booking->id,

                'sub_service_id' => $subServiceId

            ]);
        }

        // Notify Provider
        Notification::create([
            'user_id' => $booking->provider_id,
            'title' => 'Pesanan Baru Masuk',
            'message' => 'Anda mendapatkan pesanan baru dari ' . Auth::user()->name . '.',
            'type' => 'order_created',
            'booking_id' => $booking->id,
            'is_read' => false
        ]);

        // Notify Customer
        Notification::create([
            'user_id' => Auth::id(),
            'title' => 'Booking Berhasil Dibuat',
            'message' => 'Pesanan ' . $booking->formatted_id . ' Anda berhasil dibuat dan sedang menunggu respon provider.',
            'type' => 'order_created',
            'booking_id' => $booking->id,
            'is_read' => false
        ]);

        return redirect()
            ->route('booking.success');
    }
}