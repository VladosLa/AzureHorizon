@foreach($rooms as $room)
    <option value="{{ $room->id }}">{{ $room->room_number }} ({{ $room->roomType->room_type_name }})</option>
@endforeach