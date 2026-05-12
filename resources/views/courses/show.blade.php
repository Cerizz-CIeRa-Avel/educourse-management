@extends('layouts.app')

@section('title', $course['nama'])

@section('content')

<div class="hero-section py-4">
    <div class="container py-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-2">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white-50 text-decoration-none">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('courses') }}" class="text-white-50 text-decoration-none">Mata Kuliah</a></li>
                <li class="breadcrumb-item active text-white">{{ $course['kode'] }}</li>
            </ol>
        </nav>
        <div class="d-flex align-items-start gap-3">
            <div class="rounded-3 p-3 flex-shrink-0" style="background:rgba(255,255,255,.15);">
                <i class="bi bi-book-fill text-white fs-3"></i>
            </div>
            <div>
                <div class="d-flex align-items-center gap-2 mb-1 flex-wrap">
                    <span class="badge bg-white bg-opacity-25 text-white rounded-pill">{{ $course['kode'] }}</span>
                    @if($course['status'] === 'Wajib')
                        <span class="badge bg-danger rounded-pill">Wajib</span>
                    @else
                        <span class="badge bg-warning text-dark rounded-pill">Pilihan</span>
                    @endif
                </div>
                <h1 class="fw-bold text-white mb-1">{{ $course['nama'] }}</h1>
                <p class="text-white-50 mb-0">{{ $course['sks'] }} SKS — Semester {{ $course['semester'] }}</p>
            </div>
        </div>
    </div>
</div>

<div class="container py-5">
    <div class="row g-4">

        {{-- Main content --}}
        <div class="col-lg-8">

            <x-card title="Deskripsi Mata Kuliah" icon="file-text">
                <p class="text-muted lh-lg">{{ $course['deskripsi'] }}</p>
            </x-card>

            <x-card title="Tujuan Pembelajaran" icon="bullseye" class="mt-4">
                <ul class="list-group list-group-flush">
                    @foreach($course['tujuan'] as $i => $tujuan)
                    <li class="list-group-item d-flex gap-3 px-0">
                        <span class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0 fw-bold small"
                              style="width:28px;height:28px;background:linear-gradient(135deg,#4f46e5,#7c3aed);color:white;">
                            {{ $i + 1 }}
                        </span>
                        <span>{{ $tujuan }}</span>
                    </li>
                    @endforeach
                </ul>
            </x-card>

            <x-card title="Materi Perkuliahan" icon="list-ul" class="mt-4">
                <div class="row g-2">
                    @foreach($course['materi'] as $materi)
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center gap-2 p-2 rounded-3 bg-body-secondary">
                            <i class="bi bi-check-circle-fill text-success"></i>
                            <span class="small">{{ $materi }}</span>
                        </div>
                    </div>
                    @endforeach
                </div>
            </x-card>

        </div>

        {{-- Sidebar --}}
        <div class="col-lg-4">
            <x-card title="Informasi Mata Kuliah" icon="info-circle">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between px-0">
                        <span class="text-muted small">Kode MK</span>
                        <code class="text-primary">{{ $course['kode'] }}</code>
                    </li>
                    <li class="list-group-item d-flex justify-content-between px-0">
                        <span class="text-muted small">Bobot SKS</span>
                        <span class="badge bg-info bg-opacity-10 text-info rounded-pill">{{ $course['sks'] }} SKS</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between px-0">
                        <span class="text-muted small">Semester</span>
                        <span class="badge bg-secondary bg-opacity-10 text-secondary rounded-pill">{{ $course['semester'] }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between px-0">
                        <span class="text-muted small">Status</span>
                        @if($course['status'] === 'Wajib')
                            <span class="badge bg-danger rounded-pill">Wajib</span>
                        @else
                            <span class="badge bg-warning text-dark rounded-pill">Pilihan</span>
                        @endif
                    </li>
                    <li class="list-group-item px-0">
                        <div class="text-muted small mb-1">Dosen Pengampu</div>
                        <div class="d-flex align-items-center gap-2">
                            <div class="rounded-circle d-flex align-items-center justify-content-center"
                                 style="width:32px;height:32px;background:linear-gradient(135deg,#4f46e5,#7c3aed);font-size:.7rem;color:white;font-weight:700;">
                                {{ strtoupper(substr($course['dosen'], 0, 1)) }}
                            </div>
                            <span class="small fw-medium">{{ $course['dosen'] }}</span>
                        </div>
                    </li>
                </ul>
            </x-card>

            <div class="d-grid gap-2 mt-3">
                <a href="{{ route('courses') }}" class="btn btn-outline-primary rounded-3">
                    <i class="bi bi-arrow-left me-2"></i>Semua Mata Kuliah
                </a>
            </div>

            {{-- Related courses --}}
            @if(count($related) > 0)
            <x-card title="Mata Kuliah Terkait" icon="link-45deg" class="mt-3">
                @foreach($related as $r)
                <a href="{{ route('course.detail', ['id' => $r['id']]) }}"
                   class="d-flex align-items-center gap-2 p-2 rounded-3 text-decoration-none mb-2
                          {{ $loop->last ? '' : '' }}"
                   style="transition:background .2s;"
                   onmouseover="this.style.background='var(--bs-primary-bg-subtle)'"
                   onmouseout="this.style.background='transparent'">
                    <div class="rounded-2 p-2 flex-shrink-0" style="background:var(--bs-primary-bg-subtle);">
                        <i class="bi bi-book text-primary small"></i>
                    </div>
                    <div>
                        <div class="small fw-medium">{{ $r['nama'] }}</div>
                        <div class="text-muted" style="font-size:.75rem;">{{ $r['sks'] }} SKS · Sem. {{ $r['semester'] }}</div>
                    </div>
                </a>
                @endforeach
            </x-card>
            @endif
        </div>

    </div>
</div>

@endsection
