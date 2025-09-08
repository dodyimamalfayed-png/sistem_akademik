<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $table = 'nilai';
    protected $primaryKey = 'id_nilai';

    protected $fillable = [
        'id_siswa',
        'id_mapel',
        'nilai'
    ];

    // Relasi ke siswa
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa');
    }

    // Relasi ke mata pelajaran
    public function mapel()
    {
        return $this->belongsTo(MataPelajaran::class, 'id_mapel');
    }
}

