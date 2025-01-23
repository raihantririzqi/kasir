<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class PenjualanController extends Controller
{
    public function index(){
        $pelanggan = Pelanggan::all();

        return view('penjualan.index', ['pelanggan' => $pelanggan]);
    }

    public function store(Request $request){
        $request->validate([
            'id_pelanggan' => 'required'
        ]);

        $date = now();
        $id_pelanggan = $request->id_pelanggan;
        $penjualan = Penjualan::where('pelanggan_id', '=', $id_pelanggan)
        ->whereDate('tanggal_penjualan', '=', $date)
        ->first();

        if($penjualan){
            return redirect("/transaksi/".$penjualan->id);
        }else{
            $data = [
                'tanggal_penjualan' => $date,
                'harga' => null,
                'pelanggan_id' => $id_pelanggan
            ];

            Penjualan::create($data);

            return redirect("/transaksi/".$penjualan->id);
        }
    }
}
