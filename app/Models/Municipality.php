<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
    use HasFactory;

    protected $fillable = ['key', 'name'];

    /**
     * Get the zip code that owns the municipality.
     */
    public function zipcode()
    {
        return $this->hasOne(Zipcode::class);
    }

}
