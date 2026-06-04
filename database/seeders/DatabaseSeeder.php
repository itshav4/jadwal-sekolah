<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Jadwal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create admin user
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('admin123'),
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);

        // Create student user (Fahmi)
        User::create([
            'name' => 'Fahmi Mulkishava',
            'email' => 'fahmi.mulkishava@gmail.com',
            'password' => bcrypt('fahmi123'),
            'role' => 'siswa',
            'email_verified_at' => now(),
        ]);

        // Create dummy jadwal data
        $jadwalData = [
            // Senin
            ['hari' => 'Senin', 'jam' => '1', 'nama_mapel' => 'Bahasa Inggris', 'guru_pengampu' => 'Miss Siti'],
            ['hari' => 'Senin', 'jam' => '2', 'nama_mapel' => 'Matematika', 'guru_pengampu' => 'Mr. Budi'],
            ['hari' => 'Senin', 'jam' => '3', 'nama_mapel' => 'IPA', 'guru_pengampu' => 'Mrs. Dewi'],
            ['hari' => 'Senin', 'jam' => '4', 'nama_mapel' => 'Bahasa Indonesia', 'guru_pengampu' => 'Mr. Roni'],

            // Selasa
            ['hari' => 'Selasa', 'jam' => '1', 'nama_mapel' => 'Matematika', 'guru_pengampu' => 'Mr. Budi'],
            ['hari' => 'Selasa', 'jam' => '2', 'nama_mapel' => 'IPS', 'guru_pengampu' => 'Mr. Ahmad'],
            ['hari' => 'Selasa', 'jam' => '3', 'nama_mapel' => 'Olahraga', 'guru_pengampu' => 'Mr. Hendra'],
            ['hari' => 'Selasa', 'jam' => '4', 'nama_mapel' => 'Seni', 'guru_pengampu' => 'Mrs. Rina'],

            // Rabu
            ['hari' => 'Rabu', 'jam' => '1', 'nama_mapel' => 'Bahasa Indonesia', 'guru_pengampu' => 'Mr. Roni'],
            ['hari' => 'Rabu', 'jam' => '2', 'nama_mapel' => 'Bahasa Inggris', 'guru_pengampu' => 'Miss Siti'],
            ['hari' => 'Rabu', 'jam' => '3', 'nama_mapel' => 'Komputer', 'guru_pengampu' => 'Mr. Irfan'],
            ['hari' => 'Rabu', 'jam' => '4', 'nama_mapel' => 'IPA', 'guru_pengampu' => 'Mrs. Dewi'],

            // Kamis
            ['hari' => 'Kamis', 'jam' => '1', 'nama_mapel' => 'IPS', 'guru_pengampu' => 'Mr. Ahmad'],
            ['hari' => 'Kamis', 'jam' => '2', 'nama_mapel' => 'Matematika', 'guru_pengampu' => 'Mr. Budi'],
            ['hari' => 'Kamis', 'jam' => '3', 'nama_mapel' => 'PKN', 'guru_pengampu' => 'Mr. Sukri'],
            ['hari' => 'Kamis', 'jam' => '4', 'nama_mapel' => 'Seni', 'guru_pengampu' => 'Mrs. Rina'],

            // Jumat
            ['hari' => 'Jumat', 'jam' => '1', 'nama_mapel' => 'Olahraga', 'guru_pengampu' => 'Mr. Hendra'],
            ['hari' => 'Jumat', 'jam' => '2', 'nama_mapel' => 'Komputer', 'guru_pengampu' => 'Mr. Irfan'],
            ['hari' => 'Jumat', 'jam' => '3', 'nama_mapel' => 'Bahasa Inggris', 'guru_pengampu' => 'Miss Siti'],
            ['hari' => 'Jumat', 'jam' => '4', 'nama_mapel' => 'Agama', 'guru_pengampu' => 'Mr. Yusuf'],
        ];

        foreach ($jadwalData as $jadwal) {
            Jadwal::create($jadwal);
        }
    }
}
