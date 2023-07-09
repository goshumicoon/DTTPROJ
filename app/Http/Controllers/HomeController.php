<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Livewire;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class HomeController extends Controller
{
    public function index()
    {
        $role = Auth::user()->privilage;
        if ($role == 1) {
            return view('admin.dashboard');
        } elseif ($role == 0) {
            return view('dashboard');
        } else {
            return redirect()->route('login')->withErrors(['password' => 'Password Salah']);
        }
    }


    public function cek_admin()
    {
        $role = Auth::user()->privilage;
        $hasil_cek = "";
        if($role==1){
            //kalo admin
            return view('layouts.admin.admins')
            ->section('livewire.members');
        }else{
            echo "matamuu";
        }
    }
}
