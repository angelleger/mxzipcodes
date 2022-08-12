<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = ['key', 'name'];

    /**
     * Get the zip code that owns the city.
     */
    public function zipcode()
    {
        return $this->belongsTo(Zipcode::class);
    }
}
