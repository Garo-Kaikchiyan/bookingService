 @extends('layout')
    @section('main')
        <main id="main">
            <table>
                <tbody>
                    <tr>
                    @foreach ($seats as $seat)
                        <td id="{{ $seat->id }}">{{ $seat->name }}</td>
                    {{-- <td id="seat1">Seat 1</td>
                    <td><input type="checkbox" name="allDay" id="allDay1"></td>
                    <td><button></button></td>
                    <td><button></button></td>
                    <td><button class="selectedSeat"></button></td>
                    <td><button></button></td>
                    <td><button></button></td>
                    <td><button></button></td>
                    <td><button></button></td>
                    <td><button></button></td>
                    <td><button></button></td>
                    <td><button></button></td> --}}
                </tr>
                <tr>
                    @foreach ($bookingTypes as $bookingType)
                        @if (isset($seat->bookings) && $seat->bookings->contains('booking_type_id', $bookingType->id))
                            <th> 
                                <button class="selectedSeat" id="{{$bookingType->name}}">{{$bookingType->name}}</button>
                            </th>
                        @else
                            <th> 
                                <button id="{{$bookingType->name}}">{{$bookingType->name}}</button>
                            </th>
                        @endif 
                    @endforeach
                </tr>
                
                @endforeach
                {{-- <tr>
                    <td id="seat2">Seat 2</td>
                    <td><input type="checkbox" name="allDay" id="allDay2"></td>
                    <td><button></button></td>
                    <td><button></button></td>
                    <td><button></button></td>
                    <td><button></button></td>
                    <td><button></button></td>
                    <td><button></button></td>
                    <td><button></button></td>
                    <td><button></button></td>
                    <td><button></button></td>
                    <td><button></button></td>
                </tr> --}}
                </tbody>
            </table>
        </main>
        @endsection