<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transaction;
use Carbon\Carbon;

class ChartController extends Controller
{
    public function index()
    {
 
        Transaction::select(\DB::raw("COUNT(*) as count"), \DB::raw("MONTHNAME(created_at) as month_name"))
        ->where('product_id')
        ->groupBy('month_name')
        ->orderBy('count')
        ->get();
        $bar = Transaction::select(\DB::raw("COUNT(*) as count"))
                // ->whereDate('created_at', Carbon::now())
                ->groupBy('product_id')
                ->orderBy('count')
                ->get();
        return view('dump', [
            'pieChart' => $bar,
            // 'product' => $bar->product->name,
        ]);
    }
}
