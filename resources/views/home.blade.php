@extends('layout')
    @section('main')
    <main id="main">
      <h3>{{ session()->has('message') ? session('message') : "Welcome to smartOffice!"}}</h3>
      <h4>What do you want to do next?</h4>
      <div class="wrapper">
        <div onclick="window.location='/regEmployee'">Register Employee</div>
        <div onclick="window.location='/regOffice'">Register Office</div>
        <div onclick="window.location='/offices'">Book Seat</div>
      </div>
    </main>
    @endsection