@extends('layout', ['page' => 'booking'])

@section('main')
    <main id="main">
        <h1> Book a seat </h1>
        <form method="POST" action="/book-seat/step-two">
            @csrf
            <div class="searchField">
                <h5>1. Choose Employee</h5>
                <select name="employee" placeholder="Select employee">
                    <option hidden>Select employee</option>
                    @foreach ($employees as $employee)
                        <option value="{{ $employee->id }}"> {{ $employee->first_name . ' ' . $employee->last_name }}
                        </option>
                    @endforeach
                </select>
                @error('employee')
                    <p class="error"> {{ $message }} </p>
                @enderror
            </div>

            <div class="searchField">
                <h5>2. Choose Office</h5>
                <select name="office" value="Select office">
                    <option hidden>Select office</option>
                    @foreach ($offices as $office)
                        <option value="{{ $office->id }}">{{ $office->name }}</option>
                    @endforeach
                </select>
                @error('office')
                    <p class="error"> {{ $message }} </p>
                @enderror
            </div>

            <div class="searchField">
                <h5>3. Choose Date</h5>
                <input type="date" name="date" required min="{{ date('Y-m-d') }}" value="{{ date('Y-m-d') }}">
            </div>
            @error('date')
                <p class="error"> {{ $message }} </p>
            @enderror
            <button class="registerBtn">Next</button>
        </form>
        @if (session()->has('errorMessage'))
            <h3>{{ session('errorMessage') }}</h3>
        @endif
    </main>
@endsection
