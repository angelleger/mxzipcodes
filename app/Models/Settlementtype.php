<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settlementtype extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name'];

    /**
     *
     */
    public function settlement()
    {
        return $this->belongsTo(Settlement::class);
    }

    public function getByID($id)
    {
        return $this->where('id', $id)->first();
    }
}
