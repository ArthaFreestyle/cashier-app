<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    protected $table = 'penjualan';

    protected $fillable = [
        'Total_Harga',
        'id_karyawan'
    ];

    protected $primaryKey = "id_penjualan";

    public function DetilPenjualans(){
        return $this->hasMany(DetilPenjualan::class,'id_penjualans','id_penjualan');
    }
}
