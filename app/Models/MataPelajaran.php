<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MataPelajaran extends Model
{
    protected $table = 'mata_pelajaran';
    protected $primaryKey = 'id_mapel';

    protected $fillable = [
        'nama_mapel'
    ];

    // Relasi ke nilai
    public function nilai()
    {
        return $this->hasMany(Nilai::class, 'id_mapel');
    }
}

