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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            
            // INI YANG KITA TAMBAHKAN SESUAI SOAL PDF HAL 10
            $table->string('sku')->unique(); // Kode unik barang
            $table->string('name');          // Nama barang
            $table->integer('stock')->default(0); // Jumlah stok
            $table->text('description')->nullable(); // Deskripsi (opsional)

            $table->timestamps(); // Ini otomatis buat kolom created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
