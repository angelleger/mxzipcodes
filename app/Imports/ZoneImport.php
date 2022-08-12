<?php

namespace App\Imports;

use App\Models\Zone;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class ZoneImport implements ToModel, WithUpserts, WithHeadingRow
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

        if (array_key_exists('d_zona', $row)) {
            return new Zone([
                'name' => $row['d_zona'],
            ]);
        }
    }
}
