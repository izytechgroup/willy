<?php

use App\Models\Video;
use Illuminate\Database\Seeder;

class VideoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Video::create([
            'title'         => 'Bekla Tobie - Solitude',
            'number'        => 101001,
            'playlist_id'   => 2,
            'status'        => 'published',
            'origin'        => 'youtube',
            'origin_id'     => 'pSbBOCxk1f0'
        ]);

        Video::create([
            'title'         => 'Sophie - Dina Bell',
            'number'        => 101002,
            'playlist_id'   => 2,
            'status'        => 'published',
            'origin'        => 'youtube',
            'origin_id'     => 'QwPURVQcT_U'
        ]);

        Video::create([
            'title'         => 'Osi - Grâce et Ben Decca',
            'number'        => 101003,
            'playlist_id'   => 4,
            'status'        => 'published',
            'origin'        => 'youtube',
            'origin_id'     => 'ogl7w2MVH88'
        ]);

        Video::create([
            'title'         => "C'est la vie - Dikongue",
            'number'        => 101004,
            'playlist_id'   => 1,
            'status'        => 'published',
            'origin'        => 'youtube',
            'origin_id'     => 'OkSIjMqFh6I'
        ]);
    }
}
