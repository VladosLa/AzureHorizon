@foreach ($bookings as $booking)
    <p>{{ $booking->start_date }} - {{ $booking->end_date }}</p>
    <p>Room Number: {{ $booking->room->room_number }}</p>
    <p>Room Type: {{ $booking->roomType->room_type_name }}</p>
@endforeach
