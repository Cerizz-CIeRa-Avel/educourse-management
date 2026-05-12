@extends('layouts.app')

@section('title', '404 - Halaman Tidak Ditemukan')

@section('content')
<div class="min-vh-100 d-flex align-items-center py-5">
    <div class="container text-center">
        <div class="py-5">

            {{-- Animated 404 --}}
            <div class="position-relative d-inline-block mb-4">
                <div class="display-1 fw-black"
                     style="font-size:10rem;font-weight:900;background:linear-gradient(135deg,#4f46e5,#7c3aed);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;line-height:1;">
                    404
                </div>
            </div>

            <div class="mb-3">
                <i class="bi bi-emoji-frown display-3 text-muted"></i>
            </div>

            <h2 class="fw-bold mb-3">Halaman Tidak Ditemukan</h2>

            <p class="text-muted fs-5 mb-1">
                @if(isset($message))
                    {{ $message }}
                @else
                    Halaman yang kamu cari tidak ada atau telah dipindahkan.
                @endif
            </p>
            <p class="text-muted mb-5">Periksa kembali URL atau kembali ke beranda.</p>

            <div class="d-flex flex-wrap justify-content-center gap-3">
                <a href="{{ route('home') }}" class="btn btn-primary rounded-pill px-5 py-2 fw-semibold"
                   style="background:linear-gradient(135deg,#4f46e5,#7c3aed);border:none;">
                    <i class="bi bi-house-fill me-2"></i>Kembali ke Beranda
                </a>
                <button onclick="history.back()" class="btn btn-outline-secondary rounded-pill px-5 py-2">
                    <i class="bi bi-arrow-left me-2"></i>Halaman Sebelumnya
                </button>
            </div>

            {{-- Quick links --}}
            <div class="mt-5 pt-4 border-top">
                <p class="text-muted small mb-3">Mungkin yang kamu cari:</p>
                <div class="d-flex flex-wrap justify-content-center gap-2">
                    <a href="{{ route('students') }}"  class="btn btn-sm btn-outline-primary rounded-pill"><i class="bi bi-people me-1"></i>Mahasiswa</a>
                    <a href="{{ route('lecturers') }}" class="btn btn-sm btn-outline-info rounded-pill"><i class="bi bi-person-badge me-1"></i>Dosen</a>
                    <a href="{{ route('courses') }}"   class="btn btn-sm btn-outline-success rounded-pill"><i class="bi bi-book me-1"></i>Mata Kuliah</a>
                    <a href="{{ route('articles') }}"  class="btn btn-sm btn-outline-warning rounded-pill"><i class="bi bi-newspaper me-1"></i>Artikel</a>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
