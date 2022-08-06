<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertyOwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('property_owner')->insert([
            [
                'name' => "Ajay Mishra",
                'email' => "ajaymishra@gmail.com"
            ],[
                'name' => "Vijay Mishra",
                'email' => "vijaymishra@gmail.com"
            ],[
                'name' => "Mehul Vaghela",
                'email' => "mehulvaghela@gmail.com"
            ],[
                'name' => "Rahul Patel",
                'email' => "rahulpatel@gmail.com"
            ],[
                'name' => "Mehul Govani",
                'email' => "mehulgovani@gmail.com"
            ]
        ]);
    }
}
