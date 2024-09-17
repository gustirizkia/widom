<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projek extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }

    public function projekHasKategoriJasa()
    {
        return $this->hasMany(ProjekHasKategoriJasa::class, "projek_id", "id");
    }
}
