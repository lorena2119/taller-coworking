<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Space;
use App\Models\Room;
use App\Models\Amenity;

class SpaceRoomSeeder extends Seeder
{
    public function run(): void
    {
        Space::factory()->count(rand(2, 3))->create();
    }
}

