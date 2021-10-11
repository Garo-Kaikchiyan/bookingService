<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Office;
use App\Models\OfficeSeat;

class OfficeController extends Controller
{
    public function register(Request $request)
    {
        //validate the data
        $validated = $request->validate([
            'name' => ['required'],
            'numberOfSeats' => ['required', 'numeric', 'min:0', 'max:100'] //make sure the amount of seats is between 0 and 100
        ]);
        
        //if all data is valid create the office
        $office = Office::create([
            'name' => $validated['name']
        ]);

        //add seats to the new office
        for($i = 0 ; $i < $validated['numberOfSeats']; $i++) {
            $name = $validated['name'] . '_' . ($i + 1);
            OfficeSeat::create([
                'office_id' => $office->id,
                'name' => $name
            ]);
        }

        //redirect to homepage with success message
        return redirect('/')->with('message', 'Office registed!');

    }
}
