<?php

namespace App\Imports;

use App\Models\Settlementtype;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class SettlementtypesImport implements ToModel, WithUpserts, WithHeadingRow
{

    /**
     * @return string|array
     */
    public function uniqueBy()
    {
        return ['id'];
    }

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {

        if (array_key_exists('c_tipo_asenta', $row)) {
            return new Settlementtype([
                'name' => $row['d_tipo_asenta'],
                'id' => $row['c_tipo_asenta'],
            ]);
        }
    }
}
