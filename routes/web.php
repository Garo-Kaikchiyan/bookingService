<?php

use App\Models\Office;
use App\Models\BookingType;
use App\Models\OfficeSeat;
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
Route::get('/regEmployee', function () {
    return view('regEmployee');
});

// Route::post('/regEmployee', [EmployeeController::class, 'register'])
// });

Route::get('/offices', function () {
    return view('allOffices', [
        'offices' => Office::all()
    ]);
});

Route::get('/offices/{office:name}', function (Office $office) {
    return view('bookSeat', [
        //'seats' => Booking::find($office->seats)->seat,
        'seats' => OfficeSeat::with('bookings')->where('office_id', '=', $office->id)->get(),
        'bookingTypes' => BookingType::all()
    ]);
});
