<?php

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Admin::create([
            'first_name'            => 'Mostafa',
            'last_name'             => 'Eid',
            'username'              => 'MostafaEidSy',
            'email'                 => 'admin@admin.com',
            'password'              => bcrypt('123123123'),
            'avatar'                => 'mostafa.jpg'
        ]);
    }
}
