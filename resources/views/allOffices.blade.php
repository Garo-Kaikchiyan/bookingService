
    @extends('layout', ['page' => 'booking'])

    @section('main')
    <main id="main">
        <form method="POST" action="/offices/book-seat">
            <h4>1. Choose Employee</h4>
            @csrf
            <div class="searchField">
                <select name="employee" placeholder="Select employee">
                    <option hidden>Select employee</option>
                    @foreach ($employees as $employee)
                        <option value="{{ $employee->id }}"> {{ $employee->first_name . ' ' . $employee->last_name}}</option>
                    @endforeach
                </select>
            </div>
            <h4>2.Choose Office</h4>
                <div class="searchField">
                    <select name="office" value="Select office">
                        <option hidden>Select office</option>
                        @foreach ($offices as $office)
                            <option value="{{$office->id}}">{{$office->name}}</option>
                        @endforeach
                    </select>
                </div>
            <h4>3.Choose Date</h4>
                <div class="searchField">
                    <input type="date" name="date" required min="{{ date('Y-m-d')}}" value="{{ date('Y-m-d')}}">
                </div>
            <button class="registerBtn">Next</button>
        </form>

      </main>
    @endsection
