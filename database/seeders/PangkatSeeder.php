<?php

namespace Database\Seeders;

use App\Models\Pangkat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class PangkatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Pangkat::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            'Juru Muda','Juru Muda Tingkat I','Juru','Juru Tingkat I',
            'Pengatur Muda','Pengatur Muda Tingkat I','Pengatur','Pengatur Tingkat I',
            'Penata Muda','Penata Muda Tingkat I','Penata','Penata Tingkat I',
            'Pembina','Pembina Tingkat I','Pembina Utama Muda','Pembina Utama Madya','Pembina Utama'
        ];

        foreach ($data as $value) {
            Pangkat::insert([
                'nama_pangkat' => $value
            ]);
        }
    }
}
