 @extends('layout')
    @section('main')
        <main id="main">
            <table>
                <tbody>
                    @foreach ($seats as $seat)
                        <tr>
                            <td id="{{ $seat->id }}">{{ $seat->name }}</td>
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
                </tbody>
            </table>
        </main>
        @endsection