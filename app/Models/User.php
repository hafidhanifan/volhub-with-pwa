<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'password',
        'email_user',
        'nama_user',
        'nomor_telephone',
        'pendidikan_terakhir',
        'gender',
        'domisili',
        'deskripsi',
        'bio',
        'usia',
        'foto_profile',
        'cv',
        'instagram',
        'linkedIn'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'user_skill', 'id_user', 'id_skill');
    }
    public function pendaftars()
    {
        return $this->hasMany(Pendaftar::class, 'id_user');
    }
    public function experiences()
    {
        return $this->hasMany(Experience::class, 'id_user');
    }
    public function pushSubscriptions()
    {
    return $this->hasMany(PushSubscription::class, 'user_id');
    }

}
