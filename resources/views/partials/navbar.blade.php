<nav class="navbar navbar-expand-lg shadow-sm sticky-top" style="backdrop-filter: blur(10px);">
    <div class="container">

        {{-- Brand --}}
        <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('home') }}">
            <div class="rounded-2 d-flex align-items-center justify-content-center"
                 style="width:36px;height:36px;background:linear-gradient(135deg,#4f46e5,#7c3aed);">
                <i class="bi bi-mortarboard-fill text-white" style="font-size:1rem;"></i>
            </div>
            <span class="brand-logo fs-5">EduCourse</span>
        </a>

        {{-- Toggler --}}
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- Nav items --}}
        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav mx-auto gap-1">
                <li class="nav-item">
                    <a class="nav-link rounded-2 px-3 {{ request()->is('/') ? 'active-link' : '' }}"
                       href="{{ route('home') }}">
                        <i class="bi bi-house-door me-1"></i>Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link rounded-2 px-3 {{ request()->is('students') ? 'active-link' : '' }}"
                       href="{{ route('students') }}">
                        <i class="bi bi-people me-1"></i>Mahasiswa
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link rounded-2 px-3 {{ request()->is('lecturers') ? 'active-link' : '' }}"
                       href="{{ route('lecturers') }}">
                        <i class="bi bi-person-badge me-1"></i>Dosen
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link rounded-2 px-3 {{ request()->is('courses') || request()->is('course/*') ? 'active-link' : '' }}"
                       href="{{ route('courses') }}">
                        <i class="bi bi-book me-1"></i>Mata Kuliah
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link rounded-2 px-3 {{ request()->is('articles') || request()->is('articles/*') ? 'active-link' : '' }}"
                       href="{{ route('articles') }}">
                        <i class="bi bi-newspaper me-1"></i>Artikel
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link rounded-2 px-3 {{ request()->is('profile') ? 'active-link' : '' }}"
                       href="{{ route('profile') }}">
                        <i class="bi bi-person-circle me-1"></i>Profile
                    </a>
                </li>
            </ul>

            {{-- Right side --}}
            <div class="d-flex align-items-center gap-2">
                {{-- Dark Mode Toggle --}}
                <button id="darkModeBtn" onclick="toggleDarkMode()"
                        class="btn btn-sm btn-outline-secondary rounded-pill px-3"
                        title="Toggle Dark Mode">
                    <i id="darkModeIcon" class="bi bi-moon-fill me-1"></i>
                    <span class="d-none d-md-inline">Mode</span>
                </button>

                @if(session('is_admin'))
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-sm btn-primary rounded-pill px-3">
                        <i class="bi bi-speedometer2 me-1"></i>Dashboard
                    </a>
                    <a href="{{ route('admin.logout') }}" class="btn btn-sm btn-outline-danger rounded-pill px-3">
                        <i class="bi bi-box-arrow-right"></i>
                    </a>
                @else
                    <a href="{{ route('admin.login') }}"
                       class="btn btn-sm rounded-pill px-3 {{ request()->is('admin/*') ? 'btn-primary' : 'btn-outline-primary' }}">
                        <i class="bi bi-shield-lock me-1"></i>Admin
                    </a>
                @endif
            </div>
        </div>
    </div>
</nav>
