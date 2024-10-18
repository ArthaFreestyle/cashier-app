<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detil_penjualan', function (Blueprint $table) {
            $table->id('id_detil_penjualan')->primary();
            $table->integer('id_penjualans');
            $table->string('id_barang');
            $table->integer('jumlah_barang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
