<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>admin</title>
    <link rel="stylesheet" href="{{ mix('/css/admin.css') }}">
</head>
<body>
    <!-- Форма создания/обновления записи таблицы Rooms -->
    <h1>Add room</h1>
    <form action="{{ route('admin.rooms.storeOrUpdate') }}" method="POST">
        @csrf
        @if(isset($room))
            @method('PUT')
            <input type="hidden" name="room_id" value="{{ $room->id }}">
        @endif
        <div>
            <label for="room_number">Room Number:</label>
            <input type="text" name="room_number" id="room_number" value="{{ isset($room) ? $room->room_number : '' }}">
        </div>
        <div>
            <label for="room_type">Room Type:</label>
            <select name="room_type" id="room_type">
                <!-- Опции для выбора типа комнаты -->
                @foreach($roomTypes as $roomType)
                    <option value="{{ $roomType->id }}" {{ isset($room) && $room->room_type_id == $roomType->id ? 'selected' : '' }}>
                        {{ $roomType->room_type_name }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit">Create</button>
    </form>


    <!-- Форма создания/обновления записи таблицы Employees -->
    <h1>Employee room</h1>
    <form action="{{ isset($employee) ? route('admin.employees.update', $employee->id) : route('admin.employees.store') }}" method="POST">
        @csrf
        @if(isset($employee))
            @method('PUT')
        @endif
        <div>
            <label for="employee_name">Employee Name:</label>
            <input type="text" name="employee_name" id="employee_name" value="{{ isset($employee) ? $employee->employee_name : '' }}">
        </div>
        <button type="submit">{{ isset($employee) ? 'Update' : 'Create' }}</button>
    </form>




    <!-- Кнопка для получения списка всех гостей -->
    <!-- Форма для получения списка всех гостей -->

<!-- Отображение списка гостей -->
@foreach($guests as $guest)
    {{$guest->name}}
@endforeach




<div>
    Получить список одноместных комнат
    
    <a href="/query_two">Получить</a><br>

    @if (null !== session('data'))
        @php
            $rooms = session('data');
        @endphp

    @foreach($rooms as $room)
        {{$room->room_number}}<br>
    @endforeach

    @endif
    
</div>

    
    {{-- <!-- Кнопка для получения списка всех доступных номеров определенного типа -->
    <form action="{{ route('admin.availableRooms') }}" method="POST">
        @csrf
        <label for="room_type">Room Type:</label>
        <select name="room_type" id="room_type">
            <!-- Опции для выбора типа комнаты -->
            @foreach($roomTypes as $roomType)
                <option value="{{ $roomType->id }}">{{ $roomType->room_type_name }}</option>
            @endforeach
        </select>
        <button type="submit">Get Available Rooms</button>
    </form>

    <!-- Кнопка для получения списка всех бронирований для определенного гостя -->
    <form action="{{ route('admin.guestBookings') }}" method="POST">
        @csrf
        <label for="guest_id">Guest ID:</label>
        <input type="text" name="guest_id" id="guest_id">
        <button type="submit">Get Guest Bookings</button>
    </form>

    <!-- Кнопка для получения списка всех бронирований для определенного номера -->
    <form action="{{ route('admin.roomBookings') }}" method="POST">
        @csrf
        <label for="room_number">Room Number:</label>
        <input type="text" name="room_number" id="room_number">
        <button type="submit">Get Room Bookings</button>
    </form>

    <!-- Кнопка для получения списка всех гостей, проживающих в определенный период времени -->
    <form action="{{ route('admin.guestsByPeriod') }}" method="POST">
        @csrf
        <label for="start_date">Start Date:</label>
        <input type="date" name="start_date" id="start_date">
        <label for="end_date">End Date:</label>
        <input type="date" name="end_date" id="end_date">
        <button type="submit">Get Guests by Period</button>
    </form>

    <!-- Кнопка для получения списка всех свободных номеров в определенный период времени -->
    <form action="{{ route('admin.availableRoomsByPeriod') }}" method="POST">
        @csrf
        <label for="start_date">Start Date:</label>
        <input type="date" name="start_date" id="start_date">
        <label for="end_date">End Date:</label>
        <input type="date" name="end_date" id="end_date">
        <button type="submit">Get Available Rooms by Period</button>
    </form>

    <!-- Кнопка для получения списка всех гостей, у которых количество бронирований превышает заданное значение -->
    <form action="{{ route('admin.guestsByBookingCount') }}" method="POST">
        @csrf
        <label for="booking_count">Booking Count:</label>
        <input type="text" name="booking_count" id="booking_count">
        <button type="submit">Get Guests by Booking Count</button>
    </form>

    <!-- Кнопка для получения списка всех бронирований, совершенных определенным сотрудником -->
    <form action="{{ route('admin.bookingsByEmployee') }}" method="POST">
        @csrf
        <label for="employee_id">Employee ID:</label>
        <input type="text" name="employee_id" id="employee_id">
        <button type="submit">Get Bookings by Employee</button>
    </form>

    <!-- Кнопка для получения списка всех бронирований с указанием имени гостя -->
    <form action="{{ route('admin.bookingsWithGuestName') }}" method="POST">
        @csrf
        <button type="submit">Get Bookings with Guest Name</button>
    </form>

    <!-- Кнопка для получения списка всех гостей, проживающих в определенном этаже -->
    <form action="{{ route('admin.guestsByFloor') }}" method="POST">
        @csrf
        <label for="floor">Floor:</label>
        <input type="text" name="floor" id="floor">
        <button type="submit">Get Guests by Floor</button>
    </form> --}}



    <h1>Bookings</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>User ID</th>
                <th>Room ID</th>
                <th>Employee ID</th>
                <th>Start Date</th>
                <th>End Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bookings as $booking)
                <tr>
                    <td>{{ $booking->id }}</td>
                    <td>{{ $booking->user_id }}</td>
                    <td>{{ $booking->room_id }}</td>
                    <td>{{ $booking->employee_id }}</td>
                    <td>{{ $booking->start_date }}</td>
                    <td>{{ $booking->end_date }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h1>Rooms</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Room Number</th>
                <th>Room Type ID</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rooms as $room)
                <tr>
                    <td>{{ $room->id }}</td>
                    <td>{{ $room->room_number }}</td>
                    <td>{{ $room->room_type_id }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h1>Employees</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Employee Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $employee)
                <tr>
                    <td>{{ $employee->id }}</td>
                    <td>{{ $employee->employee_name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h1>Room Types</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Room Type Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach($roomTypes as $roomType)
                <tr>
                    <td>{{ $roomType->id }}</td>
                    <td>{{ $roomType->room_type_name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    
    
    
</body>
</html>

