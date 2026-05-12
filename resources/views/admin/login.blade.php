@extends('layouts.app')

@section('title', 'Admin Login')

@section('content')
<div class="min-vh-100 d-flex align-items-center" style="background:linear-gradient(135deg,#1e1b4b 0%,#312e81 50%,#4c1d95 100%);">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-10 col-md-7 col-lg-5 col-xl-4">

                <div class="text-center mb-4">
                    <div class="rounded-3 d-inline-flex align-items-center justify-content-center mb-3"
                         style="width:64px;height:64px;background:rgba(255,255,255,.15);backdrop-filter:blur(10px);">
                        <i class="bi bi-shield-lock-fill text-white fs-3"></i>
                    </div>
                    <h3 class="text-white fw-bold">Admin Login</h3>
                    <p class="text-white-50">EduCourse Management System</p>
                </div>

                <div class="card border-0 shadow-lg rounded-4 p-2">
                    <div class="card-body p-4">

                        @if(session('error'))
                        <x-alert type="danger">{{ session('error') }}</x-alert>
                        @endif

                        <x-alert type="info" :dismissible="false">
                            Demo — Username: <strong>admin</strong> / Password: <strong>admin123</strong>
                        </x-alert>

                        <form method="POST" action="{{ route('admin.login.post') }}" novalidate>
                            @csrf

                            <div class="mb-3">
                                <label for="username" class="form-label fw-medium small">Username</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-body border-end-0">
                                        <i class="bi bi-person text-muted"></i>
                                    </span>
                                    <input type="text" id="username" name="username"
                                           class="form-control border-start-0 ps-0 @error('username') is-invalid @enderror"
                                           value="{{ old('username') }}"
                                           placeholder="Masukkan username"
                                           required autofocus>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="password" class="form-label fw-medium small">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-body border-end-0">
                                        <i class="bi bi-lock text-muted"></i>
                                    </span>
                                    <input type="password" id="password" name="password"
                                           class="form-control border-start-0 border-end-0 ps-0"
                                           placeholder="Masukkan password"
                                           required>
                                    <button class="btn btn-outline-secondary border-start-0" type="button"
                                            onclick="togglePass()">
                                        <i class="bi bi-eye" id="eyeIcon"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary rounded-3 py-2 fw-semibold"
                                        style="background:linear-gradient(135deg,#4f46e5,#7c3aed);border:none;">
                                    <i class="bi bi-box-arrow-in-right me-2"></i>Login ke Dashboard
                                </button>
                            </div>
                        </form>

                        <div class="text-center mt-3">
                            <a href="{{ route('home') }}" class="text-muted small text-decoration-none">
                                <i class="bi bi-arrow-left me-1"></i>Kembali ke Beranda
                            </a>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-3 text-white-50 small">
                    &copy; {{ date('Y') }} EduCourse Management System
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function togglePass() {
        var input = document.getElementById('password');
        var icon  = document.getElementById('eyeIcon');
        if (input.type === 'password') {
            input.type = 'text';
            icon.className = 'bi bi-eye-slash';
        } else {
            input.type = 'password';
            icon.className = 'bi bi-eye';
        }
    }
</script>
@endsection
