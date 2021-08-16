<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Peminjam;

class Pinjam extends Model
{
    protected $table = 'tb_pinjam';

    protected $fillable = [
        'id_peminjam',
        'is_returned',
        'date_start',
        'date_end',
        'returned_date',
        'denda',
    ];

    public function getPeminjam() {
        return Peminjam::where('id', $this->id_peminjam)->first();
    }

    public function detailPinjam() {
        return $this->hasMany(DetailPinjam::class, 'id_buku', 'id');
    }

}
