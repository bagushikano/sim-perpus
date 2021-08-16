<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penerbit extends Model
{
    protected $table = 'tb_penerbit';

    protected $fillable = [
        'nama_penerbit',
    ];

    public function penerbit() {
        return $this->hasMany(Buku::class, 'id_penerbit', 'id');
    }
}
