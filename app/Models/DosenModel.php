<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DosenModel extends Model
{
    protected $table = 'dosens';
    protected $primaryKey = 'nidn';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'nama',
        'nidn',
        'email',
        'prodi',
    ];
}
