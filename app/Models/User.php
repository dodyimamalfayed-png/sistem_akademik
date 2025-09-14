<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';
    // Hapus atau ubah ini:
    // protected $primaryKey = 'id_user'; 

    // Laravel default pakai 'id', jadi tidak perlu didefinisikan lagi
    // kecuali kamu memang pakai 'id_user' di migration.

    protected $fillable = [
        'name', 'email', 'password', 'role'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

        // relasi ke tabel siswa
    public function siswa()
    {
        return $this->hasOne(Siswa::class, 'user_id', 'id');
    }

    // kalau ada role guru
    public function guru()
    {
        return $this->hasOne(Guru::class, 'user_id', 'id');
    }

}
