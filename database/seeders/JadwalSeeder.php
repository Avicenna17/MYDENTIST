<?php

namespace Database\Seeders;

use App\Models\Jadwal;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        for ($i = 1; $i < 10; $i++) {
            Jadwal::create([
                'tanggal' => "2023-0$i-06",
                'sesi_awal' => '07:00',
                'sesi_akhir' => '10:00',
                'max_pasien' => 5
            ]);
        }
    }
}
