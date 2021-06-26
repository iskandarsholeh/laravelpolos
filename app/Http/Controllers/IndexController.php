<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Order;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index() {
        $role = Auth::user()->role;
        if($role=='1'){
            return view('admin/dashboard');
        }else{
            $dataKelas= Kelas::with('users')->get();
            // foreach($dataLangganan as $d){
            //  dd($d->users->count());
            // }
            $iduser=Auth::user()->id;
            // dd($dataLangganan);
            return view('users/dashboard')->with(compact('dataKelas', 'iduser'));
        }
    }
}
