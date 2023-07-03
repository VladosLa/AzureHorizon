<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'room_id', 'start_date', 'end_date'];

    // Определите отношение с моделью User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Определите отношение с моделью Room
    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    // Определите отношение с моделью RoomType
    public function roomType()
    {
        return $this->belongsTo(RoomType::class, 'room_id', 'id');
    }
}
