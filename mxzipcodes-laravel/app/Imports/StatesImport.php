<?php

namespace App\Imports;

use App\Models\State;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class StatesImport implements ToModel, WithUpserts, WithHeadingRow
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

        if (array_key_exists('d_estado', $row)) {
            return new State([
                'name' => $row['d_estado'],
                'id' => $row['c_estado'],
            ]);
        }
    }
}
