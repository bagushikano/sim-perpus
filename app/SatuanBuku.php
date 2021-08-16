<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SatuanBuku extends Model
{
    protected $table = 'tb_satuan_buku';

    protected $fillable = [
        'id_buku',
        'kondisi',
        'status_pinjam',
    ];

    public function buku() {
        return $this->belongsTo(Buku::class, 'id_buku', 'id');
    }
}
