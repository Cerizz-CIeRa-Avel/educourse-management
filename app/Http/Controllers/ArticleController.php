<?php

namespace App\Http\Controllers;

class ArticleController extends Controller
{
    private function allArticles(): array
    {
        return [
            [
                'id'       => 1,
                'judul'    => 'Pengenalan Laravel 10: Framework PHP Modern',
                'slug'     => 'pengenalan-laravel-10-framework-php-modern',
                'excerpt'  => 'Laravel 10 hadir dengan berbagai peningkatan performa dan fitur baru yang memudahkan developer dalam membangun aplikasi web.',
                'konten'   => '<p>Laravel 10 merupakan versi terbaru dari framework PHP yang paling populer di dunia. Dirilis pada Februari 2023, Laravel 10 membawa sejumlah peningkatan signifikan yang membuat pengembangan aplikasi web semakin efisien dan menyenangkan.</p><h5>Fitur Utama Laravel 10</h5><p>Salah satu perubahan terbesar di Laravel 10 adalah keharusan penggunaan PHP 8.1 sebagai minimum requirement. Ini memungkinkan Laravel untuk memanfaatkan fitur-fitur modern PHP seperti enum, fibers, readonly properties, dan banyak lagi.</p><p>Laravel 10 juga memperkenalkan native type declarations pada semua method di seluruh framework, meningkatkan type safety dan memberikan pengalaman IDE yang jauh lebih baik.</p><h5>Mengapa Memilih Laravel?</h5><ul><li>Ekosistem yang lengkap dengan berbagai package resmi</li><li>Dokumentasi yang sangat baik dan komunitas aktif</li><li>Blade templating engine yang powerful dan elegan</li><li>Eloquent ORM yang intuitif</li><li>Sistem routing yang fleksibel</li></ul><p>Dengan berbagai keunggulan tersebut, Laravel tetap menjadi pilihan utama untuk pengembangan aplikasi web PHP skala besar maupun kecil.</p>',
                'kategori' => 'Teknologi',
                'penulis'  => 'Dr. Ahmad Fauzi',
                'tanggal'  => '15 Januari 2024',
                'foto'     => 'https://picsum.photos/seed/laravel/800/400',
                'tags'     => ['Laravel', 'PHP', 'Framework', 'Web Development'],
            ],
            [
                'id'       => 2,
                'judul'    => 'Memahami MVC Pattern dalam Pengembangan Web',
                'slug'     => 'memahami-mvc-pattern-dalam-pengembangan-web',
                'excerpt'  => 'MVC (Model-View-Controller) adalah pola arsitektur yang memisahkan logika aplikasi menjadi tiga komponen utama.',
                'konten'   => '<p>Model-View-Controller (MVC) adalah pola arsitektur perangkat lunak yang membagi aplikasi menjadi tiga komponen utama yang saling berhubungan. Pola ini dirancang untuk memisahkan kepentingan (separation of concerns) yang berbeda dalam sebuah aplikasi.</p><h5>Komponen MVC</h5><p><strong>Model</strong> bertanggung jawab untuk mengelola data aplikasi, logika bisnis, dan aturan-aturan yang mengatur bagaimana data dapat diubah atau dimanipulasi.</p><p><strong>View</strong> adalah komponen yang menangani tampilan atau presentasi data kepada pengguna. View mengambil data dari model dan menampilkannya dalam format yang dapat dipahami oleh pengguna.</p><p><strong>Controller</strong> berfungsi sebagai perantara antara Model dan View. Controller menerima input dari pengguna, memprosesnya (seringkali dengan memanggil model), dan menentukan view mana yang harus ditampilkan.</p><h5>Keuntungan MVC</h5><ul><li>Pemisahan yang jelas antara logika bisnis dan tampilan</li><li>Kemudahan dalam testing dan debugging</li><li>Kode yang lebih terorganisir dan mudah dipelihara</li><li>Memungkinkan pengembangan paralel oleh tim</li></ul>',
                'kategori' => 'Akademik',
                'penulis'  => 'Fahmi Hadiansyah',
                'tanggal'  => '22 Januari 2024',
                'foto'     => 'https://picsum.photos/seed/mvc/800/400',
                'tags'     => ['MVC', 'Arsitektur', 'Design Pattern'],
            ],
            [
                'id'       => 3,
                'judul'    => 'Bootstrap 5: Panduan Lengkap untuk Pemula',
                'slug'     => 'bootstrap-5-panduan-lengkap-untuk-pemula',
                'excerpt'  => 'Bootstrap 5 adalah framework CSS yang paling banyak digunakan untuk membangun antarmuka web yang responsif dan modern.',
                'konten'   => '<p>Bootstrap 5 merupakan versi terbaru dari framework CSS paling populer di dunia. Dengan Bootstrap 5, developer dapat dengan mudah membangun antarmuka pengguna yang responsif, mobile-first, dan konsisten di berbagai browser.</p><h5>Apa yang Baru di Bootstrap 5?</h5><p>Bootstrap 5 hadir tanpa ketergantungan jQuery, menggunakan pure JavaScript vanilla. Ini membuat ukuran bundle yang lebih kecil dan performa yang lebih baik.</p><p>Grid system di Bootstrap 5 sekarang hadir dengan breakpoint xxl baru untuk layar yang sangat lebar (≥1400px), memberikan kontrol yang lebih presisi atas layout responsif.</p><h5>Komponen Utama Bootstrap 5</h5><ul><li>Grid System 12 kolom yang fleksibel</li><li>Navbar responsif dengan collapse</li><li>Card component yang serbaguna</li><li>Modal, Accordion, dan Carousel interaktif</li><li>Form controls dengan validasi bawaan</li><li>Utility classes yang komprehensif</li></ul>',
                'kategori' => 'Tutorial',
                'penulis'  => 'Fahmi Hadiansyah',
                'tanggal'  => '1 Februari 2024',
                'foto'     => 'https://picsum.photos/seed/bootstrap/800/400',
                'tags'     => ['Bootstrap', 'CSS', 'Frontend', 'Responsive'],
            ],
            [
                'id'       => 4,
                'judul'    => 'Kecerdasan Buatan dan Masa Depan Pendidikan',
                'slug'     => 'kecerdasan-buatan-dan-masa-depan-pendidikan',
                'excerpt'  => 'AI sedang mengubah lanskap pendidikan global, dari personalisasi pembelajaran hingga otomatisasi penilaian.',
                'konten'   => '<p>Kecerdasan Buatan (Artificial Intelligence/AI) sedang merevolusi hampir setiap aspek kehidupan manusia, termasuk dunia pendidikan. Dari chatbot yang membantu mahasiswa belajar hingga sistem yang mempersonalisasi kurikulum, AI menawarkan peluang yang belum pernah ada sebelumnya.</p><h5>Personalisasi Pembelajaran</h5><p>Salah satu aplikasi AI yang paling menjanjikan dalam pendidikan adalah kemampuannya untuk mempersonalisasi pengalaman belajar setiap siswa. Algoritma machine learning dapat menganalisis gaya belajar, kecepatan, dan pemahaman setiap siswa, lalu menyesuaikan materi dan metode pengajaran secara real-time.</p><h5>Tantangan dan Etika</h5><p>Meski menjanjikan, integrasi AI dalam pendidikan juga membawa tantangan serius. Privasi data siswa, bias algoritma, dan ketergantungan berlebihan pada teknologi adalah beberapa isu yang perlu diantisipasi.</p>',
                'kategori' => 'Opini',
                'penulis'  => 'Dr. Eka Kurniasih',
                'tanggal'  => '10 Februari 2024',
                'foto'     => 'https://picsum.photos/seed/ai-edu/800/400',
                'tags'     => ['AI', 'Pendidikan', 'Machine Learning', 'Teknologi'],
            ],
            [
                'id'       => 5,
                'judul'    => 'Git & GitHub: Version Control untuk Developer',
                'slug'     => 'git-github-version-control-untuk-developer',
                'excerpt'  => 'Git adalah sistem version control terdistribusi yang wajib dikuasai oleh setiap developer modern.',
                'konten'   => '<p>Git adalah sistem kontrol versi terdistribusi (Distributed Version Control System/DVCS) yang dirancang untuk menangani proyek dari skala kecil hingga besar dengan kecepatan dan efisiensi tinggi. Dikembangkan oleh Linus Torvalds pada 2005, Git kini menjadi standar industri untuk version control.</p><h5>Perintah Git yang Wajib Diketahui</h5><p><code>git init</code> — Inisialisasi repository baru<br><code>git clone</code> — Menyalin repository dari remote<br><code>git add</code> — Menambahkan perubahan ke staging area<br><code>git commit</code> — Menyimpan snapshot perubahan<br><code>git push</code> — Mengirim commit ke remote repository<br><code>git pull</code> — Mengambil perubahan dari remote<br><code>git branch</code> — Mengelola branch<br><code>git merge</code> — Menggabungkan branch</p><h5>GitHub vs GitLab vs Bitbucket</h5><p>GitHub adalah platform hosting repository Git yang paling populer dengan komunitas open source terbesar. GitLab menawarkan fitur CI/CD yang lebih lengkap, sementara Bitbucket terintegrasi erat dengan ekosistem Atlassian (Jira, Confluence).</p>',
                'kategori' => 'Tutorial',
                'penulis'  => 'Drs. Doni Setiawan',
                'tanggal'  => '18 Februari 2024',
                'foto'     => 'https://picsum.photos/seed/github/800/400',
                'tags'     => ['Git', 'GitHub', 'Version Control', 'DevOps'],
            ],
            [
                'id'       => 6,
                'judul'    => 'Keamanan Aplikasi Web: Ancaman dan Mitigasi',
                'slug'     => 'keamanan-aplikasi-web-ancaman-dan-mitigasi',
                'excerpt'  => 'Memahami ancaman keamanan web seperti SQL Injection, XSS, dan CSRF serta cara melindungi aplikasi Anda.',
                'konten'   => '<p>Keamanan aplikasi web adalah aspek krusial yang sering diabaikan dalam proses pengembangan. Dengan semakin maraknya serangan siber, pemahaman tentang ancaman umum dan cara mitigasinya menjadi kompetensi wajib bagi setiap developer.</p><h5>Ancaman Keamanan Web Terumum</h5><p><strong>SQL Injection</strong> adalah serangan di mana attacker menyisipkan kode SQL berbahaya ke dalam input form untuk memanipulasi database. Mitigasi: gunakan prepared statements dan parameterized queries.</p><p><strong>Cross-Site Scripting (XSS)</strong> memungkinkan attacker menyisipkan script berbahaya ke halaman web yang dilihat pengguna lain. Mitigasi: selalu escape output dan gunakan Content Security Policy.</p><p><strong>CSRF (Cross-Site Request Forgery)</strong> memaksa pengguna yang terautentikasi untuk melakukan aksi yang tidak diinginkan. Mitigasi: gunakan CSRF token di setiap form.</p><h5>Best Practices Keamanan Web</h5><ul><li>Selalu validasi dan sanitasi input</li><li>Gunakan HTTPS untuk semua komunikasi</li><li>Implementasikan rate limiting</li><li>Perbarui dependencies secara berkala</li><li>Terapkan prinsip least privilege</li></ul>',
                'kategori' => 'Keamanan',
                'penulis'  => 'Prof. Dr. Budi Rahardjo',
                'tanggal'  => '25 Februari 2024',
                'foto'     => 'https://picsum.photos/seed/security/800/400',
                'tags'     => ['Security', 'Web', 'OWASP', 'Keamanan'],
            ],
        ];
    }

    public function index()
    {
        $articles = $this->allArticles();
        return view('articles.index', compact('articles'));
    }

    public function show($slug)
    {
        $articles = $this->allArticles();
        $article  = collect($articles)->firstWhere('slug', $slug);

        if (!$article) {
            return response()->view('errors.404', ['message' => 'Artikel tidak ditemukan.'], 404);
        }

        $related = collect($articles)
            ->where('slug', '!=', $slug)
            ->where('kategori', $article['kategori'])
            ->take(3)
            ->values()
            ->toArray();

        if (count($related) === 0) {
            $related = collect($articles)->where('slug', '!=', $slug)->take(3)->values()->toArray();
        }

        return view('articles.show', compact('article', 'related'));
    }
}
