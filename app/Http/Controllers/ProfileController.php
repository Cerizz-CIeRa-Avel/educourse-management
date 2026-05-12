<?php

namespace App\Http\Controllers;

class ProfileController extends Controller
{
    public function index()
    {
        $developer = [
            'nama'       => 'Muhammad Farrel Aqil Fauzy',
            'kelas'      => 'Manajemen Informatika',
            'nim'        => '25781012',
            'email'      => 'farrelaqilf@educourse.ac.id',
            'phone'      => '+62 851-5886-4700',
            'lokasi'     => 'Lampung, Indonesia',
            'bio'        => 'Mahasiswa Jurusan Teknologi Informasi, Program Studi Manajemen Informatika yang ingin menjalajahi lebih jauh, mengenai program dan lainnya.',
            'foto'       => 'https://ui-avatars.com/api/?name=Farrel+Aqil&background=4f46e5&color=fff&size=300',
            'sosmed'     => [
                ['platform' => 'GitHub',    'url' => 'https://github.com/Cerizz-CIeRa-Avel',    'icon' => 'bi-github',    'color' => '#333'],
                ['platform' => 'LinkedIn',  'url' => 'https://linkedin.com/in/',   'icon' => 'bi-linkedin',  'color' => '#0a66c2'],
                ['platform' => 'Instagram', 'url' => 'https://www.instagram.com/maincrizz_/', 'icon' => 'bi-instagram', 'color' => '#e4405f'],
                ['platform' => 'Twitter',   'url' => 'https://x.com/Maincrizz',   'icon' => 'bi-twitter-x', 'color' => '#000'],
            ],
            'skills'     => [
                ['nama' => 'PHP / Laravel',    'level' => 15, 'color' => 'primary'],
                ['nama' => 'JavaScript',       'level' => 40, 'color' => 'warning'],
                ['nama' => 'HTML / CSS',       'level' => 95, 'color' => 'success'],
                ['nama' => 'MySQL',            'level' => 50, 'color' => 'info'],
                ['nama' => 'Git & GitHub',     'level' => 20, 'color' => 'danger'],
                ['nama' => 'Bootstrap',        'level' => 15, 'color' => 'secondary'],
                ['nama' => 'React / Vue',      'level' => 20, 'color' => 'primary'],
                ['nama' => 'Python',           'level' => 5, 'color' => 'warning'],
            ],
            'pengalaman' => [
                [
                    'posisi'    => 'Belum Memiliki Posisi',
                    'tempat'    => 'Tidak Tersedia',
                    'periode'   => '-',
                    'deskripsi' => '-',
                ],
            ],
            'pendidikan' => [
                [
                    'gelar'   => 'D3 Manajemen Informatika',
                    'tempat'  => 'Politeknik Negeri Lampung',
                    'periode' => '2025 - Sekarang',
                    'ipk'     => '3.89',
                ],
                [
                    'gelar'   => 'SMK',
                    'tempat'  => 'SMK Negeri 7 Palembang',
                    'periode' => '2020 – 2024',
                    'ipk'     => null,
                ],
            ],
            'sertifikat' => [
                'Belum Memiliki Sertifikat',
            ],
        ];

        return view('profile.index', compact('developer'));
    }
}
