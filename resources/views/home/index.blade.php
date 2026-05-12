@extends('layouts.app')

@section('title', 'Beranda')

@section('content')

{{-- ── HERO SECTION ── --}}
<section class="hero-section d-flex align-items-center text-white">
    <div class="container py-5">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <span class="badge bg-white bg-opacity-25 text-white rounded-pill px-3 py-2 mb-3">
                    <i class="bi bi-mortarboard me-1"></i>Sistem Manajemen Pendidikan
                </span>
                <h1 class="display-4 fw-bold mb-3 lh-sm">
                    Selamat Datang di<br>
                    <span style="color:#c7d2fe;">EduCourse</span> Management
                </h1>
                <p class="fs-5 mb-4" style="color:#e0e7ff;">
                    Platform terpadu untuk mengelola data akademik mahasiswa, dosen, dan mata kuliah secara efisien dan modern.
                </p>
                <div class="d-flex flex-wrap gap-3">
                    <a href="{{ route('students') }}" class="btn btn-white text-primary fw-semibold rounded-pill px-4 py-2">
                        <i class="bi bi-people-fill me-2"></i>Data Mahasiswa
                    </a>
                    <a href="{{ route('courses') }}" class="btn btn-outline-light rounded-pill px-4 py-2">
                        <i class="bi bi-book-fill me-2"></i>Mata Kuliah
                    </a>
                </div>
            </div>
            <div class="col-lg-6 d-none d-lg-flex justify-content-center">
                <div class="position-relative">
                    <div class="rounded-4 p-4 text-center" style="background:rgba(255,255,255,.1);backdrop-filter:blur(10px);border:1px solid rgba(255,255,255,.2);">
                        <i class="bi bi-mortarboard-fill display-1 mb-3" style="color:#c7d2fe;"></i>
                        <div class="row g-3 text-center">
                            <div class="col-4">
                                <div class="rounded-3 p-2" style="background:rgba(255,255,255,.1);">
                                    <div class="fw-bold fs-4">{{ $stats['total_students'] }}</div>
                                    <div class="small" style="color:#c7d2fe;">Mahasiswa</div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="rounded-3 p-2" style="background:rgba(255,255,255,.1);">
                                    <div class="fw-bold fs-4">{{ $stats['total_lecturers'] }}</div>
                                    <div class="small" style="color:#c7d2fe;">Dosen</div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="rounded-3 p-2" style="background:rgba(255,255,255,.1);">
                                    <div class="fw-bold fs-4">{{ $stats['total_courses'] }}</div>
                                    <div class="small" style="color:#c7d2fe;">MK</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ── STAT CARDS ── --}}
<section class="py-5 bg-body-secondary">
    <div class="container">
        <div class="row g-4">
            @php
                $statCards = [
                    ['label' => 'Total Mahasiswa',  'value' => $stats['total_students'],  'icon' => 'people-fill',        'color' => '#4f46e5', 'bg' => '#ede9fe', 'route' => 'students'],
                    ['label' => 'Total Dosen',      'value' => $stats['total_lecturers'], 'icon' => 'person-badge-fill',  'color' => '#0891b2', 'bg' => '#e0f2fe', 'route' => 'lecturers'],
                    ['label' => 'Mata Kuliah',      'value' => $stats['total_courses'],   'icon' => 'book-fill',          'color' => '#059669', 'bg' => '#d1fae5', 'route' => 'courses'],
                    ['label' => 'Artikel Tersedia', 'value' => $stats['total_articles'],  'icon' => 'newspaper',          'color' => '#d97706', 'bg' => '#fef3c7', 'route' => 'articles'],
                ];
            @endphp

            @foreach($statCards as $card)
            <div class="col-sm-6 col-xl-3">
                <a href="{{ route($card['route']) }}" class="text-decoration-none">
                    <div class="stat-card card h-100 p-4">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="rounded-3 p-3" style="background:{{ $card['bg'] }};">
                                <i class="bi bi-{{ $card['icon'] }} fs-4" style="color:{{ $card['color'] }};"></i>
                            </div>
                            <i class="bi bi-arrow-up-right text-muted"></i>
                        </div>
                        <div class="display-6 fw-bold mb-1" style="color:{{ $card['color'] }};">{{ $card['value'] }}</div>
                        <div class="text-muted small fw-medium">{{ $card['label'] }}</div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ── CAROUSEL ── --}}
<section class="py-5">
    <div class="container">
        <h2 class="fw-bold mb-4 text-center">Galeri Kampus</h2>
        <div id="campusCarousel" class="carousel slide rounded-4 overflow-hidden shadow" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#campusCarousel" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#campusCarousel" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#campusCarousel" data-bs-slide-to="2"></button>
            </div>
            <div class="carousel-inner" style="height:380px;">
                <div class="carousel-item active">
                    <img src="https://picsum.photos/seed/campus1/1200/380" class="d-block w-100" alt="Gedung Utama" style="object-fit:cover;height:380px;">
                    <div class="carousel-caption d-none d-md-block">
                        <h4 class="fw-bold">Gedung Utama</h4>
                        <p>Pusat kegiatan akademik dan administrasi kampus EduCourse</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://picsum.photos/seed/campus2/1200/380" class="d-block w-100" alt="Lab Komputer" style="object-fit:cover;height:380px;">
                    <div class="carousel-caption d-none d-md-block">
                        <h4 class="fw-bold">Laboratorium Komputer</h4>
                        <p>Fasilitas komputer modern untuk mendukung kegiatan praktikum</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://picsum.photos/seed/campus3/1200/380" class="d-block w-100" alt="Perpustakaan" style="object-fit:cover;height:380px;">
                    <div class="carousel-caption d-none d-md-block">
                        <h4 class="fw-bold">Perpustakaan Digital</h4>
                        <p>Koleksi ribuan buku dan jurnal ilmiah untuk mahasiswa</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#campusCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#campusCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    </div>
