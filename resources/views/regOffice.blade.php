@extends('layout', ['page' => 'regOffice'])

@section('main')
    <main id="main">
        <h1> Register Office </h1>
        <form method="POST" action="/regOffice">
            @csrf
            <label for="name">Office Name:</label>
            <input type="text" name="name" id="name" value={{old('name')}}>
            @error('name')
                <p class="error"> {{ $message }} </p>
            @enderror
            <label for="name">Number of Seats:</label>
            <input type="number" name="numberOfSeats" id="numberOfSeats" value={{old('numberOfSeats')}}>
            @error('numberOfSeats')
                <p class="error"> {{ $message }} </p>
            @enderror
            <input type="submit" value="Register" class="registerBtn">
        </form>
    </main>
@endsection