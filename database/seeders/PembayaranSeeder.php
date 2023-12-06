<?php

namespace Database\Seeders;

use App\Models\Pembayaran;
use App\Models\Pemeriksaan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PembayaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 12; $i++) {
            Pemeriksaan::create([
                'name' => "halp",
                'jadwal_id' => $i,
                "keluhan" => 'Patah Hati',
                'status'=>'hadir'
                // 'catatan'=>'Move On Dek',
            ]);
        }
        for ($i = 1; $i <= 12; $i++) {
            Pembayaran::create([
                'pemeriksaan_id' =>$i,
                'total_bayar' => $i.'000000',
                'status' => 'terbayar',
                'metode' => 'cash',
                'bukti_bayar' => 'photo.jpg',
                'created_at'=>"2023-0$i-06",
            ]);
        }
    }
}
