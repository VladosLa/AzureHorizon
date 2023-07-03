<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AllGuestsController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use App\Models\User;
use App\Models\Room;
use App\Models\Booking;
use App\Models\Employee;
use App\Models\RoomType;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/rooms-select', [BookingController::class, 'index']);
//main page//
Route::get('/', function () {
    $rooms = Room::all();
    $roomTypes = RoomType::all();

    return view('index', compact('rooms', 'roomTypes'));
})->name('index');


//gallery//
Route::get('/gallery', function () {
    return view('gallery');
})->name('gallery');

//room//
Route::get('/room', function () {
    return view('room');
})->name('room');

//addService//
Route::get('/addService', function () {
    return view('addService');
})->name('addService');

//aboutUs//
Route::get('/aboutUs', function () {
    return view('aboutUs');
})->name('aboutUs');

//user//
Route::get('/user', function () {
    return view('user');
})->name('user');

//admin
Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::get('/query_two', [AdminController::class, 'index2'])->name('index2');

Route::post('/admin/rooms', [AdminController::class, 'storeOrUpdateRoom'])->name('admin.rooms.storeOrUpdate');
Route::post('/admin/employees', [AdminController::class, 'storeEmployee'])->name('admin.employees.store');
Route::put('/admin/employees/{id}', [AdminController::class, 'updateEmployee'])->name('admin.employees.update');


//запросы//
// Маршрут для получения списка всех гостей
// Маршрут для получения списка всех пользователей
Route::resource('User', AllGuestsController::class);



// Маршрут для получения списка всех доступных номеров определенного типа
Route::post('/admin/available-rooms', [AdminController::class, 'getAvailableRoomsByType'])->name('admin.availableRooms');

// Маршрут для получения списка всех бронирований для определенного гостя
Route::post('/admin/guest-bookings', [AdminController::class, 'getUserBookings'])->name('admin.userBookings');

// Маршрут для получения списка всех бронирований для определенного номера
Route::post('/admin/room-bookings', [AdminController::class, 'getBookingsByRoom'])->name('admin.roomBookings');

// Маршрут для получения списка всех гостей, проживающих в определенный период времени
Route::post('/admin/guests-by-period', [AdminController::class, 'getGuestsInPeriod'])->name('admin.guestsInPeriod');

// Маршрут для получения списка всех свободных номеров в определенный период времени
Route::post('/admin/available-rooms-by-period', [AdminController::class, 'getAvailableRoomsInPeriod'])->name('admin.availableRoomsInPeriod');

// Маршрут для получения списка всех гостей, у которых количество бронирований превышает заданное значение
Route::post('/admin/guests-by-booking-count', [AdminController::class, 'getGuestsExceedingBookingCount'])->name('admin.guestsExceedingBookingCount');

// Маршрут для получения списка всех бронирований, совершенных определенным сотрудником
Route::post('/admin/bookings-by-employee', [AdminController::class, 'getBookingsByEmployee'])->name('admin.bookingsByEmployee');

// Маршрут для получения списка всех бронирований с указанием имени гостя
Route::post('/admin/bookings-with-guest-name', [AdminController::class, 'getBookingsWithGuestNames'])->name('admin.bookingsWithGuestNames');

// Маршрут для получения списка всех гостей, проживающих в определенном этаже
Route::post('/admin/guests-by-floor', [AdminController::class, 'getGuestsByFloor'])->name('admin.guestsByFloor');



//регистрация, авторизация и выход//
Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/bookings', [BookingController::class, 'getBookings']);

Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
