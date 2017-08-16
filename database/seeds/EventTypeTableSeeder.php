<?php

use App\Models\EventType;
use Illuminate\Database\Seeder;

class EventTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EventType::create([
            'name' => 'Concert'
        ]);

        EventType::create([
            'name' => 'Festival'
        ]);

        EventType::create([
            'name' => 'Spectacle'
        ]);

        EventType::create([
            'name' => 'Sortie en Boîte'
        ]);
    }
}
