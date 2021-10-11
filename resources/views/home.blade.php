@extends('layout')
  @section('main')
    <main id="main">
      <h3>{{ session()->has('message') ? session('message') : "Welcome to smartOffice!"}}</h3>
      <h4>What do you want to do?</h4>
      <div class="wrapper">
        <div onclick="window.location='/regEmployee'" class="cursor">Register Employee</div>
        <div onclick="window.location='/regOffice'" class="cursor">Register Office</div>
        <div onclick="window.location='/book-seat/step-one'" class="cursor">Book Seat</div>
      </div>
      @if(session()->has('errorMessage')) 
        <h3>{{ session('errorMessage')}}</h3>
      @endif
    </main>
  @endsection