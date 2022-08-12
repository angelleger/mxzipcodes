<?php

namespace App\Imports;

use App\Models\Municipality;
use App\Models\Settlement;
use App\Models\Settlementtype;
use App\Models\Settlementzipcode;
use App\Models\Zipcode;
use App\Models\State;
use App\Models\Zone;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Row;

class ZipcodesImport implements OnEachRow, WithHeadingRow, WithUpserts
{

    /**
     * @return string|array
     */
    public function uniqueBy()
    {
        return 'zipcode';
    }

    public function onRow(Row $row)
    {

        $rowIndex = $row->getIndex();
        $row = $row->toArray();

        if (array_key_exists('d_codigo', $row)) {

            $municipality = Municipality::where('name', $row['d_mnpio'])->where('key', '=', $row['c_mnpio'])->first()->id ?? null;
            $locality = State::where('name', '=', $row['d_ciudad'])->first()->id ?? null;
            $zone = Zone::where('name', '=', $row['d_zona'])->first()->id ?? null;
            $settlement = Settlement::where('name', '=', $row['d_asenta'])->first()->id ?? null;
            $settlementtype = Settlementtype::where('name', '=', $row['d_tipo_asenta'])->first()->id ?? null;

            $zipcode = Zipcode::where('zipcode', '=', $row['d_codigo'])->first();
            if (!$zipcode) {
                $zipcode = Zipcode::create([
                    'zipcode' => $row['d_codigo'],
                    'locality_id' => $locality,
                    'municipality_id' => $municipality,
                    'zone_id' => $zone,
                    'state_id' => $row['c_estado'],
                ]);
            }

            Settlementzipcode::create([
                'zipcode_id' => $zipcode->id,
                'settlement_id' => $settlement,
                'municipality_id' => $municipality,
                'settlementtype_id' => $settlementtype,
                'zone_id' => $zone,
                'key' => $row['id_asenta_cpcons'],
            ]);

        }

    }

}
