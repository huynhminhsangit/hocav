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
                    'name' => 'ad',
                    'email' => 'admin@app.com',
                    'password' => bcrypt('password'),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'k',
                    'email' => 'k@app.com',
                    'password' => bcrypt('password'),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'c',
                    'email' => 'c@app.com',
                    'password' => bcrypt('password'),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]

            ]);

        } else { echo "\e[31mTable is not empty, therefore NOT "; }

    }
}
