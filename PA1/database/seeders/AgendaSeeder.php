<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AgendaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            $data = array(
                [
                    'kegiatan' => 'pendistribusian Bibit kopi', 
                    'tanggal' => '2021-11-13',
                    'jam' => '10:00',
                    'tempat'=>'Desa Pardomuan Nauli',
                ],
                [
                    'kegiatan' => 'TNI Tinjau Perkembangan kopi di Desa Pardomuan Nauli', 
                    'tanggal' => '2022-01-12',
                    'jam' => '15:00',
                    'tempat'=>'Kebun Kopi Desa Pardomuan Nauli',
                ],
                [
                    'kegiatan' => 'Penyalurkan bibit jahe Kepada kelompok Tani', 
                    'tanggal' => '2021-12-21',
                    'jam' => '09:45',
                    'tempat'=>'Desa Pardomuan Nauli',
                ],
                [
                    'kegiatan' => 'Field trip Pengamatan Tanaman Padi dan Sistem Irigasi', 
                    'tanggal' => '2022-11-21',
                    'jam' => '10:00',
                    'tempat'=>'Desa Pardomuan Nauli',
                ],
                [
                    'kegiatan' => 'Pelatihan Penyuluhan dan komunikasi Efektif untuk Petani', 
                    'tanggal' => '2022-10-21',
                    'jam' => '09:00',
                    'tempat'=>'Balai Desa',
                ],
                [
                    'kegiatan' => 'Seminar Kesehatan Tanaman dan Pengedalian Penyakit', 
                    'tanggal' => '2022-12-10',
                    'jam' => '08:30 ',
                    'tempat'=>'Kantor Pertanian Kabupaten',
                ],
               
            );
            foreach ($data as $d){
                Barang::create([
                    'kegiatan' => $d['kegiatan'],
                    'tanggal' => $d['tanggal'],
                    'jam' => $d['jam'],
                    'tempat' => $d['tempat'],
                ]);
            }    }
}
