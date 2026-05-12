<footer class="site-footer mt-5 pt-5 pb-3">
    <div class="container">
        <div class="row g-4 pb-4 border-bottom border-secondary">

            {{-- Brand col --}}
            <div class="col-md-4">
                <div class="d-flex align-items-center gap-2 mb-3">
                    <div class="rounded-2 d-flex align-items-center justify-content-center"
                         style="width:36px;height:36px;background:linear-gradient(135deg,#6366f1,#8b5cf6);">
                        <i class="bi bi-mortarboard-fill text-white" style="font-size:1rem;"></i>
                    </div>
                    <span class="fs-5 fw-bold text-white">EduCourse</span>
                </div>
                <p class="small" style="color:#a5b4fc;">
                    Sistem manajemen pendidikan modern yang membantu institusi dalam mengelola data akademik secara efisien dan terstruktur.
                </p>
                <div class="d-flex gap-2 mt-3">
                    <a href="#" class="btn btn-sm btn-outline-light rounded-circle" style="width:34px;height:34px;padding:0;line-height:34px;text-align:center;">
                        <i class="bi bi-github"></i>
                    </a>
                    <a href="#" class="btn btn-sm btn-outline-light rounded-circle" style="width:34px;height:34px;padding:0;line-height:34px;text-align:center;">
                        <i class="bi bi-linkedin"></i>
                    </a>
                    <a href="#" class="btn btn-sm btn-outline-light rounded-circle" style="width:34px;height:34px;padding:0;line-height:34px;text-align:center;">
                        <i class="bi bi-instagram"></i>
                    </a>
                </div>
            </div>

            {{-- Quick links --}}
            <div class="col-md-2 col-6">
                <h6 class="text-white fw-semibold mb-3">Menu</h6>
                <ul class="list-unstyled small">
                    <li class="mb-2"><a href="{{ route('home') }}" class="text-decoration-none" style="color:#a5b4fc;"><i class="bi bi-chevron-right me-1" style="font-size:.7rem;"></i>Home</a></li>
                    <li class="mb-2"><a href="{{ route('students') }}" class="text-decoration-none" style="color:#a5b4fc;"><i class="bi bi-chevron-right me-1" style="font-size:.7rem;"></i>Mahasiswa</a></li>
                    <li class="mb-2"><a href="{{ route('lecturers') }}" class="text-decoration-none" style="color:#a5b4fc;"><i class="bi bi-chevron-right me-1" style="font-size:.7rem;"></i>Dosen</a></li>
                    <li class="mb-2"><a href="{{ route('courses') }}" class="text-decoration-none" style="color:#a5b4fc;"><i class="bi bi-chevron-right me-1" style="font-size:.7rem;"></i>Mata Kuliah</a></li>
                    <li class="mb-2"><a href="{{ route('articles') }}" class="text-decoration-none" style="color:#a5b4fc;"><i class="bi bi-chevron-right me-1" style="font-size:.7rem;"></i>Artikel</a></li>
                </ul>
            </div>

            {{-- Academic links --}}
            <div class="col-md-2 col-6">
                <h6 class="text-white fw-semibold mb-3">Akademik</h6>
                <ul class="list-unstyled small">
                    <li class="mb-2"><a href="#" class="text-decoration-none" style="color:#a5b4fc;"><i class="bi bi-chevron-right me-1" style="font-size:.7rem;"></i>Kalender</a></li>
                    <li class="mb-2"><a href="#" class="text-decoration-none" style="color:#a5b4fc;"><i class="bi bi-chevron-right me-1" style="font-size:.7rem;"></i>Jadwal Kuliah</a></li>
                    <li class="mb-2"><a href="#" class="text-decoration-none" style="color:#a5b4fc;"><i class="bi bi-chevron-right me-1" style="font-size:.7rem;"></i>Nilai</a></li>
                    <li class="mb-2"><a href="#" class="text-decoration-none" style="color:#a5b4fc;"><i class="bi bi-chevron-right me-1" style="font-size:.7rem;"></i>Perpustakaan</a></li>
                    <li class="mb-2"><a href="#" class="text-decoration-none" style="color:#a5b4fc;"><i class="bi bi-chevron-right me-1" style="font-size:.7rem;"></i>Pengumuman</a></li>
                </ul>
            </div>

            {{-- Contact --}}
            <div class="col-md-4">
                <h6 class="text-white fw-semibold mb-3">Kontak</h6>
                <ul class="list-unstyled small">
                    <li class="mb-2 d-flex gap-2" style="color:#a5b4fc;">
                        <i class="bi bi-geo-alt-fill mt-1" style="color:#818cf8;"></i>
                        Jl. Pendidikan No. 1, Jakarta Selatan, DKI Jakarta 12345
                    </li>
                    <li class="mb-2" style="color:#a5b4fc;">
                        <i class="bi bi-telephone-fill me-2" style="color:#818cf8;"></i>(021) 1234-5678
                    </li>
                    <li class="mb-2" style="color:#a5b4fc;">
                        <i class="bi bi-envelope-fill me-2" style="color:#818cf8;"></i>info@educourse.ac.id
                    </li>
                    <li style="color:#a5b4fc;">
                        <i class="bi bi-clock-fill me-2" style="color:#818cf8;"></i>Senin – Jumat, 08.00 – 16.00 WIB
                    </li>
                </ul>
            </div>

        </div>

        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center pt-3 small" style="color:#6366f1;">
            <span>&copy; {{ date('Y') }} EduCourse Management System. All rights reserved.</span>
            <span class="mt-2 mt-md-0">
                Built with <i class="bi bi-heart-fill text-danger"></i> using
                <strong class="text-white">Laravel 10</strong> &amp; <strong class="text-white">Bootstrap 5</strong>
            </span>
        </div>
    </div>
</footer>
