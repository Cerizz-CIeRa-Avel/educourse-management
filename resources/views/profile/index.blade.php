@extends('layouts.app')

@section('title', 'Profile Developer')

@section('content')

<div class="hero-section py-4">
    <div class="container py-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-2">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white-50 text-decoration-none">Home</a></li>
                <li class="breadcrumb-item active text-white">Profile</li>
            </ol>
        </nav>
        <h1 class="fw-bold text-white mb-1"><i class="bi bi-person-circle me-2"></i>Profile Developer</h1>
        <p class="text-white-50 mb-0">Biodata pembuat EduCourse Management System</p>
    </div>
</div>

<div class="container py-5">
    <div class="row g-4">

        {{-- Profile card --}}
        <div class="col-lg-4">
            <div class="card border-0 shadow rounded-4 overflow-hidden">
                <div style="height:100px;background:linear-gradient(135deg,#4f46e5,#7c3aed);"></div>
                <div class="card-body pt-0 text-center px-4 pb-4">
                    <img src="{{ $developer['foto'] }}" alt="{{ $developer['nama'] }}"
                         class="rounded-circle border border-4 border-white shadow"
                         style="width:110px;height:110px;object-fit:cover;margin-top:-55px;">
                    <h4 class="fw-bold mt-3 mb-0">{{ $developer['nama'] }}</h4>
                    <p class="text-muted small mb-2">{{ $developer['kelas'] }} — {{ $developer['nim'] }}</p>
                    <p class="text-muted small lh-base">{{ $developer['bio'] }}</p>

                    {{-- Sosial media --}}
                    <div class="d-flex justify-content-center gap-2 mt-3 mb-4">
                        @foreach($developer['sosmed'] as $sm)
                        <a href="{{ $sm['url'] }}" target="_blank" rel="noopener"
                           class="btn btn-sm rounded-circle border d-flex align-items-center justify-content-center"
                           style="width:36px;height:36px;color:{{ $sm['color'] }};"
                           title="{{ $sm['platform'] }}">
                            <i class="bi {{ $sm['icon'] }}"></i>
                        </a>
                        @endforeach
                    </div>

                    <ul class="list-group list-group-flush text-start">
                        <li class="list-group-item d-flex justify-content-between px-0">
                            <span class="text-muted small"><i class="bi bi-envelope me-2"></i>Email</span>
                            <a href="mailto:{{ $developer['email'] }}" class="small">{{ $developer['email'] }}</a>
                        </li>
                        <li class="list-group-item d-flex justify-content-between px-0">
                            <span class="text-muted small"><i class="bi bi-telephone me-2"></i>Phone</span>
                            <span class="small">{{ $developer['phone'] }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between px-0">
                            <span class="text-muted small"><i class="bi bi-geo-alt me-2"></i>Lokasi</span>
                            <span class="small">{{ $developer['lokasi'] }}</span>
                        </li>
                    </ul>
                </div>
            </div>

            {{-- Certifications --}}
            <x-card title="Sertifikat" icon="award" class="mt-3">
                @foreach($developer['sertifikat'] as $cert)
                <div class="d-flex align-items-start gap-2 mb-2 {{ $loop->last ? '' : 'pb-2 border-bottom' }}">
                    <i class="bi bi-patch-check-fill text-warning mt-1"></i>
                    <span class="small">{{ $cert }}</span>
                </div>
                @endforeach
            </x-card>
        </div>

        {{-- Right column --}}
        <div class="col-lg-8">

            {{-- Skills --}}
            <x-card title="Keahlian Teknis" icon="tools">
                <div class="row g-3">
                    @foreach($developer['skills'] as $skill)
                    <div class="col-sm-6">
                        <div class="d-flex justify-content-between mb-1">
                            <span class="small fw-medium">{{ $skill['nama'] }}</span>
                            <span class="small text-muted">{{ $skill['level'] }}%</span>
                        </div>
                        <div class="progress rounded-pill" style="height:8px;">
                            <div class="progress-bar bg-{{ $skill['color'] }} rounded-pill"
                                 role="progressbar"
                                 style="width: 0%;"
                                 data-width="{{ $skill['level'] }}"
                                 aria-valuenow="{{ $skill['level'] }}"
                                 aria-valuemin="0" aria-valuemax="100">
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </x-card>

            {{-- Experience --}}
            <x-card title="Pengalaman Kerja" icon="briefcase" class="mt-4">
                @foreach($developer['pengalaman'] as $exp)
                <div class="d-flex gap-3 mb-4 {{ $loop->last ? '' : 'pb-4 border-bottom' }}">
                    <div class="rounded-3 p-2 flex-shrink-0"
                         style="background:linear-gradient(135deg,#4f46e5,#7c3aed);width:44px;height:44px;display:flex;align-items:center;justify-content:center;">
                        <i class="bi bi-briefcase-fill text-white"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold mb-0">{{ $exp['posisi'] }}</h6>
                        <div class="d-flex align-items-center gap-2 mb-1">
                            <span class="text-primary small fw-medium">{{ $exp['tempat'] }}</span>
                            <span class="badge bg-secondary bg-opacity-10 text-secondary rounded-pill small">{{ $exp['periode'] }}</span>
                        </div>
                        <p class="text-muted small mb-0">{{ $exp['deskripsi'] }}</p>
                    </div>
                </div>
                @endforeach
            </x-card>

            {{-- Education --}}
            <x-card title="Pendidikan" icon="mortarboard" class="mt-4">
                @foreach($developer['pendidikan'] as $edu)
                <div class="d-flex gap-3 mb-3 {{ $loop->last ? '' : 'pb-3 border-bottom' }}">
                    <div class="rounded-3 p-2 flex-shrink-0"
                         style="background:#ede9fe;width:44px;height:44px;display:flex;align-items:center;justify-content:center;">
                        <i class="bi bi-mortarboard-fill text-primary"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold mb-0">{{ $edu['gelar'] }}</h6>
                        <div class="text-primary small fw-medium">{{ $edu['tempat'] }}</div>
                        <div class="d-flex align-items-center gap-2 mt-1">
                            <span class="text-muted small">{{ $edu['periode'] }}</span>
                            @if($edu['ipk'])
                                <span class="badge bg-success bg-opacity-10 text-success rounded-pill small">IPK {{ $edu['ipk'] }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </x-card>

        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    // Animate skill progress bars on scroll
    document.addEventListener('DOMContentLoaded', function () {
        const bars = document.querySelectorAll('.progress-bar[data-width]');

        function animateBars() {
            bars.forEach(function (bar) {
                const rect = bar.getBoundingClientRect();
                if (rect.top < window.innerHeight && !bar.dataset.animated) {
                    bar.dataset.animated = '1';
                    bar.style.transition = 'width 1s ease';
                    bar.style.width = bar.dataset.width + '%';
                }
            });
        }

        window.addEventListener('scroll', animateBars);
        setTimeout(animateBars, 300); // trigger on load if visible
    });
</script>
@endsection
