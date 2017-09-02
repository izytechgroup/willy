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
            'origin_id'     => 'pSbBOCxk1f0',
            'thumbnail'     => 'https://img.youtube.com/vi/pSbBOCxk1f0/mqdefault.jpg'
        ]);

        Video::create([
            'title'         => 'Sophie - Dina Bell',
            'number'        => 101002,
            'playlist_id'   => 2,
            'status'        => 'published',
            'origin'        => 'youtube',
            'origin_id'     => 'QwPURVQcT_U',
            'thumbnail'     => 'https://img.youtube.com/vi/QwPURVQcT_U/mqdefault.jpg'
        ]);

        Video::create([
            'title'         => 'Osi - Grâce et Ben Decca',
            'number'        => 101003,
            'playlist_id'   => 4,
            'status'        => 'published',
            'origin'        => 'youtube',
            'origin_id'     => 'ogl7w2MVH88',
            'thumbnail'     => 'https://img.youtube.com/vi/ogl7w2MVH88/mqdefault.jpg'
        ]);

        Video::create([
            'title'         => "C'est la vie - Dikongue",
            'number'        => 101004,
            'playlist_id'   => 1,
            'status'        => 'published',
            'origin'        => 'youtube',
            'origin_id'     => 'OkSIjMqFh6I',
            'thumbnail'     => 'https://img.youtube.com/vi/OkSIjMqFh6I/mqdefault.jpg'
        ]);

        Video::create([
            'title'         => "Michel Telo",
            'number'        => 101008,
            'playlist_id'   => 1,
            'status'        => 'published',
            'origin'        => 'vimeo',
            'origin_id'     => '35730540',
            'thumbnail'     => 'http://i.vimeocdn.com/video/244532304_640.jpg'
        ]);
    }
}
