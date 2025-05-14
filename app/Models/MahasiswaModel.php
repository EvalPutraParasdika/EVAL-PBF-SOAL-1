<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MahasiswaModel extends Model
{
    protected $table = 'mahasiswas';
    protected $primaryKey = 'nim';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'nama',
        'nim',
        'email',
        'prodi',
    ];
}
