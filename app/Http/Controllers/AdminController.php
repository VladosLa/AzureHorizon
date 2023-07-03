<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Room;
use App\Models\Booking;
use App\Models\Employee;
use App\Models\RoomType;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $bookings = Booking::all();
        $rooms = Room::all();
        $employees = Employee::all();
        $roomTypes = RoomType::all();
        $guests = DB::table('users')->get();

        return view('admin', compact('bookings', 'rooms', 'employees', 'roomTypes', 'guests'));
    }

    public function index2()
    {
        $singleRooms = DB::table('rooms')
                    ->where('room_type_id', '1')
                    ->get();

        return redirect()->route('admin')->with('data', $singleRooms);
    }

    public function storeOrUpdateRoom(Request $request)
    {
    $roomData = [
        'room_number' => $request->input('room_number'),
        'room_type_id' => $request->input('room_type'),
    ];

    if ($request->has('room_id')) {
        $room = Room::findOrFail($request->input('room_id'));
        $room->update($roomData);
    } else {
        Room::create($roomData);
    }

    return redirect()->route('admin')->with('success', 'Room saved successfully!');
    }


    /////////////////////

    public function storeEmployee(Request $request)
    {
        $validatedData = $request->validate([
            'employee_name' => 'required|string|max:255',
        ]);

        Employee::create($validatedData);

        return redirect()->route('admin')->with('success', 'Employee created successfully!');
    }

    public function updateEmployee(Request $request, $id)
    {
        $validatedData = $request->validate([
            'employee_name' => 'required|string|max:255',
        ]);

        $employee = Employee::findOrFail($id);
        $employee->update($validatedData);

        return redirect()->route('admin')->with('success', 'Employee updated successfully!');
    }

    ///////////////////ЗАПРОСЫ///////////////////


public function getAvailableRooms(Request $request)
{
    // Здесь необходимо выполнить запрос к базе данных, чтобы получить список всех доступных номеров
    // определенного типа, используя $request->input('room_type')
    // и вернуть результат в виде представления или JSON-ответа
}

public function getGuestBookings(Request $request)
{
    // Здесь необходимо выполнить запрос к базе данных, чтобы получить список всех бронирований
    // для определенного гостя, используя $request->input('guest_id')
    // и вернуть результат в виде представления или JSON-ответа
}

public function getRoomBookings(Request $request)
{
    // Здесь необходимо выполнить запрос к базе данных, чтобы получить список всех бронирований
    // для определенного номера, используя $request->input('room_number')
    // и вернуть результат в виде представления или JSON-ответа
}

public function getGuestsByPeriod(Request $request)
{
    // Здесь необходимо выполнить запрос к базе данных, чтобы получить список всех гостей,
    // проживающих в определенный период времени, используя $request->input('start_date')
    // и $request->input('end_date')
    // и вернуть результат в виде представления или JSON-ответа
}

public function getAvailableRoomsByPeriod(Request $request)
{
    // Здесь необходимо выполнить запрос к базе данных, чтобы получить список всех свободных номеров
    // в определенный период времени, используя $request->input('start_date')
    // и $request->input('end_date')
    // и вернуть результат в виде представления или JSON-ответа
}

public function getGuestsByBookingCount(Request $request)
{
    // Здесь необходимо выполнить запрос к базе данных, чтобы получить список всех гостей,
    // у которых количество бронирований превышает заданное значение,
    // используя $request->input('booking_count')
    // и вернуть результат в виде представления или JSON-ответа
}

public function getBookingsByEmployee(Request $request)
{
    // Здесь необходимо выполнить запрос к базе данных, чтобы получить список всех бронирований,
    // совершенных определенным сотрудником, используя $request->input('employee_id')
    // и вернуть результат в виде представления или JSON-ответа
}

public function getBookingsWithGuestName(Request $request)
{
    // Здесь необходимо выполнить запрос к базе данных, чтобы получить список всех бронирований
    // с указанием имени гостя и вернуть результат в виде представления или JSON-ответа
}

public function getGuestsByFloor(Request $request)
{
    // Здесь необходимо выполнить запрос к базе данных, чтобы получить список всех гостей,
    // проживающих в определенном этаже, используя $request->input('floor')
    // и вернуть результат в виде представления или JSON-ответа
}


}
