<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([[
            'name' => 'Fulano 1',
            'email' => 'fulano1@email.com',
            'password' => bcrypt('123456'),
        ],[
            'name' => 'Fulano 2',
            'email' => 'fulano2@email.com',
            'password' => bcrypt('123456'),
        ]]);
    }
}
