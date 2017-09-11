<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
        $this->call(PagesTableSeeder::class);
        $this->call(ServicesTableSeeder::class);
        $this->call(PlaylistTableSeeder::class);
        $this->call(EventTypeTableSeeder::class);
        // $this->call(EventTableSeeder::class);
        // $this->call(SongTableSeeder::class);
        // $this->call(VideoTableSeeder::class);
    }
}
