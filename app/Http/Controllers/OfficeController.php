<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Office;
use App\Models\OfficeSeat;

class OfficeController extends Controller
{
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required'],
            'numberOfSeats' => ['required', 'numeric', 'min:0', 'max:100']
        ]);
        
        $office = Office::create([
            'name' => $validated['name']
        ]);

        for($i = 0 ; $i < $validated['numberOfSeats']; $i++) {
            $name = $validated['name'] . '_' . ($i + 1);
            OfficeSeat::create([
                'office_id' => $office->id,
                'name' => $name
            ]);
        }

        return redirect('/')->with('message', 'Office registed!');

    }
}
