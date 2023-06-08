<?php

namespace Database\Seeders;

use App\Models\Barang;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            [
                'nama' => 'Cangkul', 
                'jumlah' => '10',
                'gambar' => 'cangkul.jpg', 
            ],
            [
                'nama' => 'Cangkul garpu', 
                'jumlah' => '10',
                'gambar' => 'cangkul garpu.jpg',
            ],
            [
                'nama' => 'kultivator', 
                'jumlah' => '10',
                'gambar' => 'kultivator.jpg',
            ],
            [
                'nama' => 'Mesin pemanen-odong-odong', 
                'jumlah' => '10',
                'gambar' => 'Mesin pemanen-odong-odong.jpg',
            ],            
            [
                'nama' => 'penanam jagung', 
                'jumlah' => '10',
                'gambar' => 'penanam jagung.jpg',
            ],            
            [
                'nama' => 'pompa irigasi', 
                'jumlah' => '10',
                'gambar' => 'pompa irigasi.jpg',
            ],            
            [
                'nama' => 'Rotavator', 
                'jumlah' => '10',
                'gambar' => 'Rotavator.jpg',
            ],           
            [
                'nama' => 'semprot', 
                'jumlah' => '10',
                'gambar' => 'semprot.jpg',
            ],            
            [
                'nama' => 'traktor tangan', 
                'jumlah' => '10',
                'gambar' => 'traktor tangan.jpg',
            ],
        );
        foreach ($data as $d){
            Barang::create([
                'nama' => $d['nama'],
                'jumlah' => $d['jumlah'],
                'gambar' => $d['gambar']
            ]);
        }
    }
}
