<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjekHasKategoriJasa extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function projek()
    {
        return $this->belongsTo(Projek::class, "projek_id", "id");
    }

    public function kategoriJasa()
    {
        return $this->belongsTo(JasaKategori::class, "kategori_jasa_id", "id");
    }
}
