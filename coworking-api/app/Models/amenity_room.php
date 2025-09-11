<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class amenity_room extends Pivot
{
    protected $table = 'amenity_room';
     protected $fillable = [
        'amenity_id', 'room_id'
     ];
}
