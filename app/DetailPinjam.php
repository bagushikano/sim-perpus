<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPinjam extends Model
{
    protected $table = 'tb_detail_pinjam';

    protected $fillable = [
        'id_pinjam',
        'id_satuan_buku',
        'is_broken',
    ];

    public function pinjam() {
        return $this->belongsTo(Pinjam::class, 'id_pinjam', 'id');
    }
}
