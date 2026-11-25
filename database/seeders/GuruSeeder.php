<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GuruSeeder extends Seeder
{
    public function run(): void
    {
        $dataGuru = [
            [
                'nama_guru' => 'Ahmad Fauzi',
                'nip' => '198501012010011',
                'nama_mapel' => 'Matematika',
                'foto' => 'guru/logo2.png',
            ],
            [
                'nama_guru' => 'Siti Aminah',
                'nip' => '198702152012012',
                'nama_mapel' => 'Bahasa Indonesia',
                'foto' => 'guru/logo2.png',
            ],
            [
                'nama_guru' => 'Budi Santoso',
                'nip' => '199003102015031',
                'nama_mapel' => 'Bahasa Inggris',
                'foto' => 'guru/logo2.png',
            ],
        ];

        foreach ($dataGuru as $data) {
            $sekarang = now();
            $namaMapel = $data['nama_mapel'];

            // Pastikan mata pelajaran tersedia.
            DB::table('mata_pelajaran')->updateOrInsert(
                ['nama_mapel' => $namaMapel],
                ['updated_at' => $sekarang]
            );

            $idMapel = DB::table('mata_pelajaran')
                ->where('nama_mapel', $namaMapel)
                ->value('id_mapel');

            // Simpan guru berdasarkan NIP.
            DB::table('guru')->updateOrInsert(
                ['nip' => $data['nip']],
                [
                    'nama_guru' => $data['nama_guru'],
                    'id_mapel' => $idMapel,
                    'foto' => $data['foto'],
                    'created_at' => $sekarang,
                    'updated_at' => $sekarang,
                ]
            );
        }
    }
}