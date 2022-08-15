<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\State;
use App\Models\Zipcode;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redis;

class ZipcodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($zipcode)
    {
        $data = Zipcode::where('zipcode', $zipcode)->first();

        // Check if zipcode exist
        if (!$data) {
            // if not, return a 404 error
            return abort(404);
        }

        $cachedZipcode = Redis::get('zipcode_' . $zipcode);

        // Check if request is already cached
        if (isset($cachedZipcode)) {

            // Return cached response for this zipcode
            $zipcode_response = json_decode($cachedZipcode, false);

        } else {

            // Format zipcode with 5 digits pattern
            $data->zipcode = str_pad($data->zipcode, 5, '0', STR_PAD_LEFT);

            $zipcode_response = [

                'zip_code' => "$data->zipcode",
                'locality' => remove_accents(mb_strtoupper($data->locality->name ?? "")),
                'federal_entity' => [
                    'key' => $data->state->id,
                    'name' => remove_accents(mb_strtoupper($data->state->name)),
                    'code' => $data->state->code,
                ],
                'settlements' =>
                $data->settlementsRelationship($data->id, $data->municipality_id, $data->zone_id)
                ,
                'municipality' => [
                    'key' => $data->municipality->key,
                    'name' => remove_accents(mb_strtoupper($data->municipality->name)),
                ],
            ];

            // Let's cache this response
            Redis::set('zipcode_' . $zipcode, json_encode($zipcode_response));

        }

        return response()->json($zipcode_response);
    }

    public function cache()
    {
        $datas = Zipcode::all();

        $response = [];

        foreach ($datas as $data) {

            $cachedZipcode = Redis::get('zipcode_' . $data->zipcode);

            if (isset($cachedZipcode)) {

                $response[$data->zipcode] = "CACHED ALREADY";

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

                $response[$data->zipcode] = "CACHED NOW";

            }

        }

        return response()->json(['status' => 'success cached', 'message' => $response]);

    }

    public function uncache()
    {

        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('route:clear');
        Artisan::call('view:clear');

        $caches = Redis::keys('*');

        foreach ($caches as $key) {
            $key = str_replace('laravel_database_', '', $key);
            Redis::del($key);
        }

        return response()->json(['status' => 'success', 'message' => "uncached", 'redis_keys' => Redis::keys('*')]);

    }

    public function testapi()
    {

        $zipcodes = Zipcode::inRandomOrder()
                ->limit(10)
                ->get();
        // $zipcodes = Zipcode::
        //     where('zipcode', '=', 78117)
        //     ->get();

        $result = [];

        foreach ($zipcodes as $zipcode) {
            $zipcode->zipcode = str_pad($zipcode->zipcode, 5, '0', STR_PAD_LEFT);
            $remote = Http::get('https://jobs.backbonesystems.io/api/zip-codes/' . $zipcode->zipcode);
            $local = Http::get('http://159.223.116.118/api/zipcode/' . $zipcode->zipcode);
            $result[$zipcode->zipcode] = [
                'equal' => $local->json() == $remote->json(),
            ];
        }

        return response()->json($result);

    }

}
