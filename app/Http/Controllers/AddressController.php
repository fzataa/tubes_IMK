<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    
    public function store(Request $req)
    {
        $validatedata = $req->validate([
            'address' => 'required|min:10',
        ]);

        $validatedata['user_id'] = auth()->user()->id;

        Address::create($validatedata);

        return redirect('/keranjang')->with('addsuccess', 'Address Has Been Uploaded !!');
    }


    public function search(Request $request)
    {
        if($request->keyword == "")
        {
            $products = Product::orderBy('id', 'DESC')->get();
            return redirect('/product');
        }
        else
        {
            $products = Product::select("*")
                ->where('grup', 'like', "%".$request->keyword."%")
                ->orWhere('category', 'like', "%".$request->keyword."%")
                ->orWhere('album', 'like', "%".$request->keyword."%")
                ->get();

            if(auth()->guest()){
                return view("partials.search", compact('products'));
            }else {
                $cart = Cart::where('user_id', auth()->user()->id)->get();
                
                $cart = $cart->count();
                
                return view("partials.search", compact('products', 'cart'));
            }
            
            
        }
    }

}
