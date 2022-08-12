<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settlement extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    /**
     * The users that belong to the role.
     */
    public function zipcodes()
    {
        return $this->belongsToMany(Zipcode::class);
    }

    /**
     * Get the municipality associated with the zip code.
     */
    public function getByID($id)
    {
        return $this->where('id', $id)->first();
    }

}
