@extends('layout', ['page' => 'booking'])
    @section('main')
    <main id="main">
      <h4>1. Choose Employee</h4>
      <div class="searchField">
        <select name="employee" placeholder="Search employees...">
        @foreach ($employees as $employee)
          <option value="{{ $employee->id }}"> {{ $employee->name }}
        @endforeach
        <input type="submit" value="Search" class="registerBtn" />
      </div>
      <h4>2.Choose Office</h4>
      <div class="officeCards">
            @foreach ($office_seats as $seat)
                <div class="officeCard">{{$seat->name}}</div>
            @endforeach
      </div>
    </main>
    @endsection