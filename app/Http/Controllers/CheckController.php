<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Province;
use App\Models\Address;
use App\Models\Transaction;
use App\Models\Cart;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Kavist\RajaOngkir\Facades\RajaOngkir;

class CheckController extends Controller
{
    public function index(Request $req, $id)
    {
        $prod = Cart::where('id', $id)->first();
        $cart = Cart::where('user_id', auth()->user()->id)->get();
        $provinces = Province::pluck('name', 'province_id');

        return view('content.transaction', [
            'provinces' => $provinces,
            'tran' => $prod,
            'cart' => $cart->count(),
            'curt' => $id,
        ]);
    }

    public function getCities($id)
    {
        $city = City::where('province_id', $id)->pluck('name', 'city_id');
        return response()->json($city);
    }

    public function check_ongkir(Request $request)
    {
        $cost = RajaOngkir::ongkosKirim([
            'origin'        => $request->city_origin, // ID kota/kabupaten asal
            'destination'   => $request->city_destination, // ID kota/kabupaten tujuan
            'weight'        => $request->weight, // berat barang dalam gram
            'courier'       => $request->courier // kode kurir pengiriman: ['jne', 'tiki', 'pos'] untuk starter
        ])->get();


        return response()->json($cost);
    }

    public function store(Request $r, $id)
    {
        $valu = [
            'user_id' => auth()->user()->id,
            'cart_id' => $r->cart_id,
            'name' => $r->name,
            'province_id' => $r->province_destination,
            'city_id' => $r->city_destination,
            'kurir' =>  $r->courier,
            'ongkir' =>  $r->huarga,
            'address_opt' =>  $r->address_opt,
            'email' =>  $r->email,
            'phone' =>  $r->phone,
        ];

        Address::create($valu);

        return redirect('/transacti');

    }


    public function index3() 
    {
        $cart = Cart::where('user_id', auth()->user()->id)->get();

        $prod = Address::where('user_id', auth()->user()->id)->latest()->first();

        return view('content.showw', [
            'cart' => $cart->count(),
            'prod' => $prod,
        ]);
    }
    
    public function transtore(Request $r) 
    {
        $date = Carbon::now();

        $tran = [
            'user_id' => auth()->user()->id,
            'product_id' => $r->product_id,
            'cart_id' => $r->cart_id,
            'address_id' => $r->address_id,
            'jumlah' => $r->jumalh,
            'total' => $r->total,
            'status' => $r->status,
            'tanggal' => $date,
        ];
        
        Transaction::create($tran);
    
        Cart::destroy($r->cart_id);

        $cart = Cart::where('user_id', auth()->user()->id)->get();

        $tran = Transaction::latest()->first();

        $city = City::where('city_id', $tran->address->city_id)->first();


        return view('content.invoice', [
            'tran' => $tran,
            'cart' => $cart->count(),
            'city' => $city,
        ]);
    
    }


}
