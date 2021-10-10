<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Employee;
class EmployeeController extends Controller
{
    public function register(Request $request)
    {
        $validated = $request->validate([
            'firstName' => ['required'],
            'lastName' => ['required'],
            'payrollNumber' => ['required', Rule::unique('employees', 'payroll_num'), 'numeric'],
            'email' => ['email']
        ]);
        
        Employee::create([
            'first_name' => $validated['firstName'],
            'last_name' => $validated['lastName'],
            'payroll_num' => $validated['payrollNumber'],
            'email' => $validated['email']
        ]);

        return redirect('/')->with('message', 'Employee registed!');

    }
}
