<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $fillable = [

        'nama_produk',
        'foto',
        'harga',
        'stok',
        'satuan',
        'deskripsi'

    ];
    public function diagnoses()
    {
        return $this->belongsToMany(
            Diagnosis::class,
            'diagnosis_produks'
        )
        ->withPivot(
            'qty',
            'is_selected'
        )
        ->withTimestamps();
    }
}

