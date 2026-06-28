<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\BookingSubService;
use Carbon\Carbon;

class BookingApiController extends Controller
{
    /**
     * Get user's bookings (active and history)
     */
    public function index(Request $request)
    {
        $user = $request->user();

        // Active bookings
        $activeBookings = Booking::where('customer_id', $user->id)
            ->whereNotIn('status', ['completed', 'cancelled', 'rejected'])
            ->with(['provider', 'subServices', 'diagnosis.produks', 'review'])
            ->orderBy('created_at', 'desc')
            ->get();

        // History bookings
        $historyBookings = Booking::where('customer_id', $user->id)
            ->whereIn('status', ['completed', 'cancelled', 'rejected'])
            ->with(['provider', 'subServices', 'diagnosis.produks', 'review'])
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json([
            'status' => 'success',
            'data' => [
                'active' => $activeBookings,
                'history' => $historyBookings
            ]
        ]);
    }

    /**
     * Show booking details
     */
    public function show(Request $request, $bookingId)
    {
        $user = $request->user();

        $booking = Booking::where('_id', $bookingId)
            ->where('customer_id', $user->id)
            ->with(['provider', 'subServices', 'damageReports', 'transaction', 'diagnosis.produks', 'review'])
            ->first();

        if (!$booking) {
            return response()->json([
                'status' => 'error',
                'message' => 'Booking not found'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $booking
        ]);
    }

    /**
     * Create a new booking
     */
    public function store(Request $request)
    {
        $request->validate([
            'provider_id' => 'required|exists:users,_id',
            'sub_services' => 'required|array',
            'sub_services.*' => 'exists:sub_services,_id',
            'booking_date' => 'required|date',
            'booking_time' => 'required|string',
            'address' => 'required|string',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'location_note' => 'nullable|string',
            'damage_description' => 'nullable|string',
        ]);

        $user = $request->user();

        // Create booking
        $booking = Booking::create([
            'customer_id' => $user->id,
            'provider_id' => $request->provider_id,
            'address' => $request->address,
            'location_note' => $request->location_note,
            'booking_date' => $request->booking_date,
            'booking_time' => $request->booking_time,
            'status' => 'pending',
            'damage_description' => $request->damage_description,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'customer_location' => $request->latitude . ',' . $request->longitude,
        ]);

        // Attach sub services
        // MongoDB relation handling for attach is sometimes tricky, using BookingSubService model directly
        foreach ($request->sub_services as $subServiceId) {
            BookingSubService::create([
                'booking_id' => $booking->id,
                'sub_service_id' => $subServiceId
            ]);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Booking created successfully',
            'data' => $booking
        ], 201);
    }

    /**
     * Cancel a booking
     */
    public function cancel(Request $request, $bookingId)
    {
        $user = $request->user();
        $booking = Booking::where('_id', $bookingId)->where('customer_id', $user->id)->first();

        if (!$booking) {
            return response()->json(['status' => 'error', 'message' => 'Booking not found'], 404);
        }

        if (in_array($booking->status, ['completed', 'cancelled', 'rejected'])) {
            return response()->json(['status' => 'error', 'message' => 'Booking cannot be cancelled in its current state'], 400);
        }

        $booking->status = 'cancelled';
        $booking->save();

        return response()->json(['status' => 'success', 'message' => 'Booking cancelled successfully', 'data' => $booking]);
    }

    /**
     * Approve Estimation
     */
    public function approveEstimation(Request $request, $bookingId)
    {
        $user = $request->user();
        $booking = Booking::where('_id', $bookingId)->where('customer_id', $user->id)->first();

        if (!$booking) {
            return response()->json(['status' => 'error', 'message' => 'Booking not found'], 404);
        }

        if ($booking->status !== 'waiting_approval') {
            return response()->json(['status' => 'error', 'message' => 'Booking is not waiting for approval'], 400);
        }

        $booking->status = 'in_progress';
        $booking->save();

        return response()->json(['status' => 'success', 'message' => 'Estimation approved', 'data' => $booking]);
    }

    /**
     * Upload Payment Proof
     */
    public function uploadPayment(Request $request, $bookingId)
    {
        $request->validate([
            'payment_proof' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $user = $request->user();
        $booking = Booking::where('_id', $bookingId)->where('customer_id', $user->id)->first();

        if (!$booking) {
            return response()->json(['status' => 'error', 'message' => 'Booking not found'], 404);
        }

        if ($booking->status !== 'payment') {
            return response()->json(['status' => 'error', 'message' => 'Booking is not in payment state'], 400);
        }

        if ($request->hasFile('payment_proof')) {
            $path = $request->file('payment_proof')->store('payments', 'public');
            // Assuming transaction model is updated or just change booking status
            // $booking->transaction()->updateOrCreate([], ['proof_url' => $path]);
            $booking->status = 'completed';
            $booking->save();
        }

        return response()->json(['status' => 'success', 'message' => 'Payment proof uploaded successfully', 'data' => $booking]);
    }
}
