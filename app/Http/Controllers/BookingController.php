<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Office;
use App\Models\OfficeSeat;
use App\Models\Employee;
use App\Models\BookingType;

class BookingController extends Controller
{
    public function bookingStepOne(Request $request)
    {
        $offices = Office::all();
        $employees = Employee::all();
        return view('allOffices', [
            'offices' => $offices,
            'employees' => $employees
        ]);
    }

    public function bookingStepTwo(Request $request)
    {
        $employee_id = $request->get('employee');
        $office_id = $request->get('office');
        $date = $request->get('date');

        $seats = OfficeSeat::with(['bookings'=> function ($query) use ($date){
            $query->where('booked_date', '=', $date);
        }])->where('office_id', '=', $office_id)->get();

        $request->flash();
        return view('bookSeat',[
            'seats' => $seats,
            'bookingTypes' => BookingType::all(),
            'employee_id' => $employee_id
        ]);
    }
}
