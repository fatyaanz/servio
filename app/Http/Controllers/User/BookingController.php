<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubService;
use App\Models\User;
use App\Models\Booking;
use App\Models\BookingSubService;
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

            'sub_services' => 'required|array'

        ]);

        $booking = Booking::create([

            'customer_id' => Auth::id(),

            'provider_id' => $request->provider_id,

            'address' => $request->address,

            'location_note' => $request->location_note,

            'booking_date' => $request->booking_date,

            'booking_time' => $request->booking_time,

            'notes' => $request->notes,

            'status' => 'pending'

        ]);

        foreach ($request->sub_services as $subServiceId) {

            BookingSubService::create([

                'booking_id' => $booking->id,

                'sub_service_id' => $subServiceId

            ]);
        }

        return redirect()
            ->route('booking.success');
    }
}