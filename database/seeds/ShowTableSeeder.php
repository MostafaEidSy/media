<?php

use Illuminate\Database\Seeder;

class ShowTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fac = \Faker\Factory::create();
        $show = \App\Models\Show::create([
            'title'                 => 'Demo 1',
            'quality'               => 'Full HD',
            'description'           => $fac->paragraph,
            'language'              => 'English',
            'banner'                => '1980-2021-02-22-210402.jpg',
            'slug'                  => 'demo-1',
            'image'                 => '11.jpg',
            'category_id'           => 1,
            'content'               => $fac->paragraph . $fac->paragraph
        ]);
        $show = \App\Models\Show::create([
            'title'                 => 'Demo 2',
            'quality'               => 'HD',
            'description'           => $fac->paragraph,
            'language'              => 'English',
            'banner'                => '1980-2021-02-22-210402.jpg',
            'slug'                  => 'demo-2',
            'image'                 => '11.jpg',
            'content'               => $fac->paragraph . $fac->paragraph
        ]);
    }
}
