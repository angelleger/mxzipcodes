<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SettlementtypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('settlementtypes')->delete();
        
        \DB::table('settlementtypes')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Aeropuerto',
                'created_at' => '2022-08-11 13:51:39',
                'updated_at' => '2022-08-11 13:52:27',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Barrio',
                'created_at' => '2022-08-11 13:51:39',
                'updated_at' => '2022-08-11 13:52:28',
            ),
            2 => 
            array (
                'id' => 4,
                'name' => 'Campamento',
                'created_at' => '2022-08-11 13:51:49',
                'updated_at' => '2022-08-11 13:52:21',
            ),
            3 => 
            array (
                'id' => 9,
                'name' => 'Colonia',
                'created_at' => '2022-08-11 13:51:39',
                'updated_at' => '2022-08-11 13:52:28',
            ),
            4 => 
            array (
                'id' => 10,
                'name' => 'Condominio',
                'created_at' => '2022-08-11 13:51:39',
                'updated_at' => '2022-08-11 13:52:27',
            ),
            5 => 
            array (
                'id' => 11,
                'name' => 'Congregación',
                'created_at' => '2022-08-11 13:51:41',
                'updated_at' => '2022-08-11 13:52:26',
            ),
            6 => 
            array (
                'id' => 12,
                'name' => 'Conjunto habitacional',
                'created_at' => '2022-08-11 13:51:40',
                'updated_at' => '2022-08-11 13:52:26',
            ),
            7 => 
            array (
                'id' => 15,
                'name' => 'Ejido',
                'created_at' => '2022-08-11 13:51:39',
                'updated_at' => '2022-08-11 13:52:28',
            ),
            8 => 
            array (
                'id' => 16,
                'name' => 'Estación',
                'created_at' => '2022-08-11 13:51:43',
                'updated_at' => '2022-08-11 13:52:26',
            ),
            9 => 
            array (
                'id' => 17,
                'name' => 'Equipamiento',
                'created_at' => '2022-08-11 13:51:39',
                'updated_at' => '2022-08-11 13:52:27',
            ),
            10 => 
            array (
                'id' => 18,
                'name' => 'Exhacienda',
                'created_at' => '2022-08-11 13:51:41',
                'updated_at' => '2022-08-11 13:52:27',
            ),
            11 => 
            array (
                'id' => 20,
                'name' => 'Finca',
                'created_at' => '2022-08-11 13:51:43',
                'updated_at' => '2022-08-11 13:52:24',
            ),
            12 => 
            array (
                'id' => 21,
                'name' => 'Fraccionamiento',
                'created_at' => '2022-08-11 13:51:39',
                'updated_at' => '2022-08-11 13:52:28',
            ),
            13 => 
            array (
                'id' => 23,
                'name' => 'Granja',
                'created_at' => '2022-08-11 13:51:39',
                'updated_at' => '2022-08-11 13:52:26',
            ),
            14 => 
            array (
                'id' => 24,
                'name' => 'Hacienda',
                'created_at' => '2022-08-11 13:51:39',
                'updated_at' => '2022-08-11 13:52:28',
            ),
            15 => 
            array (
                'id' => 26,
                'name' => 'Parque industrial',
                'created_at' => '2022-08-11 13:51:52',
                'updated_at' => '2022-08-11 13:52:24',
            ),
            16 => 
            array (
                'id' => 27,
                'name' => 'Poblado comunal',
                'created_at' => '2022-08-11 13:51:53',
                'updated_at' => '2022-08-11 13:52:26',
            ),
            17 => 
            array (
                'id' => 28,
                'name' => 'Pueblo',
                'created_at' => '2022-08-11 13:51:39',
                'updated_at' => '2022-08-11 13:52:28',
            ),
            18 => 
            array (
                'id' => 29,
                'name' => 'Ranchería',
                'created_at' => '2022-08-11 13:51:39',
                'updated_at' => '2022-08-11 13:52:28',
            ),
            19 => 
            array (
                'id' => 30,
                'name' => 'Residencial',
                'created_at' => '2022-08-11 13:51:42',
                'updated_at' => '2022-08-11 13:52:26',
            ),
            20 => 
            array (
                'id' => 31,
                'name' => 'Unidad habitacional',
                'created_at' => '2022-08-11 13:51:39',
                'updated_at' => '2022-08-11 13:52:28',
            ),
            21 => 
            array (
                'id' => 32,
                'name' => 'Villa',
                'created_at' => '2022-08-11 13:52:02',
                'updated_at' => '2022-08-11 13:52:12',
            ),
            22 => 
            array (
                'id' => 33,
                'name' => 'Zona comercial',
                'created_at' => '2022-08-11 13:51:39',
                'updated_at' => '2022-08-11 13:52:26',
            ),
            23 => 
            array (
                'id' => 34,
                'name' => 'Zona federal',
                'created_at' => '2022-08-11 13:51:39',
                'updated_at' => '2022-08-11 13:52:27',
            ),
            24 => 
            array (
                'id' => 37,
                'name' => 'Zona industrial',
                'created_at' => '2022-08-11 13:51:39',
                'updated_at' => '2022-08-11 13:52:27',
            ),
            25 => 
            array (
                'id' => 40,
                'name' => 'Puerto',
                'created_at' => '2022-08-11 13:51:40',
                'updated_at' => '2022-08-11 13:52:27',
            ),
            26 => 
            array (
                'id' => 45,
                'name' => 'Paraje',
                'created_at' => '2022-08-11 13:51:39',
                'updated_at' => '2022-08-11 13:52:24',
            ),
            27 => 
            array (
                'id' => 46,
                'name' => 'Zona naval',
                'created_at' => '2022-08-11 13:51:42',
                'updated_at' => '2022-08-11 13:52:14',
            ),
            28 => 
            array (
                'id' => 47,
                'name' => 'Zona militar',
                'created_at' => '2022-08-11 13:51:39',
                'updated_at' => '2022-08-11 13:52:25',
            ),
            29 => 
            array (
                'id' => 48,
                'name' => 'Rancho',
                'created_at' => '2022-08-11 13:51:39',
                'updated_at' => '2022-08-11 13:52:28',
            ),
        ));
        
        
    }
}