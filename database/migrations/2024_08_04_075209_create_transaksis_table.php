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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->string("kode");
            $table->bigInteger("user_id");
            $table->bigInteger("bank_id");
            $table->decimal("amount", 20);
            $table->string("status")->default("dalam proses");
            $table->string("bukti_bayar")->nullable();
            $table->string("provinsi")->nullable();
            $table->string("kota")->nullable();
            $table->string("kecamatan")->nullable();
            $table->longText("alamat_lengkap");
            $table->dateTime("tanggal_bayar")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
