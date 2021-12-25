<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Transaction;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.content.review', [
            'review' => Review::all()
        ]);
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
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        //
    }
    
    public function add(Request $r)
    {
        $data = $r->validate([
            'user_id' => 'required',
            'product_id' => 'required',
            'review' => 'required|min:3',
            'rate' => 'required|digits_between:1, 3|integer|min:0|max:100',
            'image' => 'file|image|mimes:png,jpg|max:1024',
        ]);
        
        if($r->image){
            $data['image'] = $r->file('image')->store('images');
        }

        Review::create($data);

        $rev = Review::latest()->first();

        $dat = [
            'review_id' => $rev->id,
        ];  

        Transaction::where('id', $r->tran_id)->update($dat);

        return redirect('/transactio/arrived')->with('revsuccess', 'Review has been added');
    }



}
