<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ukuran extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'keluhan',
        'riwayat_penyakit',
        'ukuran_kacamata_lama',
        'right_sph', 'right_cyl', 'right_axis', 'right_add', 'right_mpd', 'right_prisma', 'right_visus',
        'left_sph', 'left_cyl', 'left_axis', 'left_add', 'left_mpd', 'left_prisma', 'left_visus',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
