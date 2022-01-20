<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class EtapaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $name_etapa =[
            'FS',
            'GER-0',
            '1',
            '2',
            '3',
            '4',
            'pre inj',
            'FI',
            'I1',
            'I2',
            'I3',
            'I4',
            'VITRINA'
        ];
        $faker = Faker::create();
        foreach($name_etapa as $key => $value)
            DB::table('etapas')->insert([
                'name' => $value,
                'duracionEstimada' => $faker->numberBetween(1, 12)
            ]);
        }
}
