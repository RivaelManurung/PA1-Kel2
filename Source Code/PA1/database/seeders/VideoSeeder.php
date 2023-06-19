<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Video;


class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = array(
            [
                'judul' => 'Keren Kelompok Tani Milenial Sukses Meraup Untung dari Sayur Organik', 
                'video' => 'videotani.mp4',
                'deskripsi' => 'Kelompok Tani Milenial merupakan sebuah komunitas petani yang terdiri dari generasi milenial yang aktif dan inovatif dalam mengembangkan usaha pertanian sayur organik. Dengan semangat kewirausahaan dan pengetahuan yang luas tentang pertanian modern, kelompok ini telah berhasil mencapai kesuksesan yang menggiurkan dalam usaha mereka  Mengusung konsep pertanian organik, kelompok ini berkomitmen untuk menghasilkan sayuran berkualitas tinggi tanpa menggunakan bahan kimia sintetik. Mereka menjaga keberlanjutan lingkungan dengan menerapkan praktik-praktik pertanian ramah lingkungan, seperti penggunaan pupuk organik dan pengendalian hama alami. Hal ini tidak hanya memberikan manfaat bagi konsumen yang mendapatkan sayuran segar dan sehat, tetapi juga berdampak positif pada ekosistem sekitar.Salah satu kunci kesuksesan Kelompok Tani Milenial adalah penerapan teknologi dalam kegiatan pertanian mereka. Mereka menggunakan metode irigasi otomatis, pemantauan tanaman melalui sensor, dan aplikasi mobile untuk mengoptimalkan pemupukan dan pengairan. Dengan teknologi ini, mereka dapat mengendalikan secara efisien faktor-faktor penting dalam pertumbuhan tanaman, sehingga menghasilkan hasil panen yang melimpah.'   , 
            ],
        );
        foreach ($data as $d){
            Video::create([
                'judul' => $d['judul'],
                'video' => $d['video'],
                'deskripsi' => $d['deskripsi']
            ]);
        }
            
    }
}
