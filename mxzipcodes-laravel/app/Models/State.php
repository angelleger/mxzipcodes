<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name'];

    /**
     * Get the zip code that owns the city.
     */
    public function zipcode()
    {
        return $this->hasOne(Zipcode::class);
    }
}
