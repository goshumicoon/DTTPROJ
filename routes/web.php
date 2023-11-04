<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Members;
use App\Http\Livewire\Projectles;
use App\Http\Livewire\QualityControls;
use App\Http\Controllers\LokAgenController;





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


Route::get('', function () {
    return view('kumpens.index');
});

Route::get('homepage', function () {
    return view('kumpens.index');
})->name('homepage');

Route::get('/lok-agen/search', [LokAgenController::class, 'search'])->name('lok-agen.search');

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

Route::get('packages2', function() {
    return view('kumpens.HalPaket.packages2');
})->name('packages2');

Route::get('cekipassword','App\Http\Controllers\HomeController@cekPassword');


Route::post('penawaran_user', 'App\Http\Controllers\HomeController@insert_penawaran')->name('penawaran_user');





//member
Route::middleware('auth')->group(function() {
    // $koneksi = mysqli_connect("localhost","root","","crud8");
    Route::get('/dashboard', function() {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/packages', function() {
        return view('kumpens.HalPaket.packages');
    })->name('packages');


    Route::get('redirects','App\Http\Controllers\HomeController@index')->name('redirects');
    Route::get('member', Members::class)->name('member');
    Route::get('projetle', Projectles::class)->name('projetle');
    Route::get('QualityControls', QualityControls::class)->name('QualityControls');

    Route::get('logout', 'App\Http\Controllers\HomeController@logout');
    Route::post('/updateUserSettings', 'App\Http\Controllers\HomeController@updateUserSettings')->name('updateUserSettings');
    // routes/web.php
    Route::post('change_password', 'App\Http\Controllers\HomeController@changePassword')->name('change_password');

    //site berita superuser
    Route::get('/postmin', [HomeController::class, 'daftarBerita'])->name('postmin');
    Route::get('/superuser/tambah-berita', [HomeController::class, 'tambahBerita'])->name('superuser.tambah-berita');
    Route::post('/superuser/simpan-berita', [HomeController::class, 'simpanBerita'])->name('superuser.simpan-berita');
    Route::post('update_berita', [HomeController::class, 'update_berita'])->name('update_berita');
    Route::post('nyerere', 'App\Http\Controllers\HomeController@ambil_berita')->name('nyerere');
    Route::post('hapus-berita', [HomeController::class, 'hapusBerita'])->name('hapus_berita');


    // package site superuser
    Route::get('/package', [HomeController::class, 'PackageYes'])->name('package');
    Route::post('get_package_data', 'App\Http\Controllers\HomeController@ambil_package')->name('get_package_data');
    Route::post('update_package', 'App\Http\Controllers\HomeController@updatePackage')->name('update_package');
    Route::put('text_promo_update', 'App\Http\Controllers\HomeController@PromoUpdate')->name('text_promo_update');

    // manage user dari super admin
    Route::get('/manage_user', [HomeController::class, 'ManageUserYes'])->name('manage_user');
    // Route::post('get_package_data', 'App\Http\Controllers\HomeController@ambil_package')->name('get_package_data');
    // Route::post('update_package', 'App\Http\Controllers\HomeController@updatePackage')->name('update_package');
    // Route::put('text_promo_update', 'App\Http\Controllers\HomeController@PromoUpdate')->name('text_promo_update');


});

//admin

//Route::get('member','App\Http\Controllers\HomeController@cek_admin');