</section>

{{-- ── ANNOUNCEMENTS & QUICK LINKS ── --}}
<section class="py-5 bg-body-secondary">
    <div class="container">
        <div class="row g-4">

            {{-- Announcements --}}
            <div class="col-lg-8">
                <h2 class="fw-bold mb-4">Pengumuman Terbaru</h2>
                @foreach($announcements as $ann)
                    <x-card class="mb-3" :hover="true">
                        <div class="d-flex gap-3">
                            <div class="rounded-3 d-flex align-items-center justify-content-center flex-shrink-0"
                                 style="width:48px;height:48px;background:var(--bs-{{ $ann['color'] }}-bg-subtle, #ede9fe);">
                                <i class="bi bi-megaphone-fill text-{{ $ann['color'] }}"></i>
                            </div>
                            <div>
                                <div class="d-flex align-items-center gap-2 mb-1">
                                    <span class="badge bg-{{ $ann['color'] }} bg-opacity-10 text-{{ $ann['color'] }} rounded-pill">{{ $ann['badge'] }}</span>
                                    <small class="text-muted">{{ $ann['date'] }}</small>
                                </div>
                                <h6 class="fw-semibold mb-1">{{ $ann['title'] }}</h6>
                                <p class="text-muted small mb-0">{{ $ann['excerpt'] }}</p>
                            </div>
                        </div>
                    </x-card>
                @endforeach
            </div>

            {{-- Quick links --}}
            <div class="col-lg-4">
                <h2 class="fw-bold mb-4">Akses Cepat</h2>
                @php
                    $quickLinks = [
                        ['route' => 'students',  'label' => 'Data Mahasiswa',   'icon' => 'people-fill',       'color' => 'primary'],
                        ['route' => 'lecturers', 'label' => 'Data Dosen',       'icon' => 'person-badge-fill', 'color' => 'info'],
                        ['route' => 'courses',   'label' => 'Mata Kuliah',      'icon' => 'book-fill',         'color' => 'success'],
                        ['route' => 'articles',  'label' => 'Baca Artikel',     'icon' => 'newspaper',         'color' => 'warning'],
                        ['route' => 'profile',   'label' => 'Profile Developer','icon' => 'person-circle',     'color' => 'danger'],
                        ['route' => 'admin.login','label' => 'Login Admin',     'icon' => 'shield-lock-fill',  'color' => 'secondary'],
                    ];
                @endphp
                <div class="d-grid gap-2">
                    @foreach($quickLinks as $link)
                        <a href="{{ route($link['route']) }}"
                           class="btn btn-outline-{{ $link['color'] }} text-start rounded-3 py-2 px-3">
                            <i class="bi bi-{{ $link['icon'] }} me-2"></i>{{ $link['label'] }}
                        </a>
                    @endforeach
                </div>

                {{-- Accordion FAQ --}}
                <div class="mt-4">
                    <h6 class="fw-semibold mb-3">FAQ</h6>
                    <div class="accordion accordion-flush rounded-3 overflow-hidden border shadow-sm" id="faqAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed py-3 small fw-medium" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#faq1">
                                    Bagaimana cara daftar mata kuliah?
                                </button>
                            </h2>
                            <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body small text-muted">
                                    Login ke portal akademik, pilih menu KRS, lalu pilih mata kuliah yang tersedia sesuai semester Anda.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed py-3 small fw-medium" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#faq2">
                                    Kapan batas pengumpulan tugas akhir?
                                </button>
                            </h2>
                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body small text-muted">
                                    Batas pengumpulan dokumen skripsi adalah H-7 sebelum jadwal sidang yang telah ditentukan.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed py-3 small fw-medium" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#faq3">
                                    Dimana melihat nilai semester?
                                </button>
                            </h2>
                            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body small text-muted">
                                    Nilai dapat dilihat di portal akademik bagian menu Transkrip Nilai setelah periode penilaian berakhir.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- ── WELCOME TOAST ── --}}
<div class="toast-container position-fixed bottom-0 end-0 p-3">
    <div id="welcomeToast" class="toast align-items-center border-0 show"
         style="background:linear-gradient(135deg,#4f46e5,#7c3aed);color:white;" role="alert">
        <div class="d-flex">
            <div class="toast-body">
                <i class="bi bi-mortarboard-fill me-2"></i>
                <strong>Selamat datang</strong> di EduCourse! 🎓
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    // Auto-hide welcome toast after 5s
    document.addEventListener('DOMContentLoaded', function () {
        var toastEl = document.getElementById('welcomeToast');
        if (toastEl) {
            setTimeout(function () {
                bootstrap.Toast.getOrCreateInstance(toastEl).hide();
            }, 5000);
        }
    });
</script>
@endsection
"{{-- bootstrap ui --}}" 
