<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barangs';
    protected $fillable = [
        'nama', 'harga', 'deskripsi', 'kategori_id', 'user_id', 'status', 'gambar'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
