<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(AdminTableSeeder::class);
         $this->call(InfoAdminTableSeeder::class);
         $this->call(SocialAdminTableSeeder::class);
         $this->call(CategoryVideoTableSeeder::class);
         $this->call(VideosTableSeeder::class);
         $this->call(ShowTableSeeder::class);
         $this->call(SeasonTableSeeder::class);
         $this->call(VideoSeasonTableSeeder::class);
         $this->call(UserTableSeeder::class);
    }
}
