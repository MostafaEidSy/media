<?php

use Illuminate\Database\Seeder;

class SeasonTableSeeder extends Seeder
{
    public function run()
    {
        $fac = \Faker\Factory::create();

        $season = \App\Models\Season::create([
            'show_id'           => 1,
            'name'              => 'Season 1',
            'duration'          => '2h 34m',
            'date_season'       => $fac->date('Y-m-d'),
            'description'       => $fac->paragraph,
            'image'                 => '11.jpg'
        ]);
        $season = \App\Models\Season::create([
            'show_id'           => 1,
            'name'              => 'Season 2',
            'duration'          => '4h 34m',
            'date_season'       => $fac->date('Y-m-d'),
            'description'       => $fac->paragraph,
            'image'                 => '11.jpg'
        ]);
        $season = \App\Models\Season::create([
            'show_id'           => 2,
            'name'              => 'Season 1',
            'duration'          => '1h 4m',
            'date_season'       => $fac->date('Y-m-d'),
            'description'       => $fac->paragraph,
            'image'                 => '11.jpg'
        ]);
        $season = \App\Models\Season::create([
            'show_id'           => 2,
            'name'              => 'Season 2',
            'duration'          => '2h 3m',
            'date_season'       => $fac->date('Y-m-d'),
            'description'       => $fac->paragraph,
            'image'                 => '11.jpg'
        ]);
    }
}
