<?php

// app/Models/Kelas.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas';
    protected $primaryKey = 'id_kelas'; // <- ini penting
    public function getRouteKeyName()
    {
        return 'id_kelas';
    }


    protected $fillable = ['nama_kelas', 'wali_kelas_id'];

    public function waliKelas()
    {
        return $this->belongsTo(User::class, 'wali_kelas_id');
    }

    public function siswa()
    {
        return $this->hasMany(Siswa::class, 'id_kelas');
    }
}
