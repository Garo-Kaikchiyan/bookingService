@extends('layout')

@section('main')
    <main id="main">
    <h1> Register Employee </h1>
        <form method="POST" action="/regEmployee">
            <label for="firstName">First Name:</label>
            <input type="text" name="firstName" id="firstName">
            <label for="lastName">Last Name:</label>
            <input type="text" name="lastName" id="lastName">
            <label for="payrollNumber">Payroll Number:</label>
            <input type="number" name="payrollNumber" id="payrollNumber">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email">
            <button type="submit" class="registerBtn">Submit</button>
        </form>
    </main>
@endsection