<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaksi extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function bank()
    {
        return $this->belongsTo(Bank::class, "bank_id", "id");
    }

    public function detail()
    {
        return $this->hasMany(TransaksiDetail::class, "transaksi_id", "id");
    }

    protected static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $kode = time();

            $model->kode = "INV/WISDOM/$kode";
        });
    }
}
