<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\TestMail;
use App\Mail\forpassMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MailController extends Controller
{
    public function index() {
        return view('emails.lupapas');
    }
    
    public function index2($id) 
    {
        return view('emails.index', [
            'mail' => User::where('id', $id)->first(),
        ]);
    }
    
    public function index3(Request $r) 
    {
        $data = $r->validate([
            'password' => 'required|min:8',
            'confirm_password' => 'same:password',
        ]);

        $dataa = [
            'password' => $r->password
        ];

        $dataa['password'] = Hash::make($dataa['password']);

        User::where('email', $r->user_mail)->update($dataa);

        return redirect('/login')->with('changesucces', 'Password change success');
    }



    public function forpass(Request $r) 
    {

        $deatils = $r->validate([
            'email' => 'required|email:dns', 
        ]);

        $user = User::where('email', $r->email)->first();


        Mail::to($user->email)->send(new forpassMail($user));

        $user = User::where('email', $r->email)->first();

        return view('emails.waitmails',[
            'mail' => $user,
            'data' => "Forget Password"
        ]);
    }



    public function sendEmail(Request $req)
    {

        $details = [
            'email' => $req->email,
            'name' => $req->name,
            'username' => $req->username,
        ];

        $maile = [
            'email' => $req->email,
            'name' => $req->name,
            'username' => $req->username,
        ];


        if($req->verif){
            Mail::to($req->email)->send(new Testmail($details));
            
            return view('emails.waitmails', [
                'mail' => $maile,
                'data' => "Verify Email"
            ]);
        }


        if($req->password){
            $validateData = $req->validate([
                'name' => 'required|min:3|max:255',
                'username' => 'required|min:3|max:255|unique:users,username',
                'email' => 'required|email:dns|unique:users',
                'no_telp' => 'required|digits_between:11, 13|unique:users,no_telp',
                'password' => 'required|min:8|max:255',
                'Confirm_Password' => 'required|same:password',
            ]);
            
            
            // $validateData['password'] = bcrypt($validateData['password']);
            $validateData['password'] = Hash::make($validateData['password']);
            $validateData['tipe'] = 0;
            $validateData['image'] = 'storage/images/blank-profile-picture-g05817d649_640.png';
            
            User::create($validateData);


        }


        if ($req->angka) {
            $date = Carbon::now();

            DB::table('users')->where('email', $req->email)->update(['email_verified_at' => $date]);
            
            return redirect('/login')->with('verSuccess', 'Email Verification Success !!');
        }
        

        if($req->password){
            Mail::to($validateData['email'])->send(new Testmail($details));
            
            return view('emails.waitmails', [
                'mail' => $validateData,
                'data' => "Verify Email "
            ]);
            
        }else {
            Mail::to($maile['email'])->send(new Testmail($details));
            
            return view('emails.waitmails', [
                'mail' => $maile,
                'data' => "Verify Email"
            ]);

        }


    }
}
