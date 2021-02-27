<?php

use Illuminate\Database\Seeder;

class SocialAdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = \App\Models\SocialAdmin::create([
            'admin_id'      => \App\Models\Admin::where('id', 1)->first()->id,
        ]);
    }
}
