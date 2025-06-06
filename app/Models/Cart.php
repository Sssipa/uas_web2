<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'user_id',
        'barang_id',
        'qty',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
    public function barang() {
        return $this->belongsTo(Barang::class);
    }
}
