<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetilPenjualan extends Model
{
    use HasFactory;

    protected $table = 'detil_penjualan';

    protected $fillable = [
        'id_penjualans',
        'id_barang',
        'jumlah_barang'
    ];

    protected $primaryKey = "id_detil_penjualan";

    public function Penjualan(){
        return $this->belongsTo(Penjualan::class,'id_penjualan','id_penjualans');
    }

    public function Barang(){
        return $this->belongsTo(Items::class,'id_barang');
    }
}
