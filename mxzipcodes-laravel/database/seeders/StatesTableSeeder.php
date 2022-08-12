<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StatesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('states')->delete();
        
        \DB::table('states')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Aguascalientes',
                'code' => NULL,
                'created_at' => '2022-08-11 15:39:34',
                'updated_at' => '2022-08-11 15:39:34',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Baja California',
                'code' => NULL,
                'created_at' => '2022-08-11 15:39:34',
                'updated_at' => '2022-08-11 15:39:35',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Baja California Sur',
                'code' => NULL,
                'created_at' => '2022-08-11 15:39:35',
                'updated_at' => '2022-08-11 15:39:35',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Campeche',
                'code' => NULL,
                'created_at' => '2022-08-11 15:39:35',
                'updated_at' => '2022-08-11 15:39:36',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Coahuila de Zaragoza',
                'code' => NULL,
                'created_at' => '2022-08-11 15:39:36',
                'updated_at' => '2022-08-11 15:39:37',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Colima',
                'code' => NULL,
                'created_at' => '2022-08-11 15:39:37',
                'updated_at' => '2022-08-11 15:39:37',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Chiapas',
                'code' => NULL,
                'created_at' => '2022-08-11 15:39:37',
                'updated_at' => '2022-08-11 15:39:40',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Chihuahua',
                'code' => NULL,
                'created_at' => '2022-08-11 15:39:40',
                'updated_at' => '2022-08-11 15:39:44',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Ciudad de México',
                'code' => NULL,
                'created_at' => '2022-08-11 15:39:44',
                'updated_at' => '2022-08-11 15:39:44',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Durango',
                'code' => NULL,
                'created_at' => '2022-08-11 15:39:44',
                'updated_at' => '2022-08-11 15:39:47',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Guanajuato',
                'code' => NULL,
                'created_at' => '2022-08-11 15:39:47',
                'updated_at' => '2022-08-11 15:39:50',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Guerrero',
                'code' => NULL,
                'created_at' => '2022-08-11 15:39:50',
                'updated_at' => '2022-08-11 15:39:52',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Hidalgo',
                'code' => NULL,
                'created_at' => '2022-08-11 15:39:52',
                'updated_at' => '2022-08-11 15:39:54',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Jalisco',
                'code' => NULL,
                'created_at' => '2022-08-11 15:39:54',
                'updated_at' => '2022-08-11 15:39:56',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'México',
                'code' => NULL,
                'created_at' => '2022-08-11 15:39:56',
                'updated_at' => '2022-08-11 15:39:59',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'Michoacán de Ocampo',
                'code' => NULL,
                'created_at' => '2022-08-11 15:39:59',
                'updated_at' => '2022-08-11 15:40:03',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'Morelos',
                'code' => NULL,
                'created_at' => '2022-08-11 15:40:03',
                'updated_at' => '2022-08-11 15:40:04',
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'Nayarit',
                'code' => NULL,
                'created_at' => '2022-08-11 15:40:04',
                'updated_at' => '2022-08-11 15:40:04',
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'Nuevo León',
                'code' => NULL,
                'created_at' => '2022-08-11 15:40:04',
                'updated_at' => '2022-08-11 15:40:06',
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'Oaxaca',
                'code' => NULL,
                'created_at' => '2022-08-11 15:40:06',
                'updated_at' => '2022-08-11 15:40:08',
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'Puebla',
                'code' => NULL,
                'created_at' => '2022-08-11 15:40:08',
                'updated_at' => '2022-08-11 15:40:10',
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'Querétaro',
                'code' => NULL,
                'created_at' => '2022-08-11 15:40:10',
                'updated_at' => '2022-08-11 15:40:11',
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'Quintana Roo',
                'code' => NULL,
                'created_at' => '2022-08-11 15:40:11',
                'updated_at' => '2022-08-11 15:40:12',
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'San Luis Potosí',
                'code' => NULL,
                'created_at' => '2022-08-11 15:40:12',
                'updated_at' => '2022-08-11 15:40:14',
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'Sinaloa',
                'code' => NULL,
                'created_at' => '2022-08-11 15:40:14',
                'updated_at' => '2022-08-11 15:40:15',
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'Sonora',
                'code' => NULL,
                'created_at' => '2022-08-11 15:40:15',
                'updated_at' => '2022-08-11 15:40:18',
            ),
            26 => 
            array (
                'id' => 27,
                'name' => 'Tabasco',
                'code' => NULL,
                'created_at' => '2022-08-11 15:40:18',
                'updated_at' => '2022-08-11 15:40:19',
            ),
            27 => 
            array (
                'id' => 28,
                'name' => 'Tamaulipas',
                'code' => NULL,
                'created_at' => '2022-08-11 15:40:19',
                'updated_at' => '2022-08-11 15:40:20',
            ),
            28 => 
            array (
                'id' => 29,
                'name' => 'Tlaxcala',
                'code' => NULL,
                'created_at' => '2022-08-11 15:40:20',
                'updated_at' => '2022-08-11 15:40:21',
            ),
            29 => 
            array (
                'id' => 30,
                'name' => 'Veracruz de Ignacio de la Llave',
                'code' => NULL,
                'created_at' => '2022-08-11 15:40:21',
                'updated_at' => '2022-08-11 15:40:24',
            ),
            30 => 
            array (
                'id' => 31,
                'name' => 'Yucatán',
                'code' => NULL,
                'created_at' => '2022-08-11 15:40:24',
                'updated_at' => '2022-08-11 15:40:24',
            ),
            31 => 
            array (
                'id' => 32,
                'name' => 'Zacatecas',
                'code' => NULL,
                'created_at' => '2022-08-11 15:40:24',
                'updated_at' => '2022-08-11 15:40:25',
            ),
        ));
        
        
    }
}