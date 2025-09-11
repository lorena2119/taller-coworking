<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Room;


class Space extends Model
{
    /** @use HasFactory<\Database\Factories\SpaceFactory> */
    use HasFactory, SoftDeletes;

    protected $table = 'spaces';
    protected $fillable = [
        'name', 'address'
    ];

    public function rooms(){
         return $this->hasMany(Room::class);
    }
     
    
    
}
