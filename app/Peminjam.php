<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peminjam extends Model
{
    protected $table = 'tb_peminjam';

    protected $fillable = [
        'nama',
        'noinduk',
    ];
}
