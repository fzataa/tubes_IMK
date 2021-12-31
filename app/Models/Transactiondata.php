<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use DB;

class Transactiondata extends Model
{

    protected $guarded = [];

    use HasFactory;

    public static function getAllTransactionData($dfrom, $dto) 
    {
        $data = DB::table('transactiondatas')
            ->select('id', 'name', 'phone', 'e_mail', 'product_name', 'quantity', 'address_location', 'city', 'province', 'courier', 'total', 'status', 'created_at')
            ->whereDate('created_at', '>=', $dfrom)
            ->whereDate('created_at', '<=', $dto)
            ->get()->toArray();
        return $data;
    }

}
