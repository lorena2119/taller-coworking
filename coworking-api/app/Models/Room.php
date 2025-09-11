<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Space;
use App\Models\Amenity;
use App\Models\Booking;
use App\Models\amenity_room;


class Room extends Model
{
    /** @use HasFactory<\Database\Factories\RoomFactory> */
    use HasFactory, SoftDeletes;
    protected $table = 'rooms';

    protected $fillable = [
        'space_id', 'name', 'capacity', 'type', 'is_active'
    ];

    public function spaces(){
        return $this->belongsTo(Space::class);
    }

    public function bookings(){
        return $this->hasMany(Booking::class);
    }

    public function amenities(){
        // Tabla pivote
        return $this->belongsToMany(Amenity::class)->using(amenity_room::class)->withTimestamps();
    }
}
