<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\State;
use App\Models\Zipcode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class ZipcodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $zipcode)
    {
        $data = Zipcode::where('zipcode', $zipcode)->first();

        // check if zipcode exist
        if (!$data) {
            return abort(404);
        }

        $cachedZipcode = Redis::get('zipcode_' . $zipcode);

        if (isset($cachedZipcode)) {

            $zipcode_response = json_decode($cachedZipcode, false);

        } else {

            $data->zipcode = str_pad($data->zipcode, 5, '0', STR_PAD_LEFT);

            $zipcode_response = [

                'zip_code' => "$data->zipcode",
                'locality' => mb_strtoupper($data->locality->name ?? ""),
                'federal_entity' => [
                    'key' => $data->state->id,
                    'name' => mb_strtoupper($data->state->name),
                    'code' => $data->state->code,
                ],
                'settlements' =>
                $data->settlementsRelationship($data->id, $data->municipality_id, $data->zone_id)
                ,
                'municipality' => [
                    'key' => $data->municipality->key,
                    'name' => mb_strtoupper($data->municipality->name),
                ],
            ];

            Redis::set('zipcode_' . $zipcode, json_encode($zipcode_response));

        }

        return response()->json($zipcode_response);
    }

    public function cache()
    {
        $datas = Zipcode::all();


        foreach ($datas as $data){


            $cachedZipcode = Redis::get('zipcode_' . $data->zipcode);

            if (isset($cachedZipcode)) {

                echo "$data->zipcode - CACHED ALREADY";
                echo "\n";


            } else {

                $data->zipcode = str_pad($data->zipcode, 5, '0', STR_PAD_LEFT);

                $zipcode_response = [

                    'zip_code' => "$data->zipcode",
                    'locality' => mb_strtoupper($data->locality->name ?? ""),
                    'federal_entity' => [
                        'key' => $data->state->id,
                        'name' => mb_strtoupper($data->state->name),
                        'code' => $data->state->code,
                    ],
                    'settlements' =>
                    $data->settlementsRelationship($data->id, $data->municipality_id, $data->zone_id)
                    ,
                    'municipality' => [
                        'key' => $data->municipality->key,
                        'name' => mb_strtoupper($data->municipality->name),
                    ],
                ];

                Redis::set('zipcode_' . $data->zipcode, json_encode($zipcode_response));

               echo "$data->zipcode - CACHED";
               echo "\n";


            }


        }
    }

}
