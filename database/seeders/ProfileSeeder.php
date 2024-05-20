<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $sambutan = "Website ini dikelola oleh Pengurus RT 34 Karang Joang, Balikpapan. Tujuannya adalah untuk membuka akses seluas-luasnya kepada masyarakat, termasuk informasi terkait pengelolaan RT dan informasi tentang Kost di lingkungan RT 34 Karang Joang, Balikpapan. Melalui website ini, kami berharap dapat meningkatkan transparansi dan komunikasi antara pengurus RT dan warga, serta memudahkan akses informasi bagi semua pihak. Selain itu, situs ini juga menyediakan berita terkini, dan kegiatan warga yang dapat diakses dengan mudah oleh seluruh warga RT 34.";

        $deskripsi = "RT 34 memiliki visi yang mulia: mewujudkan lingkungan RT yang maju, sejahtera, asri, lestari, dan berkelanjutan melalui pembangunan berwawasan lingkungan yang partisipatif, inovatif, dan akuntabel. Pengurus RT memahami pentingnya kemajuan, kesejahteraan, serta kelestarian lingkungan hidup, dan kami berkomitmen untuk melibatkan seluruh warga dalam proses pembangunan. Dengan semangat kebersamaan, RT 34  percaya bahwa melalui kolaborasi yang kuat, kita dapat mencapai lingkungan yang nyaman, aman, dan sejahtera untuk seluruh warga RT 34.";

        $deskripsiKost = "Selamat datang di halaman website Lapak Kost RT 34, yang terletak di Jl. Sei Wain RT 34 KM 15, Kelurahan Karang Joang, . Di sini, RT 34 menawarkan beragam pilihan kost yang nyaman dan terjangkau untuk Anda yang mencari tempat tinggal di area ini. Dengan lokasi strategis dan fasilitas yang memadai, kami berkomitmen untuk memberikan pengalaman tinggal yang memuaskan bagi setiap penghuni kami. Temukan kenyamanan dan keamanan dalam hunian kami, serta nikmati lingkungan RT yang maju, sejahtera, dan berkelanjutan yang kami bangun bersama-sama.";

        $visi = "Mewujudkan lingkungan RT yang maju, sejahtera, asri, lestari, dan berkelanjutan melalui pembangunan berwawasan lingkungan yang partisipatif, inovatif, dan akuntabel.";

        $misi = "Membangun infrastruktur yang memadai dan ramah lingkungan di RT 34, meningkatkan kualitas lingkungan di RT 34, meningkatkan kesadaran dan partisipasi masyarakat di RT 34, memperkuat kerjasama dengan berbagai pihak khusunya pemerintah daerah dan perguruan tinggi";

        DB::table('profile_rt')->insert([
            'name' => 'Sumardi',
            'sambutan' => $sambutan,
            'deskripsi' => $deskripsi,
            'deskripsi_kost' => $deskripsiKost,
            'visi' => $visi,
            'misi' => $misi,
            'no_wa' => 82109378199,
            'instagram' => 'https://instagram.com',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
