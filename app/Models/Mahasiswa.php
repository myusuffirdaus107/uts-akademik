<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{

protected $table = 'mahasiswa';
    public function jurusan()
{
    return $this->belongsTo(Jurusan::class, 'id_jurusan');
}

    public function matakuliah()
{
    return $this->belongsToMany(
        Matakuliah::class,
        'mahasiswa_matakuliah',
        'mahasiswa_id',
        'matakuliah_id'
    );
}
protected $fillable = [
    'nim',
    'nama',
    'id_jurusan'
];
}
