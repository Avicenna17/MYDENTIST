<?php

namespace Database\Seeders;

use App\Models\Obat;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $obats = ['paracetamol', 'ibuprofen', 'paramex'];
        foreach ($obats as $item) {
            Obat::create([
                'nama_obat' => $item,
            ]);
        }
    }
}
