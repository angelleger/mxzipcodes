<?php

namespace App\Imports;

use App\Models\Locality;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class LocalitiesImport implements ToModel, WithUpserts, WithHeadingRow
{

    /**
     * @return string|array
     */
    public function uniqueBy()
    {
        return ['name'];
    }

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        if (array_key_exists('d_ciudad', $row) && $row['d_ciudad'] != "") {
            return new Locality([
                'name' => $row['d_ciudad'],
            ]);
        }

    }
}
