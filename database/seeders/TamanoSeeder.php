<?php

namespace Database\Seeders;

use App\Models\Tamano;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Factories\Sequence;

class TamanoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create();

        foreach(range(1, 20) as $i){
            DB::table('tamanos')->insert([
                'name' => $faker->sentence(1),
            ]);
        }


    }
}
