@extends('layouts.app')

@section('title', 'Data Dosen')

@section('content')

<div class="hero-section py-4">
    <div class="container py-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-2">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white-50 text-decoration-none">Home</a></li>
                <li class="breadcrumb-item active text-white">Dosen</li>
            </ol>
        </nav>
        <h1 class="fw-bold text-white mb-1"><i class="bi bi-person-badge-fill me-2"></i>Data Dosen</h1>
        <p class="text-white-50 mb-0">Profil tenaga pengajar Universitas EduCourse</p>
    </div>
</div>

<div class="container py-5">

    <x-alert type="success">
        <strong>{{ count($lecturers) }} Dosen</strong> terdaftar aktif mengajar di Universitas EduCourse.
    </x-alert>

    <div class="row g-4">
        @foreach($lecturers as $lec)
        <div class="col-sm-6 col-lg-4 col-xl-3">
            <div class="card border-0 shadow-sm rounded-3 h-100 stat-card text-center">
                <div class="card-body p-4">
                    <img src="{{ $lec['foto'] }}" alt="{{ $lec['nama'] }}"
                         class="rounded-circle mb-3 border border-3 border-primary-subtle"
                         style="width:90px;height:90px;object-fit:cover;">
                    <h6 class="fw-bold mb-1" style="font-size:.9rem;">{{ $lec['nama'] }}</h6>
                    <p class="text-muted small mb-2">
                        <code>{{ $lec['nidn'] }}</code>
                    </p>
                    <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill small px-3 mb-3">
                        {{ $lec['bidang'] }}
                    </span>
                    <div class="d-grid gap-1 mt-auto">
                        <button class="btn btn-sm btn-outline-primary rounded-2"
                                data-bs-toggle="modal"
                                data-bs-target="#modalLec{{ $lec['id'] }}">
                            <i class="bi bi-eye me-1"></i>Lihat Detail
                        </button>
                        <a href="mailto:{{ $lec['email'] }}" class="btn btn-sm btn-outline-secondary rounded-2">
                            <i class="bi bi-envelope me-1"></i>Email
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Modal detail --}}
        <div class="modal fade" id="modalLec{{ $lec['id'] }}" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content border-0 shadow rounded-4">
                    <div class="modal-header border-0 pb-0">
                        <h5 class="modal-title fw-bold">Detail Dosen</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body px-4 pb-4">
                        <div class="text-center mb-4">
                            <img src="{{ $lec['foto'] }}" alt="{{ $lec['nama'] }}"
                                 class="rounded-circle border border-3 border-primary"
                                 style="width:110px;height:110px;object-fit:cover;">
                            <h5 class="fw-bold mt-3 mb-1">{{ $lec['nama'] }}</h5>
                            <span class="badge bg-primary rounded-pill">{{ $lec['bidang'] }}</span>
                        </div>
                        <ul class="list-group list-group-flush rounded-3 mb-3">
                            <li class="list-group-item d-flex justify-content-between">
                                <span class="text-muted small">NIDN</span>
                                <code>{{ $lec['nidn'] }}</code>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span class="text-muted small">Email</span>
                                <a href="mailto:{{ $lec['email'] }}" class="small">{{ $lec['email'] }}</a>
                            </li>
                            <li class="list-group-item">
                                <div class="text-muted small mb-2">Mata Kuliah Diampu</div>
                                <div class="d-flex flex-wrap gap-1">
                                    @foreach($lec['mata_kuliah'] as $mk)
                                        <span class="badge bg-success bg-opacity-10 text-success rounded-pill">{{ $mk }}</span>
                                    @endforeach
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
