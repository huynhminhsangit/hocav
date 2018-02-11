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
                    'name' => 'admin',
                    'email' => 'admin@gmail.com',
                    'password' => bcrypt('12345'),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                    'role' => 1,
                ],
                [
                    'name' => 'hiepgays',
                    'email' => 'hiepgays@gmail.com',
                    'password' => bcrypt('12345'),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                    'role' => 0,
                ]
            ]);

        } else { echo "\e[31mTable is not empty, therefore NOT "; }

    }
}
