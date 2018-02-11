<?php

use Illuminate\Database\Seeder;

class data extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345'),
            'created_at' => '2018-01-30 22:55:27',
            'updated_at' => '2018-01-30 22:55:28',

        ]);
    }
}
