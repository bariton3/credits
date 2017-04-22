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
        \App\User::create([
            'name' => 'User 1',
            'email' => 'user1@example@com',
            'password' => bcrypt('12345678')
        ]);

        \App\User::create([
            'name' => 'User 2',
            'email' => 'user2@example@com',
            'password' => bcrypt('12345678')
        ]);
    }
}
