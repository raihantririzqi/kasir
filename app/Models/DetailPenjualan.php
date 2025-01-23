<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPenjualan extends Model
{
    use HasFactory;
    protected $table = 'detail_penjualan';
    protected $guarded = [];
    protected $hidden = [];
    protected $fillable = [
        'penjualan_id', 'produk_id', 'jumlah_produk', 'sub_total'
    ];
}
