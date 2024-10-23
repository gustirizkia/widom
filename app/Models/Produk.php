<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produk extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function kategori()
    {
        return $this->belongsTo(KategoriProduk::class, "kategori_produk_id", "id");
    }
    public function image()
    {
        return $this->hasMany(ImageProduk::class, "produk_id", "id");
    }
    public function imageThumbnail()
    {
        return $this->hasOne(ImageProduk::class, "produk_id", "id")->where("is_thumbnail", 1);
    }

    public function pertanyaan()
    {
        return $this->hasMany(PertanyaanHasProduk::class, "produk_id", "id");
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
