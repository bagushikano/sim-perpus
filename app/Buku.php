<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Penerbit;

class Buku extends Model
{
    protected $table = 'tb_buku';

    protected $fillable = [
        'id_penerbit',
        'nama_buku',
        'isbn',
    ];

    public function satuanBuku() {
        return $this->hasMany(SatuanBuku::class, 'id_buku', 'id');
    }

    public function penerbit() {
        return $this->belongsTo(Penerbit::class, 'id_penerbit', 'id');
    }

    public function getPenerbit() {
        return Penerbit::where('id', $this->id_penerbit)->first();
    }

    public function getSatuanBuku() {
        return SatuanBuku::where('id', $this->id_buku)->get();
    }
}
