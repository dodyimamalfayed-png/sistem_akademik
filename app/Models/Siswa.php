<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    protected $primaryKey = 'id_siswa';

    protected $fillable = [
        'nama_siswa',
        'nis',
        'id_kelas',
        'user_id'
    ];

    // Relasi ke kelas
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }

    // Relasi ke user (login siswa)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relasi ke nilai
    public function nilai()
    {
        return $this->hasMany(Nilai::class, 'id_siswa');
    }
}
