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
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("kategori_produk_id");
            $table->string("slug");
            $table->string("nama");
            $table->decimal("harga", 20, 2)->default(0);
            $table->string("lebar")->nullable();
            $table->string("panjang")->nullable();
            $table->string("tinggi")->nullable();
            $table->string("warna")->nullable();
            $table->string("minimal_order")->nullable();
            $table->string("material")->nullable();

            $table->longText("kelengkapan")->nullable();
            $table->longText("fitur")->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
