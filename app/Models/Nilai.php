<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    // Nama tabel
    protected $table = 'nilai';

    // Primary key
    protected $primaryKey = 'id_nilai';
    public $incrementing = true;   // Auto increment
    protected $keyType = 'int';    // Tipe primary key integer

    // Kolom yang bisa diisi
    protected $fillable = [
        'id_siswa',
        'id_mapel',
        'nilai'
    ];

    /**
     * Agar route model binding menggunakan id_nilai
     */
    public function getRouteKeyName()
    {
        return 'id_nilai';
    }

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
