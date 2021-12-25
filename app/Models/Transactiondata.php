<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Transactiondata extends Model
{

    protected $guarded = [];

    use HasFactory;

    public static function getAllTransactionData() 
    {
        $data = DB::table('transactiondatas')
            ->select('id', 'name', 'phone', 'e-mail', 'product-name', 'quantity', 'address-location', 'city', 'province', 'courier', 'total', 'status', 'created_at')->get()->toArray();
        return $data;
    }


}
