<?php

namespace Database\Factories;

use App\Models\Mentor;
use App\Models\Siswa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Buku>
 */
class BukuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $ambilDariMentor = rand(0, 1); 

        // 2. Ambil nama berdasarkan hasil acakan
        if ($ambilDariMentor) {
            // Coba ambil nama dari tabel Mentor secara acak
            // Ganti 'name' dengan 'nama' jika kolom di database Anda bernama 'nama'
            $penulis = Mentor::inRandomOrder()->value('nama');
        } else {
            // Coba ambil nama dari tabel Siswa secara acak
            $penulis = Siswa::inRandomOrder()->value('nama');
        }

        // 3. Fallback (Jaga-jaga jika tabel Mentor/Siswa masih kosong)
        // Jika $penulis kosong (null), pakai nama palsu dari Faker
        $namaFinal = $penulis ?? $this->faker->name();
        return [
            //
            'judul_buku' => $this->faker->sentence(3),
            
            'penulis' => $namaFinal, 
            
            'tanggal_rilis' => $this->faker->dateTimeBetween('2016-01-01', '2025-12-31')->format('Y-m-d'),            'mentor_id' => Mentor::inRandomOrder()->first()->id,
            'siswa_id' => Siswa::inRandomOrder()->first()->id
        ];
    }
}
