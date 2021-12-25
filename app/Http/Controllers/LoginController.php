<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(Request $req)
    {
        return view('login.index', [
            'title' => 'Login'
        ]);
    }

    public function authenticate(Request $request)
    {
        // $users = $users = DB::table('users')->where('email', $request->email)->first();
        $users = $users = DB::table('users')->where('email', $request->email)->first();
        
        
        if ($users != null) {
            
            $credentials = $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            if($users->email_verified_at != null){
                if(Auth::attempt($credentials)){
                    $request->session()->regenerate();
        
                        return redirect()->intended('/dashboard');
        
                }else {
                        
                        return back()->with('loginError', 'Login failed!');
                }
            }else{
                if ($users->email != null) {
                    return back()->with('notVerified', 'You hasnt verified your Email !!');
                
                }else {

                    return back()->with('loginError', 'Login failed!');
                }
            }
        }else {
            
            return back()->with('loginError', 'Login failed!');
        
        }


            
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/login')->with('logout', 'You have successfully logged out!');
    }

    










}
