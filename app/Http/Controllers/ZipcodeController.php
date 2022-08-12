<?php

namespace App\Http\Controllers;

use App\Imports\CitiesImport;
use App\Imports\LocalitiesImport;
use App\Imports\MunicipalityImport;
use App\Imports\SettlementsImport;
use App\Imports\StatesImport;
use App\Imports\ZipcodesImport;
use App\Imports\ZoneImport;
use App\Models\Zipcode;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ZipcodeController extends Controller
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function index()
    {
        $zipcodes = Zipcode::get();

        return view('zipcodes', compact('zipcodes'));
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function import()
    {

        Excel::import(new ZoneImport, request()->file('file'));
        Excel::import(new LocalitiesImport, request()->file('file'));
        Excel::import(new MunicipalityImport, request()->file('file'));
        Excel::import(new SettlementtypesImport, request()->file('file'));
        Excel::import(new CitiesImport, request()->file('file'));
        Excel::import(new StatesImport, request()->file('file'));
        Excel::import(new SettlementsImport, request()->file('file'));
        Excel::import(new ZipcodesImport, request()->file('file'));

        return back();
    }
}
