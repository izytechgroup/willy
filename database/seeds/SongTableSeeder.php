<?php

use App\Models\Song;
use Illuminate\Database\Seeder;

class SongTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Song::create([
            'title'         => 'Eminem PlayList 2',
            'number'        => 101001,
            'playlist_id'   => 2,
            'link'          => '/docs/images/audio/playlist1/Eminem_Rap_God.mp3',
            'duration'      => '03:42',
            'size'          => 1024,
            'plays'         => 90,
            'downloads'     => 87
        ]);

        Song::create([
            'title'         => 'Eminem Playlist 3',
            'number'        => 101002,
            'playlist_id'   => 3,
            'link'          => '/docs/images/audio/playlist1/Eminem_Rap_God.mp3',
            'duration'      => '05:52',
            'size'          => 1024,
            'plays'         => 24,
            'downloads'     => 19
        ]);

        Song::create([
            'title'         => 'Flux Pavilion',
            'number'        => 101003,
            'playlist_id'   => 2,
            'link'          => '/docs/images/audio/playlist1/Flux_Pavilion_-_I_Can_T_Stop.mp3',
            'duration'      => '04:21',
            'size'          => 2048,
            'plays'         => 58,
            'downloads'     => 15
        ]);
    }
}
