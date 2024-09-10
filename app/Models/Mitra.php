<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Mitra extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'mitra';
    public $timestamps = false;
    protected $primaryKey = 'id_mitra';

    protected $fillable = [
        'username',
        'password',
        'email_mitra',
        'nama_mitra',
        'nomor_telephone',
        'industri',
        'ukuran_perusahaan',
        'situs',
        'deskripsi',
        'alamat',
        'bio',
        'logo',
        'gambar',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function kegiatans()
    {
        return $this->hasMany(Kegiatan::class, 'id_mitra');
    }

    public function Interview()
    {
        return $this->hasMany(Interview::class, 'id_mitra');
    }

}
