<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{

    use HasFactory;
    protected $guarded =['id'];
    public function pemeriksaans()
    {
        return $this->belongsToMany(Pemeriksaan::class, 'obat_pemeriksaan', 'obat_id', 'pemeriksaan_id');
    }
}
