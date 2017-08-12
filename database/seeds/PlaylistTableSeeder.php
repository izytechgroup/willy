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
            'slug'  => 'mix-video',
            'status'=> 'published',
            'type'  => 'video'
        ]);

        Playlist::create([
            'title' => 'Vidéo VDJ',
            'slug'  => 'video-vdj',
            'status'=> 'published',
            'type'  => 'video'
        ]);

        Playlist::create([
            'title' => 'Clips',
            'slug'  => 'clips',
            'status'=> 'published',
            'type'  => 'video'
        ]);
    }
}
