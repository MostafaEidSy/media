<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\Models\User::create([
            'name'          => 'User Normal',
            'email'         => 'user@user.com',
            'password'      => bcrypt('123123123')
        ]);
    }
}
