<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorebookingRequest;
use App\Http\Requests\UpdatebookingRequest;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\RoomType;

class BookingController extends Controller
{

    

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::all();
        $roomTypes = RoomType::all();

        return view('rooms-select', compact('rooms', 'roomTypes'));
    }

    public function getBookings()
    {
        $userId = Auth::id();
        $bookings = Booking::with(['room', 'roomType'])
        ->where('user_id', $userId)
        ->get();

        return view('partials.bookings', compact('bookings'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $userId = Auth::id();
    $existingBooking = Booking::where('user_id', $userId)->first();
    if ($existingBooking) {
        return redirect()->route('index')->with('error', 'You already have a booking');
    }
    $roomId = $request->input('roomNumber');
    $startDate = $request->input('startDate');
    $endDate = $request->input('endDate');
    
    $existingBooking = Booking::where('room_id', $roomId)
        ->where(function ($query) use ($startDate, $endDate) {
            $query->whereBetween('start_date', [$startDate, $endDate])
                ->orWhereBetween('end_date', [$startDate, $endDate])
                ->orWhere(function ($query) use ($startDate, $endDate) {
                    $query->where('start_date', '<=', $startDate)
                        ->where('end_date', '>=', $endDate);
                });
        })
        ->first();

    if ($existingBooking) {
        // Бронь уже существует для данного номера и указанных дат
        return redirect()->route('index')->with('error', 'Booking already exists for the selected dates');
    }

    // Получить объект комнаты и типа комнаты
    $room = Room::findOrFail($roomId);
    $roomType = $room->roomType;

    // Создание новой брони
    $booking = new Booking();
    $booking->user_id = $userId;
    $booking->room_id = $roomId;
    $booking->start_date = $startDate;
    $booking->end_date = $endDate;

    // Установить связанные модели
    $booking->room()->associate($room);
    $booking->roomType()->associate($roomType);

    $booking->save();

    // Возврат успешного ответа
    return redirect()->route('index')->with('success', 'Booking created successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show(booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatebookingRequest $request, booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(booking $booking)
    {
        //
    }
}
