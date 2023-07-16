<?php

namespace App\Models;

use App\Models\Pemeriksaan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pembayaran extends Model
{
    use HasFactory;
    protected $guarded =['id'];
    public function pemeriksaan()
    {
        return $this->belongsTo(Pemeriksaan::class);
    }
}
