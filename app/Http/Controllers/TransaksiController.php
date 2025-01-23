<?php

namespace App\Http\Controllers;

use App\Models\DetailPenjualan;
use App\Models\Penjualan;
use App\Models\Produk;
use Exception;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index($id)
    {
        $produk = Produk::all();
        $detail_penjualan = DetailPenjualan::select('pelanggan.nama_pelanggan', 'produk.nama_produk', 'detail_penjualan.sub_total', 'detail_penjualan.jumlah_produk')
        ->where('detail_penjualan.penjualan_id', '=', $id)
        ->join('penjualan', 'penjualan.id', '=', 'detail_penjualan.penjualan_id')->join('produk', 'produk.id', '=', 'detail_penjualan.produk_id')->join('pelanggan', 'pelanggan.id', '=', 'penjualan.pelanggan_id')->get();
        $penjualan = Penjualan::where('id', $id)->first();
        return view('transaksi.index', ['produk' => $produk, 'id' => $id, 'detail_penjualan' => $detail_penjualan, 'total_harga' => $penjualan->total_harga ? $penjualan->total_harga : 0]);
    }

    public function create_transaksi($id, Request $request)
    {
        try {
            $produk = Produk::where('id', '=', $request->id_produk)->first();

            $produk_exist = DetailPenjualan::where('produk_id', '=', $produk->id)
                ->where('penjualan_id', '=', $id)
                ->first();

            $sub_total = number_format($produk->harga * $request->jumlah, 0, ',', '');
            if ($produk->stok >= $request->jumlah) {
                Produk::findOrFail($produk->id)->update([
                    'stok' => $produk->stok - $request->jumlah,
                ]);

                if ($produk_exist) {
                    $data = [
                        'produk_id' => $produk->id,
                        'jumlah_produk' => $produk_exist->jumlah_produk + $request->jumlah,
                        'sub_total' => $produk_exist->sub_total + $sub_total,
                    ];

                    DetailPenjualan::findOrFail($produk_exist->id)->update($data);
                } else {
                    $data = [
                        'penjualan_id' => $id,
                        'produk_id' => $produk->id,
                        'jumlah_produk' => $request->jumlah,
                        'sub_total' => $sub_total,
                    ];
                    DetailPenjualan::create($data);
                }

                $penjualan = Penjualan::where('id', '=', $id)->first();

                if ($penjualan->total_harga) {
                    Penjualan::findOrFail($id)->update([
                        'total_harga' => $penjualan->total_harga + $sub_total,
                    ]);
                } else {
                    Penjualan::findOrFail($id)->update([
                        'total_harga' => $sub_total,
                    ]);
                }
            } else {
                return redirect('/transaksi/' . $id)->with('error', 'Stok Produk Kurang');
            }

            return redirect('/transaksi/' . $id);
        } catch (Exception $e) {
            return dd($e);
        }
    }
}
