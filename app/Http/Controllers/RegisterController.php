<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'Register'
        ]);
    }

    public function revplus(Request $req)
    {
        DB::table('reviews')->insert([
            'name' => $req->name,
            'review' => $req->review,
            'rate' => $req->rate,
        ]);

        return redirect('/');


    }




}
