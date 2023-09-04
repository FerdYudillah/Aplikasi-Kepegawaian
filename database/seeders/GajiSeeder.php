<?php

namespace Database\Seeders;

use App\Models\Gaji;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GajiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gaji = [
            [
                'golongan' => 'IVe',
                'masa_kerja' => '0 Tahun',
                'gaji_pokok' => '3.593.100',
                'tahun' => '2023-2024',
            ],
            [
                'golongan' => 'IVe',
                'masa_kerja' => '2 Tahun',
                'gaji_pokok' => '3.706.200',
                'tahun' => '2023-2024',
            ],
            [
                'golongan' => 'IVe',
                'masa_kerja' => '4 Tahun',
                'gaji_pokok' => '3.822.900',
                'tahun' => '2023-2024',
            ],
            [
                'golongan' => 'IVe',
                'masa_kerja' => '6 Tahun',
                'gaji_pokok' => '3.943.300',
                'tahun' => '2023-2024',
            ],
            [
                'golongan' => 'IVe',
                'masa_kerja' => '8 Tahun',
                'gaji_pokok' => '4.067.500',
                'tahun' => '2023-2024',
            ],
            [
                'golongan' => 'IVe',
                'masa_kerja' => '10 Tahun',
                'gaji_pokok' => '4.195.700',
                'tahun' => '2023-2024',
            ],
            [
                'golongan' => 'IVe',
                'masa_kerja' => '12 Tahun',
                'gaji_pokok' => '4.327.800',
                'tahun' => '2023-2024',
            ],
            [
                'golongan' => 'IVe',
                'masa_kerja' => '14 Tahun',
                'gaji_pokok' => '4.464.100',
                'tahun' => '2023-2024',
            ],
            [
                'golongan' => 'IVe',
                'masa_kerja' => '16 Tahun',
                'gaji_pokok' => '4.604.700',
                'tahun' => '2023-2024',
            ],
            [
                'golongan' => 'IVe',
                'masa_kerja' => '18 Tahun',
                'gaji_pokok' => '4.749.700',
                'tahun' => '2023-2024',
            ],
            [
                'golongan' => 'IVe',
                'masa_kerja' => '20 Tahun',
                'gaji_pokok' => '4.899.300',
                'tahun' => '2023-2024',
            ],
            [
                'golongan' => 'IVe',
                'masa_kerja' => '22 Tahun',
                'gaji_pokok' => '5.053.600',
                'tahun' => '2023-2024',
            ],
            [
                'golongan' => 'IVe',
                'masa_kerja' => '24 Tahun',
                'gaji_pokok' => '5.212.800',
                'tahun' => '2023-2024',
            ],
            [
                'golongan' => 'IVe',
                'masa_kerja' => '26 Tahun',
                'gaji_pokok' => '5.377.000',
                'tahun' => '2023-2024',
            ],
            [
                'golongan' => 'IVe',
                'masa_kerja' => '28 Tahun',
                'gaji_pokok' => '5.546.300',
                'tahun' => '2023-2024',
            ],
            [
                'golongan' => 'IVe',
                'masa_kerja' => '30 Tahun',
                'gaji_pokok' => '5.721.000',
                'tahun' => '2023-2024',
            ],
            [
                'golongan' => 'IVe',
                'masa_kerja' => '32 Tahun',
                'gaji_pokok' => '5.901.200',
                'tahun' => '2023-2024',
            ],

          ];

          foreach($gaji as $key => $value){
            Gaji::create($value);
          }
    }
}
