<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Address;
use App\Models\Cart;
use App\Models\Product;

class Transaction extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = "transactions";

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function cart(){
        return $this->belongsTo(Cart2::class);
    }
    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function address(){
        return $this->belongsTo(Address::class);
    }




}
