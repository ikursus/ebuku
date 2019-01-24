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
        # User 1
        DB::table('users')->insert([
            'name' => 'Ali Baba',
            'email' => 'ali@gmail.com',
            'password' => bcrypt('ali')
        ]);

        # User 2
        DB::table('users')->insert([
            'name' => 'Abu Baba',
            'email' => 'abu@gmail.com',
            'password' => bcrypt('abu')
        ]);
    }
}
