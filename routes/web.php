<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Members;
use App\Http\Livewire\Projectles;
use App\Http\Livewire\QualityControls;





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


$is_Admin = "";


Route::get('/', function () {
    return view('kumpens.index');
});

Route::get('/nartoh', function () {
    return view('kumpens.cobgam');
});

Route::get('/hemje', function () {
    return view('layouts.hemje');
});


Route::get('/login', function () {
    return view('auth.login');
})->name('login');



// Route::get('/login', function () {
//     return view('auth.login');
// })->name('login');

Route::get('/packages2', function() {
    return view('kumpens.HalPaket.packages2');
})->name('packages2');





//member
Route::middleware('auth')->group(function() {
    $koneksi = mysqli_connect("localhost","root","","crud8");
    Route::get('/dashboard', function() {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/packages', function() {
        return view('kumpens.HalPaket.packages');
    })->name('packages');


    Route::get('redirects','App\Http\Controllers\HomeController@index');
    Route::get('member', Members::class)->name('member');
    Route::get('projetle', Projectles::class)->name('projetle');
    Route::get('QualityControls', QualityControls::class)->name('QualityControls');

});

//admin

//Route::get('member','App\Http\Controllers\HomeController@cek_admin');

