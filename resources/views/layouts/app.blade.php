<!DOCTYPE html>
<html lang="id" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'EduCourse') — EduCourse Management System</title>

    {{-- Bootstrap 5 CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- Bootstrap Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        :root {
            --edu-primary: #4f46e5;
            --edu-primary-dark: #3730a3;
            --edu-gradient: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
        }

        /* ── Transitions ── */
        body, .card, .navbar, .table, .badge, .btn, footer {
            transition: background-color .3s ease, color .3s ease, border-color .3s ease;
        }

        /* ── Brand ── */
        .navbar-brand .brand-logo {
            background: var(--edu-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-weight: 800;
        }

        /* ── Active nav link ── */
        .navbar .nav-link.active-link {
            color: var(--edu-primary) !important;
            font-weight: 600;
        }

        /* ── Sidebar (admin) ── */
        .admin-sidebar {
            min-height: 100vh;
            background: var(--edu-gradient);
        }
        .admin-sidebar .nav-link {
            color: rgba(255,255,255,.75);
            border-radius: .5rem;
            margin-bottom: .2rem;
            transition: all .2s;
        }
        .admin-sidebar .nav-link:hover,
        .admin-sidebar .nav-link.active {
            color: #fff;
            background: rgba(255,255,255,.15);
        }
        .admin-sidebar .nav-link i { width: 20px; }

        /* ── Stat card ── */
        .stat-card {
            border: none;
            border-radius: 1rem;
            overflow: hidden;
            transition: transform .25s, box-shadow .25s;
        }
        .stat-card:hover { transform: translateY(-4px); box-shadow: 0 12px 30px rgba(0,0,0,.12); }

        /* ── Hero ── */
        .hero-section {
            background: var(--edu-gradient);
            min-height: 420px;
        }

        /* ── Footer ── */
        footer.site-footer {
            background: #1e1b4b;
            color: #c7d2fe;
        }

        /* ── Dark mode overrides ── */
        [data-bs-theme="dark"] .navbar {
            border-bottom: 1px solid rgba(255,255,255,.08);
        }
        [data-bs-theme="dark"] footer.site-footer {
            background: #0f0e1a;
        }
        [data-bs-theme="dark"] .hero-section {
            background: linear-gradient(135deg, #312e81 0%, #4c1d95 100%);
        }

        /* ── Toast container ── */
        .toast-container { z-index: 9999; }

        /* ── Smooth scroll ── */
        html { scroll-behavior: smooth; }
    </style>

    @yield('styles')
</head>
<body>

{{-- ── NAVBAR ─────────────────────────────────────────────── --}}
@include('partials.navbar')

{{-- ── FLASH MESSAGES ──────────────────────────────────────── --}}
@if(session('success') || session('error') || session('info'))
    <div class="toast-container position-fixed top-0 end-0 p-3">
        @if(session('success'))
            <div class="toast align-items-center text-bg-success border-0 show" role="alert">
                <div class="d-flex">
                    <div class="toast-body"><i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}</div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
                </div>
            </div>
        @endif
        @if(session('error'))
            <div class="toast align-items-center text-bg-danger border-0 show" role="alert">
                <div class="d-flex">
                    <div class="toast-body"><i class="bi bi-exclamation-circle-fill me-2"></i>{{ session('error') }}</div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
                </div>
            </div>
        @endif
        @if(session('info'))
            <div class="toast align-items-center text-bg-info border-0 show" role="alert">
                <div class="d-flex">
                    <div class="toast-body"><i class="bi bi-info-circle-fill me-2"></i>{{ session('info') }}</div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
                </div>
            </div>
        @endif
    </div>
@endif

{{-- ── PAGE CONTENT ─────────────────────────────────────────── --}}
@yield('content')

{{-- ── FOOTER ────────────────────────────────────────────────── --}}
@include('partials.footer')

{{-- ── Bootstrap 5 JS ──────────────────────────────────────── --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // ── Dark Mode Toggle ─────────────────────────────────────
    const htmlEl   = document.documentElement;
    const savedTheme = localStorage.getItem('edu-theme') || 'light';
    htmlEl.setAttribute('data-bs-theme', savedTheme);

    function toggleDarkMode() {
        const current = htmlEl.getAttribute('data-bs-theme');
        const next    = current === 'dark' ? 'light' : 'dark';
        htmlEl.setAttribute('data-bs-theme', next);
        localStorage.setItem('edu-theme', next);
        updateDarkBtn(next);
    }

    function updateDarkBtn(theme) {
        const btn  = document.getElementById('darkModeBtn');
        const icon = document.getElementById('darkModeIcon');
        if (!btn || !icon) return;
        if (theme === 'dark') {
            icon.className = 'bi bi-sun-fill me-1';
            btn.title = 'Switch to Light Mode';
        } else {
            icon.className = 'bi bi-moon-fill me-1';
            btn.title = 'Switch to Dark Mode';
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
        updateDarkBtn(htmlEl.getAttribute('data-bs-theme'));

        // Auto-dismiss toasts after 4s
        document.querySelectorAll('.toast').forEach(function (el) {
            setTimeout(() => {
                const t = bootstrap.Toast.getOrCreateInstance(el);
                t.hide();
            }, 4000);
        });
    });
</script>

@yield('scripts')
</body>
</html>
"{{-- layout ready --}}" 
