<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = ['room_number', 'room_type_id'];

    // Определите отношение с моделью RoomType
    public function roomType()
    {
        return $this->belongsTo(RoomType::class);
    }

    // Определите отношение с моделью Booking
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
