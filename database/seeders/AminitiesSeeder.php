<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AminitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('aminities')->insert([
            ['name' => "GYM"],
            ['name' => "SWIMMING POOL"],
            ['name' => "LIFT"],
            ['name' => "GARDEN"],
        ]);
    }
}
// \App\Models\PropertyOwnerModel::factory(10)->create();
// \App\Models\AminitiesModel::factory(10)->create();
