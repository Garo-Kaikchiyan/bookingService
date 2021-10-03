@extends('layout')

@section('main')
    <main id="main">
    <h1> Register Office </h1>
        <form method="POST" action="/regOffice">
            <label for="name">Office Name:</label>
            <input type="text" name="firstName" id="firstName">
            <input type="submit" value="Register" class="registerBtn">
        </form>
    </main>
@endsection