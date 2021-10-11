<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Employee;
class EmployeeController extends Controller
{
    public function register(Request $request)
    {
        //validte request data
        $validated = $request->validate([
            'firstName' => ['required'],
            'lastName' => ['required'],
            'payrollNumber' => ['required', Rule::unique('employees', 'payroll_num'), 'numeric'], //payroll number must  be unique
            'email' => ['email']
        ]);
        
        //if all data is verified create new employee entry
        Employee::create([
            'first_name' => $validated['firstName'],
            'last_name' => $validated['lastName'],
            'payroll_num' => $validated['payrollNumber'],
            'email' => $validated['email']
        ]);

        //redirect to homepage with success message
        return redirect('/')->with('message', 'Employee registed!');

    }
}
