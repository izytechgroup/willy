<?php

use App\Models\Event;
use Illuminate\Database\Seeder;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Event::create([
            'title'             => 'Mariage Ella et Homban',
            'slug'              => 'mariage-gabin',
            'flyer'             => 'http://localhost:8000/docs/images/audio/playlist1/hqdefault.jpg',
            'type'              => 'Cérémonie',
            'country'           => 'Cameroun',
            'address'           => '12 Carrfour Waka Bafoussam',
            'organizer'         => 'El Che Production Center',
            'phone'             => '+237648751201',
            'phone2'            => '+237648754214',
            'email'             => 'eddysarah@lapine.com',
            'website'           => 'www.eddyetsarah.com',
            'time'              => '10 heures',
            'description'       => 'Le mariage de Ella avec Ma Sah, tout le Cameroun est invité au mariage du gars le plus superficiel du monde avec Miss Cameroun en personne',
            'date'              => Carbon\Carbon::createFromFormat('d/m/Y', '11/06/2019'),
            'status'            => 'published',
            'last_updated_by'   => 1
        ]);

        Event::create([
            'title'             => 'Signature Camermix - Bismtr',
            'slug'              => 'camermix-bismtr',
            'flyer'             => 'http://localhost:8000/docs/images/audio/playlist1/hqdefault.jpg',
            'type'              => 'Spectacle',
            'country'           => 'Cameroun',
            'address'           => '12 Carrfour Waka Bafoussam',
            'organizer'         => 'El Che Production Center',
            'phone'             => '+237648751201',
            'phone2'            => '+237648754214',
            'email'             => 'eddysarah@lapine.com',
            'website'           => 'www.eddyetsarah.com',
            'time'              => '10 heures',
            'description'       => 'Le mariage de Ella avec Ma Sah, tout le Cameroun est invité au mariage du gars le plus superficiel du monde avec Miss Cameroun en personne',
            'date'              => Carbon\Carbon::createFromFormat('d/m/Y', '11/06/2019'),
            'status'            => 'published',
            'last_updated_by'   => 1
        ]);

        Event::create([
            'title'             => 'Naissance du petit DG',
            'slug'              => 'naissance-petit-dg',
            'flyer'             => 'http://localhost:8000/docs/images/audio/playlist1/hqdefault.jpg',
            'type'              => 'Festival',
            'country'           => 'Cameroun',
            'address'           => '12 Carrfour Waka Bafoussam',
            'organizer'         => 'El Che Production Center',
            'phone'             => '+237648751201',
            'phone2'            => '+237648754214',
            'email'             => 'eddysarah@lapine.com',
            'website'           => 'www.eddyetsarah.com',
            'time'              => '10 heures',
            'description'       => 'Le mariage de Ella avec Ma Sah, tout le Cameroun est invité au mariage du gars le plus superficiel du monde avec Miss Cameroun en personne',
            'date'              => Carbon\Carbon::createFromFormat('d/m/Y', '11/06/2019'),
            'status'            => 'published',
            'last_updated_by'   => 1
        ]);

        Event::create([
            'title'             => 'Anniversaire Samantha Fox',
            'slug'              => 'anniv-sam',
            'flyer'             => 'http://localhost:8000/docs/images/audio/playlist1/hqdefault.jpg',
            'type'              => 'Sortie en Boîte',
            'country'           => 'Espagne',
            'address'           => '12 Carrfour Waka Barcelona',
            'organizer'         => 'El Che Production Center',
            'phone'             => '+237648751201',
            'phone2'            => '+237648754214',
            'email'             => 'eddysarah@lapine.com',
            'website'           => 'www.eddyetsarah.com',
            'time'              => '10 heures',
            'description'       => 'Le mariage de Ella avec Ma Sah, tout le Cameroun est invité au mariage du gars le plus superficiel du monde avec Miss Cameroun en personne',
            'date'              => Carbon\Carbon::createFromFormat('d/m/Y', '21/11/2017'),
            'status'            => 'published',
            'last_updated_by'   => 1
        ]);
    }
}
