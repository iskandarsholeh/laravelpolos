<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Materi;
use App\Models\Order;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
    // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::fungsi crud kelas:::::::::::::::::::::::::::::::::::::::::::: //
    public function kelas(){
        $role=Auth::user()->role;
        if($role == '1'){
            $datakelas = Kelas::get();
            // dd($order);
            return view('admin/kelas')->with(compact('datakelas'));
        }else {
            return redirect('/redirects');
        }
    }
    public function storeKelas(Request $request)
    {
        // dd($request);
        Kelas::create($request->all());
        return redirect('redirects/kelas')->with('sukses', 'Data berhasil diinput');
    }

    public function updateKelas(Request $request)
    {
        // dd($request);
        $kelas = Kelas::findOrFail($request->id);
        $kelas->update($request->all());
        return redirect('redirects/kelas')->with('sukses', 'Data berhasil diupdate');
    }
    public function destroyKelas(Request $request)
    {
        $kelas = Kelas::findOrFail($request->id);
        $kelas->delete();
        return redirect('redirects/kelas')->with('sukses', 'Data berhasil dihapus');
    }
    // :::::::::::::::::::::::::::::::::::::::::::::::::::;fungsi crud materi :::::::::::::::::::::::::::::::::::::::::::::::::: //
    public function materi(){
        $role=Auth::user()->role;
        if($role == '1'){
            $dataMateri = Materi::get();
            $datakelas = Kelas::get();
            // dd($order);
            return view('admin/materi')->with(compact('dataMateri','datakelas'));
        }else {
            return redirect('/redirects');
        }
    }
    public function storeMateri(Request $request)
    {
        // dd($request);
        Materi::create($request->all());
        return redirect('redirects/materi')->with('sukses', 'Data berhasil diinput');
    }

    public function updateMateri(Request $request)
    {
        // dd($request);
        $materi = Materi::findOrFail($request->id);
        $materi->update($request->all());
        return redirect('redirects/materi')->with('sukses', 'Data berhasil diupdate');
    }
    public function destroyMateri(Request $request)
    {
        $materi = Materi::findOrFail($request->id);
        $materi->delete();
        return redirect('redirects/materi')->with('sukses', 'Data berhasil dihapus');
    }
}
