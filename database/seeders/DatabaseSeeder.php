<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SettlementsTableSeeder::class);
        $this->call(SettlementtypesTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(MunicipalitiesTableSeeder::class);
        $this->call(StatesTableSeeder::class);
        $this->call(ZonesTableSeeder::class);
      //  $this->call(ZipcodesTableSeeder::class);
       // $this->call(SettlementZipcodeTableSeeder::class);
    }
}
