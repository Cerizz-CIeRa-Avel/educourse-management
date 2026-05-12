<?php

namespace App\Http\Controllers;

class LecturerController extends Controller
{
    private function allLecturers(): array
    {
        return [
            [
                'id'     => 1,
                'nama'   => 'Tri Sandhika Jaya, S.Kom., M.Kom.',
                'nidn'   => '198601182008121005',
                'bidang' => 'Sistem Infomasi, Machine Learning, Decision Support System',
                'email'  => 'tri.sandhika@educourse.ac.id',
                'foto'   => 'https://ui-avatars.com/api/?name=Tri+Sandhika&background=4f46e5&color=fff&size=200',
                'mata_kuliah' => ['Pemrograman Web I', 'Algoritma Pemrograman'],
            ],
            [
                'id'     => 2,
                'nama'   => 'Dewi kania Widyawati, S.Kom., M.Kom.',
                'nidn'   => '197206242005012002',
                'bidang' => 'Ilmu Komputer',
                'email'  => 'dewi.kania@educourse.ac.id',
                'foto'   => 'https://ui-avatars.com/api/?name=Dewi+Kania&background=0891b2&color=fff&size=200',
                'mata_kuliah' => ['Pengantar Basis Data'],
            ],
            [
                'id'     => 3,
                'nama'   => 'Rima Maulini, S.Kom., M.Kom.',
                'nidn'   => '197802192005012001',
                'bidang' => 'Sistem Informasi',
                'email'  => 'rima.maulani@educourse.ac.id',
                'foto'   => 'https://ui-avatars.com/api/?name=Rima+Maulani&background=be185d&color=fff&size=200',
                'mata_kuliah' => ['Sistem Informasi Manajemen', 'Komputer Grafis'],
            ],
            [
                'id'     => 4,
                'nama'   => 'Kurniawan  Saputra, S.Kom., M.Kom.',
                'nidn'   => '197311242005011001',
                'bidang' => 'Sistem Informasi',
                'email'  => 'kurniawan.saputra@educourse.ac.id',
                'foto'   => 'https://ui-avatars.com/api/?name=Kurniwan+Saputra&background=d97706&color=fff&size=200',
                'mata_kuliah' => ['Interaksi Manusia & Komputer', 'Algoritma Pemrograman'],
            ],
            [
                'id'     => 5,
                'nama'   => 'Dwirgo Sahlinal, S.T., M.Eng.',
                'nidn'   => '197209202002121001',
                'bidang' => 'Teknologi Informasi, Electronics Engineering, Automatic Control System',
                'email'  => 'dwirgo.sahlinal@educourse.ac.id',
                'foto'   => 'https://ui-avatars.com/api/?name=Dwirgo+Sahlinal&background=059669&color=fff&size=200',
                'mata_kuliah' => ['Pemrograman Berorientasi Objek'],
            ],
            [
                'id'     => 6,
                'nama'   => 'Panji Andhika Pratomo, S.Kom., M.T.I.',
                'nidn'   => '199010082022031005',
                'bidang' => 'Software Engineering, IoT, Information System',
                'email'  => 'panji.andhika@educourse.ac.id',
                'foto'   => 'https://ui-avatars.com/api/?name=Panji+Andhika&background=7c3aed&color=fff&size=200',
                'mata_kuliah' => ['Pemrograman Web', 'Algoritma Pemrograman'],
            ],
            [
                'id'     => 7,
                'nama'   => 'M. Reza Redo Islami, S.Kom., M.T.I.',
                'nidn'   => '198611142024211008',
                'bidang' => 'Machine learning, Data mining, Algoritma, Statistical learning and modeling',
                'email'  => 'reza.redo@educourse.ac.id',
                'foto'   => 'https://ui-avatars.com/api/?name=Reza+Redo&background=c026d3&color=fff&size=200',
                'mata_kuliah' => ['Pemrograman Web I', 'Algoritma Pemrograman'],
            ],
            [
                'id'     => 8,
                'nama'   => 'Akhmad Jayadi, S.Kom., M.Cs.',
                'nidn'   => '199407172024061001',
                'bidang' => 'Robotics, Embedded System, Artificial Intelligence',
                'email'  => 'akhmad.jayadi@educourse.ac.id',
                'foto'   => 'https://ui-avatars.com/api/?name=Akhmad+Jayadi&background=0f766e&color=fff&size=200',
                'mata_kuliah' => ['Pemgrograman Web II', 'Pemrograman Berorientasi Objek'],
            ],
            [
                'id'     => 9,
                'nama'   => 'Ahmad Rofi’i, S.Kom., M.T.I.',
                'nidn'   => '199408162025061002',
                'bidang' => 'Informatika',
                'email'  => 'ahmad.rofii@educourse.ac.id',
                'foto'   => 'https://ui-avatars.com/api/?name=Ahmad+Rofi&background=0f766e&color=fff&size=200',
                'mata_kuliah' => ['Komputer Grafis'],
            ],
        ];
    }

    public function index()
    {
        $lecturers = $this->allLecturers();
        return view('lecturers.index', compact('lecturers'));
    }
}
