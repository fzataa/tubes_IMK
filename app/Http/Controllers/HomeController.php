<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\Cart;
use App\Models\review;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pro = Product::all();

        $num = 0;
        $iid = 0;
        $sum = 0;
        $nil = [];
        $idd = [];
        $temp = [];

        foreach ($pro as $p) {
            $high = Transaction::where('product_id', $p->id)->get();
            $hc = $high->count();
            if ($hc > $num) {
                $num = $hc;
                $iid = $p->id;
            }
        }

        foreach ($pro as $p) {
            $rev = Review::where('product_id', $p->id)->get();
            $revtemp = Review::where('product_id', $p->id)->first();
            $revcount = $rev->count();
            if ($revtemp['product_id'] == $p->id) {
                foreach ($rev as $r) {
                    $sum += $r->rate;
                    array_push($temp, $r->rate);
                }
            }
            if ($revcount == 0) {
                continue;
            }
            $sum = $sum/$revcount;
            // if ($p->id == 3) {
            //     dd($sum);
            // }
            if ($sum > 75) {
                array_push($nil, $sum);
                array_push($idd, $p->id);
            }
            $sum = 0;
        }

        // dd($idd, $nil);

        if(!auth()->guest()){
            
            $cart = Cart::where('user_id', auth()->user()->id)->get();

            return view('index', [
                'prodhead' => Product::latest()->get(),
                'prod' => Product::all(),
                'product' => $nil,//Product::all(),//->where('rate', '=', '100'),
                'product_idd' => $idd,//Product::all(),//->where('rate', '=', '100'),
                'hightrate' => Product::where('id', $iid)->first(),
                'pieces' => $num,
                'review' => Review::paginate(4),
                'cart' => $cart->count(),
            ]);

        }else {

            return view('index', [
                'prodhead' => Product::latest()->get(),
                'prod' => Product::all(),
                'product' => $nil,//Product::all(),//->where('rate', '=', '100'),
                'product_idd' => $idd,//Product::all(),//->where('rate', '=', '100'),
                'hightrate' => Product::where('id', $iid)->first(),
                'pieces' => $num,
                'review' => Review::paginate(4),
            ]);
            
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        //
    }

}
