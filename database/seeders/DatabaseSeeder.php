<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Jadwal;
use App\Models\Obat;
use App\Models\Pembayaran;
use App\Models\User;
use App\Models\Pemeriksaan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::create([
            'name' => 'avi',
            'email' => 'avi@gmail.com',
            'password' => bcrypt('1234'),
            'alamat' => "Sepanjang",
            'no_telepon' => '081234567',
            'role' => 'dokter',
        ]);
        User::create([
            'name' => 'cavel',
            'email' => 'cavel@gmail.com',
            'password' => bcrypt('1234'),
            'alamat' => "gunungsari",
            'no_telepon' => '081234567',
            'role' => 'admin',
        ]);
        for ($i = 0; $i < 10; $i++) {
            # code...
            User::create([
                'name' => 'avi' . $i,
                'email' => "avi$i@gmail.com",
                'password' => bcrypt('1234'),
                'alamat' => "Sepanjang",
                'no_telepon' => '081234567',
                'role' => 'pasien',
            ]);
        }
        $obats = ['paracetamol', 'ibuprofen', 'paramex', 'ganja', 'sabu', 'heroine'];
        foreach ($obats as $item) {
            Obat::create([
                'nama_obat' => $item,
            ]);
        }

        for ($i = 1; $i < 10; $i++) {
            Jadwal::create([
                'tanggal' => "2023-0$i-06",
                'sesi_awal' => '07:00',
                'sesi_akhir' => '10:00',
                'max_pasien' => 5
            ]);
        }
        for ($i = 1; $i < 10; $i++) {
            Pemeriksaan::create([
                'user_id' => 1,
                'jadwal_id' => $i,
                "keluhan" => 'Patah Hati',
                'status'=>'hadir'
                // 'catatan'=>'Move On Dek',
            ]);
        }
        for ($i = 1; $i < 10; $i++) {
            Pembayaran::create([
                'pemeriksaan_id' =>$i,
                'total_bayar' => $i.'000000',
                'status' => 'terbayar',
                'metode' => 'cash',
                'bukti_bayar' => 'photo.jpg',
                'created_at'=>"2023-0$i-06",
            ]);
        }
        // foreach($obats as $index =>$item) {
        //     DB::table('obat_pemeriksaan')->insert([
        //         'obat_id' => $index,
        //         'pemeriksaan_id' => '1',
        //     ]);
        // }
        // for ($i=0; $i < ; $i++) {
        //     # code...
        // }
    }
}
