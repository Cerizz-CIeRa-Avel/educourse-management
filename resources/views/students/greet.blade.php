@extends('layouts.app')

@section('title', 'Sapa Mahasiswa')

@section('content')
<div class="container py-5 text-center">
    <div class="py-5">
        <div class="display-1 mb-4">👋</div>
        <h1 class="fw-bold mb-3">Hello, <span class="text-primary">{{ $name }}</span>!</h1>
        <p class="text-muted fs-5">Selamat datang di EduCourse Management System.</p>
        <a href="{{ route('students') }}" class="btn btn-primary rounded-pill px-4 mt-3">
            <i class="bi bi-arrow-left me-2"></i>Kembali ke Data Mahasiswa
        </a>
    </div>
</div>
@endsection
