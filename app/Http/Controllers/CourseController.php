<?php

namespace App\Http\Controllers;

class CourseController extends Controller
{
    private function allCourses(): array
    {
        return [
            [
                'id'          => 1,
                'kode'        => 'PMI1118',
                'nama'        => 'Algoritma Pemrograman',
                'sks'         => 3,
                'semester'    => 1,
                'dosen'       => 'Akhmad Jayadi, S.Kom., M.Cs.',
                'status'      => 'Wajib',
                'deskripsi'   => 'Mata kuliah ini membahas dasar-dasar algoritma dan pemrograman menggunakan bahasa C/C++. Mahasiswa akan mempelajari konsep variabel, tipe data, operator, percabangan, perulangan, array, fungsi, dan pointer.',
                'tujuan'      => [
                    'Memahami konsep dasar algoritma',
                    'Mampu menulis pseudocode dan flowchart',
                    'Mampu mengimplementasikan algoritma dalam bahasa Java',
                    'Memahami konsep pemrograman terstruktur',
                ],
                'materi'      => ['Pengenalan Algoritma', 'Tipe Data & Operator', 'Percabangan', 'Perulangan', 'Array', 'Fungsi', 'Pointer'],
            ],
            [
                'id'          => 2,
                'kode'        => 'PMI1215',
                'nama'        => 'Matematika Kombinatorika',
                'sks'         => 2,
                'semester'    => 1,
                'dosen'       => 'Dewi kania Widyawati, S.Kom., M.Kom.',
                'status'      => 'Wajib',
                'deskripsi'   => 'Mata kuliah ini membahas matematika yang digunakan dalam ilmu komputer, meliputi logika proposisi, himpunan, relasi, fungsi, teori graf, dan kombinatorika.',
                'tujuan'      => ['Memahami logika matematika', 'Mampu menganalisis struktur diskrit', 'Menerapkan konsep pada permasalahan komputer'],
                'materi'      => ['Logika Proposisi', 'Teori Himpunan', 'Relasi & Fungsi', 'Teori Graf', 'Kombinatorika'],
            ],
            [
                'id'          => 3,
                'kode'        => 'PMI1222',
                'nama'        => 'Pemrograman Web II',
                'sks'         => 3,
                'semester'    => 2,
                'dosen'       => 'Akhmad Jayadi, S.Kom., M.Cs.',
                'status'      => 'Wajib',
                'deskripsi'   => 'Mata kuliah ini membahas pengembangan aplikasi web menggunakan HTML, CSS, JavaScript, PHP, dan framework modern.',
                'tujuan'      => ['Mampu membuat halaman web responsif', 'Memahami konsep client-server', 'Mampu membuat aplikasi web dinamis'],
                'materi'      => ['HTML5 & CSS3', 'JavaScript Dasar', 'PHP', 'Laravel Framework', 'REST API', 'Bootstrap'],
            ],
            [
                'id'          => 4,
                'kode'        => 'PMI1219',
                'nama'        => 'Perancangan Basis Data',
                'sks'         => 2,
                'semester'    => 2,
                'dosen'       => 'Dewi kania Widyawati, S.Kom., M.Kom.',
                'status'      => 'Wajib',
                'deskripsi'   => 'Mata kuliah ini membahas konsep basis data relasional, SQL, normalisasi, desain ERD, dan manajemen basis data menggunakan MySQL.',
                'tujuan'      => ['Memahami konsep basis data relasional', 'Mampu membuat desain ERD', 'Mampu menggunakan SQL dengan baik'],
                'materi'      => ['Konsep RDBMS', 'ERD', 'SQL Dasar', 'SQL Lanjutan', 'Normalisasi', 'Stored Procedure', 'Trigger'],
            ],
            [
                'id'          => 5,
                'kode'        => 'PMI1120',
                'nama'        => 'Pemrograman Web I',
                'sks'         => 3,
                'semester'    => 1,
                'dosen'       => 'M. Reza Redo Islami, S.Kom., M.T.I.',
                'status'      => 'Wajib',
                'deskripsi'   => 'Mata kuliah ini membahas pengembangan aplikasi web menggunakan HTML, CSS, JavaScript, PHP, dan framework modern.',
                'tujuan'      => ['Mampu membuat halaman web responsif', 'Memahami konsep client-server', 'Mampu membuat aplikasi web dinamis'],
                'materi'      => ['HTML5 & CSS3', 'JavaScript Dasar', 'PHP', 'Laravel Framework', 'REST API', 'Bootstrap'],
            ],
            [
                'id'          => 6,
                'kode'        => 'PMI1220',
                'nama'        => 'Jaringan Komputer dan Sistem Operasi',
                'sks'         => 2,
                'semester'    => 2,
                'dosen'       => 'Dwi Handoko S.Kom., M.T.I.',
                'status'      => 'Wajib',
                'deskripsi'   => 'Mempelajari konsep jaringan komputer, protokol TCP/IP, routing, switching, dan keamanan jaringan dasar.',
                'tujuan'      => ['Memahami arsitektur jaringan', 'Mampu konfigurasi jaringan dasar', 'Memahami protokol komunikasi'],
                'materi'      => ['Model OSI & TCP/IP', 'IP Addressing', 'Routing', 'Switching', 'VLAN', 'Wireless Network'],
            ],
            [
                'id'          => 7,
                'kode'        => 'PMI1221',
                'nama'        => 'Pemrograman Berorientasi Objek',
                'sks'         => 3,
                'semester'    => 1,
                'dosen'       => 'Akhmad Jayadi, S.Kom., M.Cs.',
                'status'      => 'Wajib',
                'deskripsi'   => 'Mata kuliah ini membahas pemrograman yang di orientasikan dengan objek.',
                'tujuan'      => ['Memahami fungsi yang ada pada OOP(Object Orianted Programing)'],
                'materi'      => ['Mampu menjelaskan konsep dasar pemrograman berorientasi objek serta mengimplementasikan sintaks dasa'],
            ],
            [
                'id'          => 8,
                'kode'        => 'PMI1223',
                'nama'        => 'Interaksi Manusia dan Komputer',
                'sks'         => 2,
                'semester'    => 2,
                'dosen'       => 'Kurniawan  Saputra, S.Kom., M.Kom.',
                'status'      => 'Wajib',
                'deskripsi'   => 'Mempelajari konsep interaksi antara manusia dan komputer dalam penggunaan sistem.',
                'tujuan'      => ['Memahami konsep Interaksi komputer'],
                'materi'      => ['Mampu menjelaskan karakteristik fundamental manusia (kognitif, persepsi, motorik) dan mesin'],
            ],
            [
                'id'          => 9,
                'kode'        => 'PMI1218',
                'nama'        => 'Komputer Grafis',
                'sks'         => 2,
                'semester'    => 2,
                'dosen'       => 'Rima Maulini, S.Kom., M.Kom.',
                'status'      => 'Wajib',
                'deskripsi'   => 'Mata kuliah pilihan yang membahas pembuatan objek grafis',
                'tujuan'      => ['Memahami pembuatan logo sederhana'],
                'materi'      => ['Mampu menjelaskan konsep dasar komputer grafis, membedakan grafis vektor dan bitmap'],
            ],
            [
                'id'          => 10,
                'kode'        => 'PMI1122',
                'nama'        => 'Pengantar Basis Data',
                'sks'         => 2,
                'semester'    => 1,
                'dosen'       => 'Dewi kania Widyawati, S.Kom., M.Kom.',
                'status'      => 'Wajib',
                'deskripsi'   => 'Mata kuliah ini membahas konsep basis data relasional, SQL, normalisasi, desain ERD, dan manajemen basis data menggunakan MySQL.',
                'tujuan'      => ['Memahami konsep basis data relasional', 'Mampu membuat desain ERD', 'Mampu menggunakan SQL dengan baik'],
                'materi'      => ['Konsep RDBMS', 'ERD', 'SQL Dasar', 'SQL Lanjutan', 'Normalisasi', 'Stored Procedure', 'Trigger'],
            ],
            [
                'id'          => 11,
                'kode'        => 'PDU1112',
                'nama'        => 'Pancasila',
                'sks'         => 2,
                'semester'    => 1,
                'dosen'       => 'Kurniawan  Saputra, S.Kom., M.Kom.',
                'status'      => 'Wajib',
                'deskripsi'   => 'Memahami arti kenegaraan dan persatuan Indonesia',
                'tujuan'      => ['Memahami konsep kenegaraan'],
                'materi'      => ['Konsep Pancasila'],
            ],
            [
                'id'          => 12,
                'kode'        => 'PDU1113',
                'nama'        => 'Kewarganegaraan',
                'sks'         => 2,
                'semester'    => 1,
                'dosen'       => 'Dr. Ahmad Fauzi, M.Kom.',
                'status'      => 'Wajib',
                'deskripsi'   => 'Memahami arti kewarganegaraan dan persatuan Indonesia',
                'tujuan'      => ['Memahami konsep kewarganegaraan'],
                'materi'      => ['Konsep Indonesia'],
            ],
        ];
    }

    public function index()
    {
        $courses = $this->allCourses();
        return view('courses.index', compact('courses'));
    }

    public function show($id)
    {
        $courses = $this->allCourses();
        $course  = collect($courses)->firstWhere('id', (int) $id);

        if (!$course) {
            return response()->view('errors.404', ['message' => "Mata kuliah dengan ID #{$id} tidak ditemukan."], 404);
        }

        $related = collect($courses)
            ->where('id', '!=', (int) $id)
            ->where('semester', $course['semester'])
            ->take(3)
            ->values()
            ->toArray();

        return view('courses.show', compact('course', 'related'));
    }
}
