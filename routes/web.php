<?php

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\AdmtransactionController;
use App\Http\Controllers\LainlainController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\CheckController;
use App\Models\Transaction;
use App\Models\Cart;
use App\Models\Review;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::resource('/', HomeController::class)->middleware('guest');
Route::get('/faq', function() {

    if(auth()->guest()){
        return view('content.faq');
    }else {
        
        $cart = Cart::where('user_id', auth()->user()->id)->get();
        
        return view('content.faq', [
            'cart' => $cart->count(),
        ]);
    }
});

// Mail
Route::post('/verify-email', [MailCOntroller::class, 'sendEmail']); 
Route::post('/forget-passwordd', [MailCOntroller::class, 'forpass']); 
Route::get('/forget-password', [MailCOntroller::class, 'index']); 
Route::post('/renew-password', [MailCOntroller::class, 'index3']); 
Route::get('/forget-password/{id}', [MailCOntroller::class, 'index2']); 

// Register
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');

// Login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

// Logout
Route::post('/logout', [LoginController::class, 'logout']);


Route::get('/profil',[ProfilController::class, 'index'])->middleware('auth');


Route::post('/reviews', [RegisterController::class, 'revplus'])->middleware('auth');




Route::post('/search', [AddressController::class, 'search']);

Route::get('/profile/{id}', [UserController::class, 'profile'])->middleware('auth');
Route::post('/profile-change-pic', [UserController::class, 'profpp'])->middleware('auth');
Route::post('/profile-change-password', [UserController::class, 'changepass'])->middleware('auth');
Route::post('/profile-change-name', [UserController::class, 'changename'])->middleware('auth');



// Dashbaord
Route::get('/dashboard', [DashController::class, 'index'])->middleware('auth');

Route::post('/address', [AddressController::class, 'store'])->middleware('auth');

Route::resource('/product', LainlainController::class);

Route::get('/product', [LainlainController::class, 'index2']);

Route::get('/album', [LainlainCOntroller::class, 'album']);

Route::get('/album/{id}', [LainlainCOntroller::class, 'showalb']);

Route::resource('/keranjang', KeranjangController::class)->middleware('auth');

Route::resource('/products', ProductController::class)->middleware('adm');

Route::get('/users', [UserController::class, 'index'])->middleware('adm');

Route::post('/users', [UserController::class, 'change'])->middleware('adm');

Route::get('/customer', [UserController::class, 'index2'])->middleware('adm');

Route::resource('/review', ReportController::class)->middleware('adm');

Route::resource('/transactions', AdmtransactionController::class)->middleware('adm');
Route::get('/transaction/arrived', [AdmtransactionController::class, 'index2'])->middleware('adm');
Route::get('/transaction/waiting-for-verification-or-on-shipping/{id}', [AdmtransactionController::class, 'index3'])->middleware('adm');
Route::get('/transaction/waiting-for-verification', [AdmtransactionController::class, 'index4'])->middleware('adm');
Route::post('/transaction/waiting-for-verification', [AdmtransactionController::class, 'desturoy'])->middleware('adm');
Route::get('/transaction/on-shipping', [AdmtransactionController::class, 'index5'])->middleware('adm');
Route::post('/transaction/change-status', [AdmtransactionController::class, 'changestat'])->middleware('adm');

Route::resource('/transaction', TransactionController::class)->middleware('auth');

Route::get('/address/{id}', [TransactionController::class, 'address'])->middleware('auth');

Route::get('/invoice/{id}', [TransactionController::class, 'invoice'])->middleware('auth');

Route::post('/upload-transaction-proofment', [TransactionController::class, 'upbukti'])->middleware('auth');


Route::get('/review', function () {
    
    $rev = Review::all();

    return view('admin.content.review', [
        'review' => $rev,
    ]);

})->middleware('adm');


Route::get('/transactio/waiting-for-verification', [TransactionController::class, 'index2'])->middleware('auth');
Route::get('/transactio/upload-proofment', [TransactionController::class, 'index3'])->middleware('auth');
Route::get('/transactio/on-shipping', [TransactionController::class, 'index4'])->middleware('auth');
Route::get('/transactio/arrived', [TransactionController::class, 'index5'])->middleware('auth');
Route::post('/transactio/change-stats', [TransactionController::class, 'change'])->middleware('auth');
Route::post('/delete', [TransactionController::class, 'deletee'])->middleware('auth');

Route::get('/transacti', [CheckController::class, 'index3'])->middleware('auth');
Route::post('/transacti', [CheckController::class, 'transtore'])->middleware('auth');

Route::get('/ongkir/{id}', [CheckController::class, 'index'])->middleware('auth');

Route::post('/transaction/{id}', [CheckController::class, 'store'])->middleware('auth');

Route::post('/ongkir', [CheckController::class, 'check_ongkir'])->middleware('auth');

Route::get('/cities/{province_id}', [CheckController::class, 'getcities'])->middleware('auth');


Route::post('/add-review-product', [ReportController::class, 'add'])->middleware('auth');

Route::get('/export-excel', [TransactionController::class, 'exportToExcel']);


Route::get('/blabla', function() {
    $user = Transaction::where('status', 'Arrived')->get();

    $col = collect($user);



    return view('content.showwrev', [
        'tran' => $col, 
    ]);


});


