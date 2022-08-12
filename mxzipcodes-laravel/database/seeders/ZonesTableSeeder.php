<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ZonesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('zones')->delete();
        
        \DB::table('zones')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Urbano',
                'created_at' => '2022-08-11 15:36:21',
                'updated_at' => '2022-08-11 15:37:08',
            ),
            1 => 
            array (
                'id' => 99,
                'name' => 'Rural',
                'created_at' => '2022-08-11 15:36:21',
                'updated_at' => '2022-08-11 15:37:08',
            ),
            2 => 
            array (
                'id' => 5873,
                'name' => 'Semiurbano',
                'created_at' => '2022-08-11 15:36:22',
                'updated_at' => '2022-08-11 15:37:07',
            ),
        ));
        
        
    }
}