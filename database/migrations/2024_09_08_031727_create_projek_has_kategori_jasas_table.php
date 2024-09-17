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
        Schema::create('projek_has_kategori_jasas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("projek_id");
            $table->bigInteger("kategori_jasa_id");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projek_has_kategori_jasas');
    }
};
