<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Office;
use App\Models\OfficeSeat;
use App\Models\Employee;
use App\Models\Booking;
use App\Models\BookingType;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    public function bookingStepOne(Request $request)
    {
        $offices = Office::all();
        $employees = Employee::all();
        return view('bookSeat.stepOne', [
            'offices' => $offices,
            'employees' => $employees
        ]);
    }

    public function bookingStepTwo(Request $request)
    {
        //Validate the input
        $validated = $request->validate([
            'employee' => ['required', 'exists:employees,id'], //make sure an employee with the given id exists
            'office' => ['required', 'exists:offices,id'], //make sure an office with the given id exists
            'date' => ['required', 'date', 'after_or_equal:today'] //make sure booked date is in the future
        ]);

        $employee_id = $request->get('employee');
        $office_id = $request->get('office');
        $date = $request->get('date');

        //check if the given date is in the weekend and display error message
        if(date('N', strtotime($date)) >= 6) {
            return back()->withErrors(['date' => 'Please select a working day']);
        }

        //get all seats for the given office with any coresponding bookings
        $seats = OfficeSeat::with(['bookings'=> function ($query) use ($date){
            $query->where('booked_date', '=', $date);
        }])->where('office_id', '=', $office_id)->get();

        //flash the request data so it could be used in the next step
        $request->flash();

        return view('bookSeat.stepTwo',[
            'seats' => $seats,
            'bookingTypes' => BookingType::all(),
            'employee_id' => $employee_id
        ]);
    }

    public function bookingStepThree(Request $request)
    {
        //Validate the input
        $validated = $request->validate([
            'seatId' => ['required', 'exists:office_seats,id'], //check if the seat exists in DB
            'bookingTypeId' => ['required', 'exists:booking_types,id'] //check if the booking type exists in DB
        ]);

        //get the data from bookingStepTwo
        $employee_id = $request->old('employee');
        $office_id = $request->old('office');
        $date = $request->old('date');

        $seat = OfficeSeat::find($validated['seatId']);

        //check if the seat is from the given office
        if ($seat->office_id != $office_id) {
            return redirect('/')->with('errorMessage', 'Invalid data');
        }

        //make sure the seat is free to book
        if ($this->isSeatTaken($seat->id, $date, $validated['bookingTypeId'])) {
            return redirect('/offices')->with('errorMessage', 'Seat is already booked');    
        }

        //create the booking
        Booking::create([
            'office_id' => $office_id,
            'office_seat_id' => $validated['seatId'],
            'employee_id' => $employee_id,
            'booking_type_id' => $validated['bookingTypeId'],
            'booked_date' => $date
        ]);

        return redirect('/')->with('message', 'Booking confirmed!');
    }

    //Checks if a given seat is booked for the given date and slot
    private function isSeatTaken($seatId, $bookedDate, $bookingType)
    {
        $result = DB::table('bookings')
                ->where('office_seat_id', '=', $seatId)
                ->where('booked_date', '=', $bookedDate);
        //if booking is of type 1 (all day) make sure there are no other bookings for that seat
        if ($bookingType == 1) {
            $result->where('booking_type_id', '<>', $bookingType);
        } else {
            $result->where(function ($query) use ($bookingType){
                    $query->where('booking_type_id', '=', $bookingType)
                    ->orWhere('booking_type_id', '=', 1);
            });
        }
        return $result->exists();
    }
}
