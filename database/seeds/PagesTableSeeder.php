<?php

use Illuminate\Database\Seeder;
use App\Models\Page;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Page::create([
            'title'     => 'Sample Page',
            'slug'      => 'sample-page',
            'tags'      => 'sample, page',
            'content'   => 'Sample page content',
            'last_updated_by' => 1
        ]);


        Page::create([
            'title'     => 'Location',
            'slug'      => 'location',
            'tags'      => 'location de sono, animation',
            'content'   => 'Louez du matos moins chez pour vos animations',
            'last_updated_by' => 1
        ]);

        Page::create([
            'title'     => 'Willy Mix Academie',
            'slug'      => 'academie',
            'tags'      => 'académie de mixage, apprendre à être DJ, sonorisation',
            'content'   => 'Vous voulez devenir DJ, la willy Mix Académie est votre chance !',
            'last_updated_by' => 1
        ]);
    }
}
