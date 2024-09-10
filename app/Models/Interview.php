<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'interview_proses';
    protected $primaryKey = 'id_interview';
    protected $fillable = [
        'tgl_interview',
        'lokasi_interview',
        'status_interview',
        'note_interview',
    ];

    public function Mitra()
    {
        return $this->belongsTo(Mitra::class, 'id_mitra');
    }

    public function Pendaftar()
    {
        return $this->belongsTo(Pendaftar::class, 'id_pendaftar');
    }

}
