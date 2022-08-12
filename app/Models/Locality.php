<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locality extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name'];

    protected $table = 'localities';

    /**
     * Get the zip code that owns the locality.
     */
    public function zipcode()
    {
        return $this->hasOne(Zipcode::class);
    }

}
