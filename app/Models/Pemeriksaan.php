<?php

namespace App\Models;

use App\Models\Obat;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pemeriksaan extends Model
{
    use HasFactory;
    protected $guarded =['id'];
    public function obats()
    {
        return $this->belongsToMany(Obat::class, 'obat_pemeriksaan', 'pemeriksaan_id', 'obat_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class);
    }

}
