<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LainlainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->guest()){
            return view('content.product', [
                'prod' => Product::where('category', 'Album')->get(),
            ]);
            
        }else{
            
            if (auth()->user()->tipe == 1 || auth()->user()->tipe == 3) {
                abort(404); 
            }
            return view('content.product', [
                'prod' => Product::where('category', 'Album')->get(),
            ]);
        }


    }

    public function index2()
    {
        
        if (!auth()->guest()) {
         
            if (auth()->user()->tipe == 1 || auth()->user()->tipe == 3) {
                abort(404); 
            }
            
            $cart = Cart::where('user_id', auth()->user()->id)->get();
            
            return view('content.allproduct', [
                'product' => Product::where('category', 'Album')->paginate(8),
                'cart' => $cart->count(),
            ]);
        }else {
            
            
            return view('content.allproduct', [
                'product' =>Product::where('category', 'Album')->paginate(8),
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
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        

        if (!auth()->guest()) {
            
            
            if (auth()->user()->tipe == 1 || auth()->user()->tipe == 3) {
                abort(404); 
            }
            $rev = Review::where('product_id', $product->id)->paginate(8);
            
            $cart = Cart::where('user_id', auth()->user()->id)->get();
            return view('content.show', [
                'prod' => $product,
                'cart' => $cart->count(),
                'rev'=> $rev,
                
            ]);
        }else{
            
            $rev = Review::where('product_id', $product->id)->paginate(8);
            return view('content.show', [
                'prod' => $product,
                'rev'=> $rev,
            ]);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
    
    public function album(Product $pro)
    {
       
        if (!auth()->guest()) {
         
            $cart = Cart::where('user_id', auth()->user()->id)->get();
   
            
               return view('content.allproduct', [
                   'product' => Product::where('category', 'Akun Premium')->paginate(8),
                   'cart' => $cart->count(),
               ]);
           }else {

                if (auth()->user()->tipe == 1 || auth()->user()->tipe == 3) {
                    abort(404); 
                }
               
               return view('content.allproduct', [
                   'product' =>Product::where('category', 'Akun Premium')->paginate(8),
               ]);
           }   
    }

    public function showalb(Product $product, $id) 
    {
        
        $prod = Product::where('id', $id)->first();
        
        $pr = $prod->toArray();
        
        if (!auth()->guest()) {
            $cart = Cart::where('user_id', auth()->user()->id)->get();
            
            return view('content.showw', [
                'prod' => $pr,
                'cart' => $cart->count(),
                
            ]);
        }else{
            
            if (auth()->user()->tipe == 1 || auth()->user()->tipe == 3) {
                abort(404); 
            }

            return view('content.showw', [
                'prod' => $pr,
            ]);
        }




    }




}
