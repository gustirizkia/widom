<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jasa extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function kategori()
    {
        return $this->belongsTo(JasaKategori::class, "kategori_id", "id");
    }

    protected static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $slug = Str::slug($model->nama);

            $model->slug = $slug;
        });
        self::updating(function ($model) {
            $slug = Str::slug($model->nama);

            $model->slug = $slug;
        });
    }
}
