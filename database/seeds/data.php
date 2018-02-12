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
        // check if table users is empty
        if(DB::table('users')->get()->count() == 0){

            DB::table('users')->insert([

                [
                    'name' => 'Admin',
                    'email' => 'admin@gmail.com',
                    'password' => bcrypt('12345'),
                    'role' => 1,
                ],
                [
                    'name' => 'Hiepgays',
                    'email' => 'hiepgays@gmail.com',
                    'password' => bcrypt('12345'),
                    'role' => 0,
                ]
            ]);

        } else { echo "\e[31mTable is not empty, therefore NOT "; }

    }
}
