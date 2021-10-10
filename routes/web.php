<?php

use App\Models\Office;
use App\Models\BookingType;
use App\Models\OfficeSeat;
use App\Models\Employee;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('home');
});

Route::get('/regEmployee', function () {
    return view('regEmployee');
});

Route::post('/regEmployee', [EmployeeController::class, 'register']);

Route::get('/regOffice', function () {
    return view('regOffice');
});

Route::post('/regOffice', [OfficeController::class, 'register']);

Route::get('/offices', [BookingController::class, 'bookingStepOne']);

Route::post('/offices/book-seat',[BookingController::class, 'bookingStepTwo']);

// function (Office $office) {
//     dd($office);
//     return view('bookSeat', [
//         'seats' => OfficeSeat::with('bookings')->where('office_id', '=', $office->id)->get(),
//         'bookingTypes' => BookingType::all()
//     ]
