<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPembelian extends Model
{
    protected $fillable = ['pembelian_id', 'barang_id', 'harga', 'qty'];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}

