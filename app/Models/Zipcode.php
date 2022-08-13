<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zipcode extends Model
{
    use HasFactory;

    public $settlement;

    public $settlementtype;

    public $zone;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['zipcode', 'locality_id', 'municipality_id', 'state_id', 'zone_id'];

    public function __construct()
    {
        $this->settlement = new Settlement;
        $this->settlementtype = new Settlementtype;
        $this->zone = new Zone;
    }

    /**
     * Get the municipality associated with the zip code.
     */
    public function municipality()
    {

        return $this->belongsTo(Municipality::class);
    }

    /**
     * Get the municipality associated with the zip code.
     */
    public function locality()
    {
        return $this->belongsTo(Locality::class, 'locality_id', 'id');
    }

    /**
     * Get the municipality associated with the zip code.
     */
    public function city()
    {
        return $this->hasOne(City::class);
    }

    /**
     * Get the municipality associated with the zip code.
     */
    public function state()
    {
        return $this->belongsTo(State::class);
    }

    /**
     * The settlements that belong to the zipcode.
     */
    public function settlements()
    {
        return $this->belongsToMany(Settlement::class);

    }

    public function settlementsRelationship($zipcode_id, $municipality_id, $zone_id)
    {

        $relationship = Settlementzipcode::where('zipcode_id', '=', $zipcode_id)
            ->where('municipality_id', '=', $municipality_id)
            ->orderBy('key', 'asc')
            ->get();

        $settlements = [];

        foreach ($relationship as $rel) {

            $settlement_name = remove_accents(mb_strtoupper($this->settlement->getByID($rel->settlement_id)->name));
            $zone_name = mb_strtoupper($this->zone->getByID($rel->zone_id)->name);
            $settlementtype_name = ucfirst($this->settlementtype->getByID($rel->settlementtype_id)->name);

            $settlements[] = [
                'key' => $rel->key,
                'name' => $settlement_name,
                'zone_type' => $zone_name,
                'settlement_type' => [
                    'name' => $settlementtype_name,
                ],
            ];
        }

        // this will help to make the exact order of the API we are replicating from
        // foreach ($settlements as $key => $value) {
        //     if ($settlements[$key]['key'] < 1000) {
        //         $new_value = $settlements[$key];
        //         unset($settlements[$key]);
        //         $settlements[] = $new_value;
        //     }
        // }

        // $settlements = array_values($settlements);

        return $settlements;

    }
}
