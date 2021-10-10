@extends('layout', ['page' => 'regEmployee'])

@section('main')
    <main id="main">
    <h1> Register Employee </h1>
        <form method="POST" action="/regEmployee">
        @csrf
            <label for="firstName">First Name:</label>
            <input type="text" name="firstName" id="firstName" value="{{ old('firstName')}}">
            @error('firstName')
                <p style="color:red"> {{ $message }} </p>
            @enderror
            <label for="lastName">Last Name:</label>
            <input type="text" name="lastName" id="lastName" value="{{ old('lastName')}}">
            @error('lastName')
                <p style="color:red"> {{ $message }} </p>
            @enderror
            <label for="payrollNumber">Payroll Number:</label>
            <input type="number" name="payrollNumber" id="payrollNumber" value="{{ old('payrollNumber')}}">
            @error('payrollNumber')
                <p style="color:red"> {{ $message }} </p>
            @enderror
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="{{ old('email')}}">
            @error('email')
                <p style="color:red"> {{ $message }} </p>
            @enderror
            <button type="submit" class="registerBtn">Submit</button>
        </form>
    </main>
@endsection