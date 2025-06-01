<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    protected $fillable = ['user_id', 'kode_transaksi', 'total'];

    public function details()
    {
        return $this->hasMany(DetailPembelian::class);
    }
}

