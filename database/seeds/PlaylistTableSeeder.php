<?php

use App\Models\Playlist;
use Illuminate\Database\Seeder;

class PlaylistTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Playlist::create([
            'title' => 'Mix Vidéo',
            'number'=> 101001,
            'status'=> 'published',
            'type'  => 'video'
        ]);

        Playlist::create([
            'title' => 'Vidéo VDJ',
            'number'=> 101002,
            'status'=> 'published',
            'type'  => 'video'
        ]);

        Playlist::create([
            'title' => 'Clips',
            'number'=> 101003,
            'status'=> 'published',
            'type'  => 'video'
        ]);
    }
}
