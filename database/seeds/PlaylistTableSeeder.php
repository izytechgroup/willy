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
            'cover' => '/docs/images/audio/playlist1/hqdefault.jpg',
            'type'  => 'video'
        ]);

        Playlist::create([
            'title' => 'Mix Audio',
            'number'=> 101002,
            'cover' => '/docs/images/audio/playlist1/lady.jpg',
            'cover_sm' => '/docs/sm/audio/playlist1/lady.jpg',
            'cover_md' => '/docs/md/audio/playlist1/lady.jpg',
            'status'=> 'published',
            'type'  => 'audio'
        ]);

        Playlist::create([
            'title' => 'Audio Voyage',
            'number'=> 101003,
            'cover' => '/docs/images/audio/playlist1/dipanda.jpg',
            'cover_sm' => '/docs/sm/audio/playlist1/dipanda.jpg',
            'cover_md' => '/docs/md/audio/playlist1/dipanda.jpg',
            'status'=> 'published',
            'type'  => 'audio'
        ]);

        Playlist::create([
            'title' => 'Clips Vidéo',
            'number'=> 101004,
            'cover' => '/docs/images/audio/playlist1/hqdefault.jpg',
            'status'=> 'published',
            'type'  => 'video'
        ]);
    }
}
