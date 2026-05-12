<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    private function allStudents(): array
    {
        return [
            ['id' => 1,  'nama' => 'Abdul Qohhar',        'nim' => '25781001', 'jurusan' => 'Teknologi Informasi',      'angkatan' => 2025, 'status' => 'Aktif'],
            ['id' => 2,  'nama' => 'Alvin Adiyatama',         'nim' => '25781002', 'jurusan' => 'Teknologi Informasi',        'angkatan' => 2025, 'status' => 'Aktif'],
            ['id' => 3,  'nama' => 'Bontor H Silalahi',        'nim' => '25781004', 'jurusan' => 'Teknologi Informasi',      'angkatan' => 2025, 'status' => 'Aktif'],
            ['id' => 4,  'nama' => 'Dhimar Gevira A',        'nim' => '25781005', 'jurusan' => 'Teknologi Informasi', 'angkatan' => 2025, 'status' => 'Aktif'],
            ['id' => 5,  'nama' => 'Enzo Alghifari',       'nim' => '25781006', 'jurusan' => 'Teknologi Informasi',      'angkatan' => 2025, 'status' => 'Aktif'],
            ['id' => 6,  'nama' => 'Gandis Asmara',         'nim' => '25781008', 'jurusan' => 'Teknologi Informasi',        'angkatan' => 2025, 'status' => 'Nonaktif'],
            ['id' => 7,  'nama' => 'Haya Agniya J M',          'nim' => '25781009', 'jurusan' => 'Teknologi Informasi',      'angkatan' => 2025, 'status' => 'Aktif'],
            ['id' => 8,  'nama' => 'Jordan Panggabean',      'nim' => '25781010', 'jurusan' => 'Teknologi Informasi', 'angkatan' => 2025, 'status' => 'Aktif'],
            ['id' => 9,  'nama' => 'Muhammad Farrel Aqil Fauzy',       'nim' => '25781012', 'jurusan' => 'Teknologi Informasi',        'angkatan' => 2025, 'status' => 'Nonaktif'],
            ['id' => 10, 'nama' => 'Tesya Aprisah',       'nim' => '25781024', 'jurusan' => 'Teknologi Informasi',      'angkatan' => 2025, 'status' => 'Aktif'],
            ['id' => 11, 'nama' => 'Yandri Utama',        'nim' => '25781025', 'jurusan' => 'Teknologi Informasi',        'angkatan' => 2025, 'status' => 'Aktif'],
            ['id' => 12, 'nama' => 'Rafi Aditya Hakim',        'nim' => '25781019', 'jurusan' => 'Teknologi Informasi',      'angkatan' => 2025, 'status' => 'Aktif'],
            ['id' => 13, 'nama' => 'M Ilham Isnaini',        'nim' => '25781014', 'jurusan' => 'Teknologi Informasi', 'angkatan' => 2025, 'status' => 'Aktif'],
            ['id' => 14, 'nama' => 'Riski Winata',        'nim' => '25781021', 'jurusan' => 'Teknologi Informasi',      'angkatan' => 2025, 'status' => 'Nonaktif'],
            ['id' => 15, 'nama' => 'Sebriana Sihotang',        'nim' => '25781023', 'jurusan' => 'Teknologi Informasi',        'angkatan' => 2025, 'status' => 'Aktif'],
            ['id' => 16, 'nama' => 'Zenissa Pratiwi',     'nim' => '25781026', 'jurusan' => 'Teknologi Informasi',      'angkatan' => 2025, 'status' => 'Aktif'],
            ['id' => 17, 'nama' => 'Mella Dwi F',       'nim' => '25781013', 'jurusan' => 'Teknologi Informasi',        'angkatan' => 2025, 'status' => 'Aktif'],
            ['id' => 18, 'nama' => 'Muhammad Riski',     'nim' => '25781021', 'jurusan' => 'Teknologi Informasi', 'angkatan' => 2025, 'status' => 'Nonaktif'],
        ];
    }

    public function index()
    {
        $students = $this->allStudents();
        $total    = count($students);
        $aktif    = count(array_filter($students, fn($s) => $s['status'] === 'Aktif'));
        $nonaktif = $total - $aktif;

        return view('students.index', compact('students', 'total', 'aktif', 'nonaktif'));
    }

    public function greet($name = 'Guest')
    {
        return view('students.greet', ['name' => $name]);
    }
}
