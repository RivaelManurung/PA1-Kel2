<?php

namespace Database\Seeders;

use App\Models\ProyekTani;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProyekTaniSeeder extends Seeder
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
                'judul' => '1.	PENANAMAN BIBIT PADI 2 DESA PARDOMUAN NAULI KECAMATAN LAGUBOTI', 
                'gambar' => 'bibit.jpeg',
                'deskripsi' => 'Berdasarkan kerja dinas pertanian kabupaten toba samosir tahun anggaran 2022 rencana kegiatan penanaman bibit padi 2 kali panen sebanyak 250kg dengan kelompok masyarakat yang memiliki kompetensi dalam pengembangan sumber daya padi dari desa pardomuan nauli. Dengan adanya penanaman padi di wilayah pardomuan nauli sekaligus sebagai wadah percobaan penanaman dan pengembangan padi 2 kali panen, berdasarkan uji coba penanaman tani tersebut diperoleh hasil yang memuaskan dimana pada awalnya bantuan bibit yang diberikan sebanyak 250kg dan memperoleh hasil sebanyak 700kg padi. Lahan yang digunakan sebagai media penanaman padi yaitu lahan dari Bpk.Rico Hutapea , dengan percobaan penanaman padi 2 kali panen tersebut dapat dipasstikan bahwa di Desa Pardomuan Nauli dapat bertumbuh dan berkembang.',
            ],
            [
                'judul' => '2.	PENANAMAN BIBIT JAGUNG DESA PARDOMUAN NAULI KECAMATAN LAGUBOTI', 
                'gambar' => 'bibitjagung.jpeg',
                'deskripsi' => 'Berdaasarkan rencana kerja PPL Tani Laguboti tahun anggaran 2022 rencana kegiatan penanaman bibit jagung sebanyak 150kg dengan kelompok tani yang memiliki kompetensi dalam mengembangkan sumber daya bawang dari desa pardomuan nauli. Dengan adanya penanaman jagung di wilayah desa pardomuan nauli sekaligus sebagai wadah percobaan penanaman dan pengembangan jagung, berdsarkan uji coba penanaman tani tersebut diperoleh hasil yang memuaskan dimana pada awalnya bantuan bibit yang diberikan sebanyak 150kg dan memperoleh hasil jagung sebanyak 550kg jagung. Lahan yang digunakan sebagai media penanaman jagung adalah lahan pemerintah yang disumbangkan utuk masyarakat, dengan percobaan penanaman jagung tersebut dapat dipastikan bahwa di Desa Pardomuan Nauli jagung dapat tumbuh dan berkembang',
            ],
            [
                'judul' => '3.	PERENCANAAN PENGEMBANGAN BIJI KOPI ARABIKA', 
                'gambar' => 'bibitkopi.jpeg',
                'deskripsi' => 'Berdasarkan perjanjian Kerjasama antara dinas pertanian kabupaten toba samosir dengan dinas pariwisata, kopi arabika akan lebih dikembangkan lagi dikarenakan banyak nya wisatawan yang tertarik dengan kopi arabika atau sering disebut dengan kopi toba. Penanaman dan pengembangan biji kopi arabika ini telah didukung langsung oleh dinas pertanian toba samosir dengan memberi benih bibit kopi sebanyak 45kg kepada setiap petani yang ada di desa pardomuan nauli kecamatan laguboti. Yang nantinya hasil dari kopi arabika ini akan diperjualbelikan didalam maupun diluar negeri, dan akan memberikan kenaikan dampak ekonomi bagi masyarakat toba khusunya desa pardomuan nauli.',
            ],
        );
        foreach ($data as $d){
            ProyekTani::create([
                'judul' => $d['judul'],
                'gambar' => $d['gambar'],
                'deskripsi' => $d['deskripsi']
            ]);
        }
    }
}
