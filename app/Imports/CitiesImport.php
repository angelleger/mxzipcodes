<?php

namespace App\Imports;

use App\Models\City;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CitiesImport implements ToModel, WithHeadingRow
{

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        if (array_key_exists('c_cve_ciudad', $row) && $row['d_ciudad']) {

            if (!City::where('key', $row['c_cve_ciudad'])->where('name', '=', $row['d_ciudad'])->exists()) {
                return new City([
                    'name' => $row['d_ciudad'],
                    'key' => $row['c_cve_ciudad'],
                ]);
            }

        }
    }
}
