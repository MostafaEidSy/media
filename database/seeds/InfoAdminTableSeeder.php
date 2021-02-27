<?php

use Illuminate\Database\Seeder;

class InfoAdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $info = \App\Models\InfoAdmin::create([
            'admin_id'              => \App\Models\Admin::where('id', 1)->first()->id,
        ]);
    }
}
