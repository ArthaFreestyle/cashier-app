<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    use HasFactory;

    protected $table = 'barang';

    protected $fillable = [
        'id_barang',
        'nama_barang',
        'harga_barang',
        'jumlah_barang'
    ];

    protected $primaryKey = "id_barang";

    public function DetilPenjualan(){
        return $this->hasMany(DetilPenjualan::class,'id_barang');
    }
}
