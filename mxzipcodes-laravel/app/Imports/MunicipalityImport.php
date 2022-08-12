<?php

namespace App\Imports;

use App\Models\Municipality;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MunicipalityImport implements ToModel, WithHeadingRow
{

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        if (array_key_exists('c_mnpio', $row)) {

            if (!Municipality::where('name', $row['d_mnpio'])->where('key', '=', $row['c_mnpio'])->first()) {
                return new Municipality([
                    'name' => $row['d_mnpio'],
                    'key' => $row['c_mnpio'],
                ]);
            }

        }
    }
}
