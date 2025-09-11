<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Room;
use App\Models\amenity_room;

class Amenity extends Model
{
    /** @use HasFactory<\Database\Factories\AmenityFactory> */
    use HasFactory, SoftDeletes;

    protected $table = 'amenities';
    protected $fillable = [
        'name'
    ];

    public function rooms(){
         return $this->belongsToMany(Room::class)->using(amenity_room::class)->withTimestamps();
    }
}
