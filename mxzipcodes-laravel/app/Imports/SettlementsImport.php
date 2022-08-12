<?php

namespace App\Imports;

use App\Models\Settlement;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Row;

class SettlementsImport implements ToModel, WithUpserts, WithHeadingRow
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

        if (array_key_exists('d_asenta', $row)) {
            return new Settlement([
                'name' => $row['d_asenta'],
            ]);
        }
    }
}
