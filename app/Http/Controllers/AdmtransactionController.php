<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\City;
use Illuminate\Http\Request;

class AdmtransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.content.transaction', [
            'tran' => Transaction::all(),
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
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }


    public function index2(Transaction $transaction)
    {
        return view('admin.content.transaction', [
            'detail' => "Arrived",
            'tran' => Transaction::where("status", "Arrived")->get(),
        ]);
    }
    
    
    public function index3(Transaction $transaction, $id)
    {
        $tran = Transaction::where('id', $id)->first();

        $city = City::where('city_id', $tran->address->city_id)->first();

        return view('admin.content.list', [
            'city' => $city,
            'detail' => "On Shipping",
            'tran' => Transaction::where("id", $id)->first(),
        ]);
    }

    
    public function index4(Transaction $transaction)
    {
        return view('admin.content.transaction', [
            'detail' => "Waiting For Verification",
            'tran' => Transaction::where([
                ["status",'=', "Waiting For Verification"],
                ])->orwhere('status','=', 'Rejected')->get(),
        ]);
    }
   
   
    public function index5(Transaction $transaction)
    {
        return view('admin.content.transaction', [
            'detail' => "On Shipping",
            'tran' => Transaction::where("status", "On Shipping")->get(),
        ]);
    }
    
    public function changestat(Request $r, Transaction $transaction)
    {
        if ($r->resi) {
            $val = [
                'resi' => $r->resi,
            ];
        }else{
            $val = [
                'status' => $r->status,
            ];
        }
        
        Transaction::where('id', $r->tran_id)->update($val);

        return redirect()->back()->with('success', 'Change Success');

    }
    
    public function desturoy(Request $r)
    {
    
        Transaction::destroy($r->tran_id);

        return redirect('/transaction/waiting-for-verification')->with('succeess', 'The Transaction Has Been Deleted');
    
    }

}
