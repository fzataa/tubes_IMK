<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $guarded = [];


    use HasFactory;

    public function cart()
    {
        return $this->belongsTo(Cart2::class);
    }

    public function province()
    {
        return $this->belongsTo(Province::class);
    }
    
    public function city()
    {
        return $this->belongsTo(City::class);
    }

}
