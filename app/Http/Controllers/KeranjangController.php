<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Cart2;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class KeranjangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $car = Cart::all()->where('user_id', auth()->user()->id);

    
        return view('content.keranjang', [
            'keranjang' => $car,
            'cart' => $car->count(),
        ]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request) {
            $vale = array($request->desc1,
            $request->desc2,
            $request->desc3,
            $request->desc4,
            $request->desc5,
            $request->desc6,
            $request->desc7,
            $request->fullalb,);

            $vale = array_filter($vale);

            $vela = count($vale);

            
            $val = implode( ",<br>" , $vale);
        }
            

        $value = $request->lain * $vela;

        $validation = [
            'product_id' => $request->product_id,
            'harga' => $value,
            'jumlah' => $request->jumlah,
            'keterangan' => $val,
            'user_id' => auth()->user()->id,
        ];
        
        Cart::create($validation);
        
        Cart2::create($validation);
        
        return redirect('/keranjang')->with('success', 'The Product Has Been Added To Cart');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        return view('content.keranjang', [
            'keranjang' => Cart::all()->where('user_id', auth()->user()->id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::destroy($id);
        
        Cart2::destroy($id);
        
        return redirect('/keranjang')->with('delsuccess', 'The Product Has Been Deleted');
    }
}
