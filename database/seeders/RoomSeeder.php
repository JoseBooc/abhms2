<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    public function run(): void
    {
        $rooms = [];
        for ($i = 1; $i <= 8; $i++) {
            $rooms[] = [
                'number' => sprintf('R%02d', $i),
                'type' => 'standard',
                'rate' => 0,
                'capacity' => 2,
                'status' => Room::STATUS_AVAILABLE,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        Room::upsert($rooms, ['number']);
    }
}
