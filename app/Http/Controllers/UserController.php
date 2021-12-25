<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.content.user', [
            'users' => User::all()
        ]);
    }
    
    
    public function profile($id)
    {
        $cart = Cart::where('user_id', $id)->get();

        return view('content.profile', [
            'cart' => $cart->count(),
        ]);
    }


    public function profpp(Request $r)
    {
        if ($r->image) {

            $user = User::where('id', auth()->user()->id)->first();

            if ($user->image) {
                Storage::delete($user->image);
            }

            $image = $r->validate([
                'image' => 'file|image|mimes:png,jpg',
            ]);
            
            $image['image'] = $r->file('image')->store('images');
            
            User::where('id', auth()->user()->id)->update($image);
            
            return redirect('/profile/{id}')->with('sucess', 'Your photo has been updated');
        }else{
            
            return redirect('/profile/{id}')->with('vai', 'Please Input Image');

        }
    
    }
    
    
    public function changepass(Request $r)
    {
        
        if ($r->old_password) {
            $user = User::where('id', auth()->user()->id)->first();

            $pass = Hash::check($r->old_password, $user->password);

            if($pass == true){
                
                $image = $r->validate([
    
                    'password' => 'min:8',
                ]);

                $conpas = $r->validate(['new_password_confirm' => 'same:password']);

                $image['password'] = Hash::make($image['password']);

                User::where('id', auth()->user()->id)->update($image);
                
                return redirect('/profile/{id}')->with('success', 'Password Has Been Updated');


            }else{
                
                return redirect('/profile/{id}')->with('vail', 'Please Input correct Old Password');
            }

            
        }else{
            
            return redirect('/profile/{id}')->with('vail', 'Please Input Old Password');

        }
    
    }
    
    public function changename(Request $r)
    {

        if ($r->name) {
            $image = $r->validate([
                'name' => 'min:2|max:40',
            ]);
            
            User::where('id', auth()->user()->id)->update($image);
            
            return redirect('/profile/{id}')->with('namesuccess', 'Name Has Been Changed');
        }else{
            
            return redirect('/profile/{id}')->with('namevailed', 'Please Input New Name');

        }
    
    }






    public function index2()
    {
        return view('admin.content.user', [
            'users' => User::where('tipe', '0')->get()
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
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show(user $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(user $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, user $user)
    {
        dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $user)
    {
        //
    }
    
    
    public function change (Request $req)
    {

        $validate['tipe'] = $req->tipe;

        User::where('id', $req->id)->update($validate);

        return back();



    }
    
    






}
