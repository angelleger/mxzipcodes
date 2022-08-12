<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settlementzipcode extends Model
{
    use HasFactory;

    protected $fillable = ['settlement_id', 'zipcode_id', 'key', 'municipality_id', 'zone_id', 'settlementtype_id'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'settlement_zipcode';
}
