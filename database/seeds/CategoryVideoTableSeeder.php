<?php

use Illuminate\Database\Seeder;

class CategoryVideoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fac = \Faker\Factory::create();
        $name = ['Drama', 'Action', 'Thriller 2', 'Thriller', 'Action 2', 'Horror', 'Action 3', 'Drama 2', 'Drama 3', 'Horror 2'];
        for ($i=0; $i < count($name); $i++){
            $category = \App\Models\CategoryVideo::create([
                'name'              => $name[$i],
                'description'       => $fac->paragraph,
                'status'            => mt_rand(0,1),
                'slug'              => strtolower(str_replace(' ', '-', $name[$i]))
            ]);
        }
    }
}
