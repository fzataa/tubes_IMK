<?php

namespace App\Http\Controllers;

use App\Exports\TransactionExport;
use App\Models\Transaction;
use App\Models\Transactiondata;
use App\Models\Cart;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Dompdf\Adapter\CPDF;      
use Dompdf\Dompdf;
use Dompdf\Exception;
use Excel;
use PDF;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tran = Transaction::where('user_id', auth()->user()->id)->get();
        $cart = Cart::where('user_id', auth()->user()->id)->get();

        return view('content.transaction', [
            'tran' => $tran,
            'cart' => $cart->count(),
        ]);
    }

    public function index2()
    {
        $tran = Transaction::where([
            ['user_id', '=', auth()->user()->id],
            ['status', '=', 'Waiting For Verification'],
            ])
            ->orwhere('status','=', 'Rejected')->get();

        $cart = Cart::where('user_id', auth()->user()->id)->get();
        $detailed = "no";


        return view('content.history', [
            'detail' => $detailed,
            'tran' => $tran,
            'cart' => $cart->count(),
        ]);
    }
    
    public function index3()
    {
        $tran = Transaction::where([
            ['user_id', '=', auth()->user()->id],
            ['status', '=', 'Upload Payment Proofment'],
            ])->get();

        $cart = Cart::where('user_id', auth()->user()->id)->get();
        $detailed = "no";


        return view('content.history', [
            'detail' => $detailed,
            'tran' => $tran,
            'cart' => $cart->count(),
        ]);
    }



    public function index4()
    {
        $tran = Transaction::where([
            ['user_id', '=', auth()->user()->id],
            ['status', '=', 'On Shipping'],
            ])->get();

        $cart = Cart::where('user_id', auth()->user()->id)->get();
        $detailed = "no";


        return view('content.history', [
            'tran' => $tran,
            'detail' => $detailed,
            'cart' => $cart->count(),
        ]);
    }
    
    
    
    public function index5()
    {
        $tran = Transaction::where([
            ['user_id','=', auth()->user()->id],
            ['status','=', "Arrived"],
            ['review_id','=', null],
        ])->orderBy('updated_at', 'DESC')->get();
        
        $trannorev = Transaction::where([
            ['user_id','=', auth()->user()->id],
            ['status','=', "Arrived"],
            ['review_id','!=', null],
        ])->get();

        $cart = Cart::where('user_id', auth()->user()->id)->get();
        $detailed = "Arrived";


        return view('content.history', [
            'norev' => $trannorev,
            'tran' => $tran,
            'cart' => $cart->count(),
            'detail' => $detailed
        ]);
    }

    
    public function invoice($id)
    {
        $tran = Transaction::where('id', $id)->first();

        $cart = Cart::where('user_id', auth()->user()->id)->get();

        $city = City::where('city_id', $tran->address->city_id)->first();

        return view('content.invoice', [
            'city' => $city,
            'tran' => $tran,
            'cart' => $cart->count(),
        ]);
    }

    
    public function upbukti(Request $r)
    {
        $data = $r->validate([
            'bukti' => 'required|file|image|mimes:png,jpg|max:1024',
            'status' => ''
        ]);

        $tran = Transaction::where('id', $r->tran_id)->first();

        if ($r->bukti) {
            if ($tran->bukti) {
                Storage::delete($tran->bukti);
            }
            $data['bukti'] = $r->file('bukti')->store('images');
        }


        Transaction::where('id', $r->tran_id)->update($data);

        return redirect()->to('invoice/'. $r->tran_id)->with('success', 'Image Has Been Changed');
    }

    public function change(Request $r)
    {
        $val = [
            'status' => $r->status,
        ];
        
        $data = [
            'name' => $r->name,
            'phone' => $r->phone,
            'e_mail' => $r->e_mail,
            'product_name' => $r->product_name,
            'quantity' => $r->quantity,
            'address_location' => $r->address_location,
            'city' => $r->city,
            'province' => $r->province,
            'courier' => $r->courier,
            'total' => $r->total,
            'status' => $r->status,
        ];

        Transaction::where('id', $r->tran_id)->update($val);

        Transactiondata::create($data);

        return redirect('/transactio/arrived');

    }
    
    public function deletee(Request $r)
    {
        Transaction::destroy($r->tran_id);

        return redirect('/transactio/upload-proofment')->with('cansuccess', 'Transaction has been canceled');

    }


    public function exportToExcel(Request $r) 
    {
        if($r->status == "Excel") {
            return Excel::download(new TransactionExport($r->date_from, $r->date_to), 'Transaction-Report.xlsx');
        }
        elseif ($r->status == "PDF") {
            // $var = Transactiondata::getAllTransactionData($r->date_from, $r->date_to);
            // return view('report.pdf', [
            //     'judul' => "Transaction Report",
            //     'data' => Transactiondata::getAllTransactionData($r->date_from, $r->date_to),
            // ]);
            $data = [
                'judul' => "Transaction Report",
                'data' => Transactiondata::getAllTransactionData($r->date_from, $r->date_to),
            ];
            $pdf = PDF::loadView('report.pdf', $data)->setPaper('letter', 'landscape');
            return $pdf->download('Transaction-Report.pdf');
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
    public function store(Request $r)
    {
        $date = Carbon::now();

        DB::table('transactions')->insert([
            'user_id' => auth()->user()->id,
            'cart_id' => $r->cart_id,
            'product_id' => $r->product_id,
            'address_id' => NULL,
            'tanggal' => $date,
            'jumlah' => $r->jumlah,
            'total' => $r->total,
            'status' => ' ',
        ]);

        return redirect('/transaction')->with('success', 'Transaction has been added !!');


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
    
    
    
    public function address(Transaction $transaction, $id)
    {
        $cart = Cart::where('user_id', auth()->user()->id)->get();


        return view('content.transaction', [
            'tran' => Cart::where('id', $id)->first(),
            'cart' => $cart->count(),
        ]);

    }








}
