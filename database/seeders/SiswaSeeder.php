<?php

namespace Database\Seeders;

use App\Models\Siswa;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Siswa::create([
            'nama_depan' => 'Abraham',
            'nama_belakang' => 'Oplayo',
            'nis' => '1123',
            'jenis_kelamin' => 'Laki-laki',
            'agama' => 'Katolik',
            'alamat' => 'Dabolding',
            'foto' => 'abraham.png'
        ]);
        Siswa::create([
            'nama_depan' => 'Lukas',
            'nama_belakang' => 'Wenda',
            'nis' => '1124',
            'jenis_kelamin' => 'Laki-laki',
            'agama' => 'Katolik',
            'alamat' => 'Dabolding',
            'foto' => 'lukas.png'
        ]);
    }
}
