 @extends('layout', ['page' => 'booking'])
 @section('main')
     <main id="main">
         <table>
             <tbody>
                 @foreach ($seats as $seat)
                     <tr>
                         <td id="{{ $seat->id }}" class="officeName">{{ $seat->name }}</td>
                     </tr>
                     <tr>
                         @if ($seat->bookings->count() > 0) {{-- seat has atleast one booking --}}
                             @if ($seat->bookings->contains('booking_type_id', 1))
                                 {{-- booked for the day so disable all booking options --}}
                                 @foreach ($bookingTypes as $bookingType)
                                     <th>
                                         <button class="booked bookingSlot" name="bookingType"
                                             value="{{ $bookingType->id }}">{{ $bookingType->name }}
                                             <div class="tooltip">Slot already booked.</div>
                                         </button>
                                     </th>
                                 @endforeach
                             @else
                                 @foreach ($bookingTypes as $bookingType)
                                     @if ($seat->bookings->contains('booking_type_id', $bookingType->id) || $bookingType->id == 1)
                                         {{-- seat has atleast one booking so disable all-day option --}}
                                         <th>
                                             <button class="booked bookingSlot" name="bookingType"
                                                 value="{{ $bookingType->id }}">{{ $bookingType->name }}
                                                 <div class="tooltip">Slot already booked.</div>
                                             </button>
                                         </th>
                                     @else
                                         <th>
                                             <form method="POST" action="/book-seat/step-three" class="bookingSlotWrapper">
                                                 @csrf
                                                 <input type="hidden" name="seatId" value="{{ $seat->id }}">
                                                 <button name="bookingTypeId" class="bookingSlot"
                                                     value="{{ $bookingType->id }}">{{ $bookingType->name }}
                                                     <div class="tooltip">Book this slot</div>
                                                 </button>
                                             </form>
                                         </th>
                                     @endif
                                 @endforeach
                             @endif
                         @else
                             @foreach ($bookingTypes as $bookingType)
                                 <th>
                                     <form method="POST" action="/book-seat/step-three" class="bookingSlotWrapper">
                                         @csrf
                                         <input type="hidden" name="seatId" value="{{ $seat->id }}">
                                         <button name="bookingTypeId" class="bookingSlot"
                                             value="{{ $bookingType->id }}">{{ $bookingType->name }}
                                             <div class="tooltip">Book this slot</div>
                                         </button>
                                     </form>
                                 </th>
                             @endforeach
                         @endif
                     </tr>
                 @endforeach
             </tbody>
         </table>
     </main>
 @endsection
