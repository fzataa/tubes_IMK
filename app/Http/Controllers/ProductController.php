<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prod = Product::all();
        return view('admin.content.product', [
            'products' => $prod,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.content.plusprod');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validation = $request->validate([
            'category' => 'required',
            'desc' => 'required|min:20',
            'image1' => 'required|image|file|max:1024',
            'image2' => 'image|file|max:1024',
            'image3' => 'image|file|max:1024',
            'image4' => 'image|file|max:1024',
            'image5' => 'image|file|max:1024',
            'image6' => 'image|file|max:1024',
            'image7' => 'image|file|max:1024',
            'desc1' => 'required',
            'desc2' => 'min:0',
            'desc3' => 'min:0',
            'desc4' => 'min:0',
            'desc5' => 'min:0',
            'desc6' => 'min:0',
            'desc7' => 'min:0',
            'price_ver' => 'required|numeric|min:5',
            'price_full' => 'min:0',
        ]);

        if ($request->judul) {
            $validation['judul'] = $request->judul;
        }

        if ($request->grup) {
            $validation['grup'] = $request->grup;
            $validation['album'] = $request->album;
        }

        $validation['image1'] = $request->file('image1')->store('images');
        if ($request->image2) {
            $validation['image2'] = $request->file('image2')->store('images');
        }
        if ($request->image3) {
            $validation['image3'] = $request->file('image3')->store('images');
        }
        if ($request->image4) {
            $validation['image4'] = $request->file('image4')->store('images');
        }
        if ($request->image5) {
            $validation['image5'] = $request->file('image5')->store('images');
        }
        if ($request->image6) {
            $validation['image6'] = $request->file('image6')->store('images');
        }
        if ($request->image7) {
            $validation['image7'] = $request->file('image7')->store('images');
        }

        Product::create($validation);

        return redirect('/products')->with('success', 'The Product Has Been Inserted');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.content.prod', [
            'products' => $product,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Product $product)
    {

        $product = DB::table('products')->where('id', $request->id)->first();


        return view('admin.content.update', [
            'product' => $product,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        
        $pro = Product::where('id', $request->id)->first();
        
        $validation = $request->validate([
            'category' => 'required',
            'desc' => 'required|min:20',
            'price_ver' => 'required|min:5|numeric',
            'price_full' => 'min:0',
            'image1' => 'image|file|max:1024',
            'image2' => 'image|file|max:1024',
            'image3' => 'image|file|max:1024',
            'image4' => 'image|file|max:1024',
            'image5' => 'image|file|max:1024',
            'image6' => 'image|file|max:1024',
            'image7' => 'image|file|max:1024',
            'desc1' => 'required',
            'desc2' => 'min:0',
            'desc3' => 'min:0',
            'desc4' => 'min:0',
            'desc5' => 'min:0',
            'desc6' => 'min:0',
            'desc7' => 'min:0',
        ]);

        if ($request->image1) {
            if ($pro->image1) {
                Storage::delete($pro->image1);
            }
            $validation['image1'] = $request->file('image1')->store('images');
        }
        if ($request->image2) {
            if ($pro->image2) {
                Storage::delete($pro->image2);
            }
            $validation['image2'] = $request->file('image2')->store('images');
        }
        if ($request->image3) {
            if ($pro->image3) {
                Storage::delete($pro->image3);
            }
            $validation['image3'] = $request->file('image3')->store('images');
        }
        if ($request->image4) {
            if ($pro->image4) {
                Storage::delete($pro->image4);
            }
            $validation['image4'] = $request->file('image4')->store('images');
        }
        if ($request->image5) {
            if ($pro->image5) {
                Storage::delete($pro->image5);
            }
            $validation['image5'] = $request->file('image5')->store('images');
        }
        if ($request->image6) {
            if ($pro->image6) {
                Storage::delete($pro->image6);
            }
            $validation['image6'] = $request->file('image6')->store('images');
        }
        if ($request->image7) {
            if ($pro->image7) {
                Storage::delete($pro->image7);
            }
            $validation['image7'] = $request->file('image7')->store('images');
        }



        if ($request->judul) {
            $validation['judul'] = $request->judul;
        }

        if ($request->grup) {
            $validation['grup'] = $request->grup;
            $validation['album'] = $request->album;
        }

        Product::where('id', $request->id)
            ->update($validation);

        return redirect('/products')->with('editsuccess', 'Edit Success !!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Product $product)
    {
        $pro = Product::where("id", $product->id)->first();

        if ($pro->image1) {
            Storage::delete($pro->image1);
        }
        if ($pro->image2) {
            Storage::delete($pro->image2);
        }
        if ($pro->image3) {
            Storage::delete($pro->image3);
        }
        if ($pro->image4) {
            Storage::delete($pro->image4);
        }
        if ($pro->image5) {
            Storage::delete($pro->image5);
        }
        if ($pro->image6) {
            Storage::delete($pro->image6);
        }
        if ($pro->image7) {
            Storage::delete($pro->image7);
        }
        Product::destroy($product->id);

        return redirect('/products')->with('delsuccess', 'Product Has Been Removed');
    }

    public function checkSlug(Request $request) 
    {
        $slug = SlugService::createSlug(Product::class, 'slug', $request->Album);
        return response()->json(['slug' => $slug]);
    }

}
