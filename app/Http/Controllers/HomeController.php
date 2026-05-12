<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    private function stats(): array
    {
        return [
            'total_students'  => 18,
            'total_lecturers' => 8,
            'total_courses'   => 12,
            'total_articles'  => 6,
        ];
    }

    public function index()
    {
        $stats = $this->stats();

        $announcements = [
            [
                'title'   => 'Pendaftaran Mata Kuliah Semester Ganjil 2024/2025',
                'date'    => '15 Juli 2024',
                'excerpt' => 'Pendaftaran mata kuliah untuk semester ganjil 2024/2025 akan dibuka mulai tanggal 20 Juli 2024.',
                'badge'   => 'Akademik',
                'color'   => 'primary',
            ],
            [
                'title'   => 'Seminar Nasional Teknologi Informasi 2024',
                'date'    => '10 Juli 2024',
                'excerpt' => 'Fakultas Teknik Informatika mengadakan seminar nasional dengan tema "AI dan Masa Depan Pendidikan".',
                'badge'   => 'Event',
                'color'   => 'success',
            ],
            [
                'title'   => 'Pengumuman Beasiswa Prestasi Semester Ini',
                'date'    => '5 Juli 2024',
                'excerpt' => 'Tersedia 10 kuota beasiswa prestasi bagi mahasiswa dengan IPK ≥ 3.50 dan aktif organisasi.',
                'badge'   => 'Beasiswa',
                'color'   => 'warning',
            ],
        ];

        return view('home.index', compact('stats', 'announcements'));
    }

    public function dashboard()
    {
        if (!session('is_admin')) {
            return redirect()->route('admin.login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $stats = $this->stats();

        $recentActivity = [
            ['action' => 'Mahasiswa baru ditambahkan', 'time' => '2 menit lalu', 'icon' => 'person-plus', 'color' => 'success'],
            ['action' => 'Mata kuliah Basis Data diperbarui', 'time' => '1 jam lalu', 'icon' => 'book', 'color' => 'primary'],
            ['action' => 'Artikel baru dipublikasikan', 'time' => '3 jam lalu', 'icon' => 'newspaper', 'color' => 'info'],
            ['action' => 'Data dosen Dr. Sari diperbarui', 'time' => 'Kemarin', 'icon' => 'person-badge', 'color' => 'warning'],
        ];

        $courseProgress = [
            ['name' => 'Algoritma & Pemrograman', 'pct' => 85, 'color' => 'primary'],
            ['name' => 'Basis Data',               'pct' => 72, 'color' => 'success'],
            ['name' => 'Pemrograman Web',          'pct' => 90, 'color' => 'info'],
            ['name' => 'Jaringan Komputer',        'pct' => 60, 'color' => 'warning'],
            ['name' => 'Kecerdasan Buatan',        'pct' => 45, 'color' => 'danger'],
        ];

        return view('admin.dashboard', compact('stats', 'recentActivity', 'courseProgress'));
    }

    public function loginPage()
    {
        if (session('is_admin')) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.login');
    }

    public function loginPost(Request $request)
    {
        // Fake session login — no database
        if ($request->username === 'admin' && $request->password === 'admin123') {
            session(['is_admin' => true, 'admin_name' => 'Administrator']);
            return redirect()->route('admin.dashboard')->with('success', 'Selamat datang, Administrator!');
        }
        return back()->with('error', 'Username atau password salah.')->withInput();
    }

    public function logout()
    {
        session()->forget(['is_admin', 'admin_name']);
        return redirect()->route('home')->with('info', 'Anda telah logout.');
    }
}
