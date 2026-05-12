@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('styles')
<style>
    body { overflow-x: hidden; }

    /* Sidebar */
    #adminSidebar {
        position: fixed;
        top: 0;
        left: 0;
        width: 250px;
        height: 100vh;
        z-index: 1040;
        transition: transform .3s ease;
        padding-top: 80px;
    }

    #adminSidebar.collapsed {
        transform: translateX(-250px);
    }

    #adminContent {
        margin-left: 250px;
        transition: margin-left .3s ease;
        min-height: 100vh;
    }

    #adminContent.expanded {
        margin-left: 0;
    }

    @media (max-width: 991.98px) {
        #adminSidebar { transform: translateX(-250px); }
        #adminSidebar.show { transform: translateX(0); }
        #adminContent { margin-left: 0 !important; }
    }

    /* Manual bar chart */
    .bar-chart-bar {
        transition: height 1s ease;
        border-radius: .5rem .5rem 0 0;
        min-width: 36px;
    }
</style>
@endsection

@section('content')

{{-- ── Sidebar ── --}}
<aside id="adminSidebar" class="admin-sidebar d-flex flex-column p-3 shadow-lg">
    <div class="text-center mb-4 mt-2">
        <div class="rounded-circle d-flex align-items-center justify-content-center mx-auto mb-2"
             style="width:60px;height:60px;background:rgba(255,255,255,.15);">
            <i class="bi bi-person-fill text-white fs-4"></i>
        </div>
        <div class="text-white fw-semibold">{{ session('admin_name', 'Admin') }}</div>
        <div class="text-white-50 small">Administrator</div>
    </div>

    <nav class="nav flex-column gap-1">
        <a href="{{ route('admin.dashboard') }}" class="nav-link active d-flex align-items-center gap-2">
            <i class="bi bi-speedometer2"></i>Dashboard
        </a>
        <a href="{{ route('students') }}" class="nav-link d-flex align-items-center gap-2">
            <i class="bi bi-people"></i>Mahasiswa
        </a>
        <a href="{{ route('lecturers') }}" class="nav-link d-flex align-items-center gap-2">
            <i class="bi bi-person-badge"></i>Dosen
        </a>
        <a href="{{ route('courses') }}" class="nav-link d-flex align-items-center gap-2">
            <i class="bi bi-book"></i>Mata Kuliah
        </a>
        <a href="{{ route('articles') }}" class="nav-link d-flex align-items-center gap-2">
            <i class="bi bi-newspaper"></i>Artikel
        </a>
        <hr style="border-color:rgba(255,255,255,.2);">
        <a href="{{ route('profile') }}" class="nav-link d-flex align-items-center gap-2">
            <i class="bi bi-person-circle"></i>Profile
        </a>
        <a href="{{ route('admin.logout') }}" class="nav-link d-flex align-items-center gap-2 text-danger">
            <i class="bi bi-box-arrow-right"></i>Logout
        </a>
    </nav>

    <div class="mt-auto">
        <div class="p-2 rounded-3 text-center" style="background:rgba(255,255,255,.08);">
            <div class="text-white-50 small">EduCourse v1.0</div>
            <div class="text-white-50" style="font-size:.7rem;">Laravel 10 · Bootstrap 5</div>
        </div>
    </div>
</aside>

{{-- ── Main Content ── --}}
<main id="adminContent" class="pb-5">
    <div class="p-4">

        {{-- Topbar --}}
        <div class="d-flex align-items-center justify-content-between mb-4">
            <div class="d-flex align-items-center gap-3">
                <button id="sidebarToggle" class="btn btn-outline-secondary rounded-2" onclick="toggleSidebar()">
                    <i class="bi bi-layout-sidebar-inset"></i>
                </button>
                <div>
                    <h4 class="mb-0 fw-bold">Dashboard Admin</h4>
                    <div class="text-muted small">{{ now()->translatedFormat('l, d F Y') }}</div>
                </div>
            </div>
            <a href="{{ route('admin.logout') }}" class="btn btn-outline-danger btn-sm rounded-pill">
                <i class="bi bi-box-arrow-right me-1"></i>Logout
            </a>
        </div>

        @if(session('success'))
        <x-alert type="success">{{ session('success') }}</x-alert>
        @endif

        {{-- Stat Cards --}}
        <div class="row g-3 mb-4">
            @php
                $statItems = [
                    ['label' => 'Total Mahasiswa',  'value' => $stats['total_students'],  'icon' => 'people-fill',       'color' => '#4f46e5', 'bg' => '#ede9fe', 'change' => '+2 bulan ini'],
                    ['label' => 'Total Dosen',      'value' => $stats['total_lecturers'], 'icon' => 'person-badge-fill', 'color' => '#0891b2', 'bg' => '#e0f2fe', 'change' => 'Stabil'],
                    ['label' => 'Mata Kuliah',      'value' => $stats['total_courses'],   'icon' => 'book-fill',         'color' => '#059669', 'bg' => '#d1fae5', 'change' => '8 Wajib · 4 Pilihan'],
                    ['label' => 'Artikel',          'value' => $stats['total_articles'],  'icon' => 'newspaper',         'color' => '#d97706', 'bg' => '#fef3c7', 'change' => '+1 minggu ini'],
                ];
            @endphp

            @foreach($statItems as $item)
            <div class="col-sm-6 col-xl-3">
                <div class="card border-0 shadow-sm rounded-3 p-3 h-100">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <div class="rounded-3 p-2" style="background:{{ $item['bg'] }};">
                            <i class="bi bi-{{ $item['icon'] }} fs-5" style="color:{{ $item['color'] }};"></i>
                        </div>
                        <span class="badge bg-success bg-opacity-10 text-success rounded-pill small">↑</span>
                    </div>
                    <div class="fw-bold fs-3 mb-0" style="color:{{ $item['color'] }};">{{ $item['value'] }}</div>
                    <div class="text-muted small fw-medium">{{ $item['label'] }}</div>
                    <div class="text-muted mt-1" style="font-size:.72rem;">{{ $item['change'] }}</div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="row g-4">

            {{-- Manual Bar Chart --}}
            <div class="col-lg-7">
                <div class="card border-0 shadow-sm rounded-3 p-4 h-100">
                    <h6 class="fw-bold mb-4"><i class="bi bi-bar-chart-fill me-2 text-primary"></i>Progress Mata Kuliah</h6>
                    <div class="d-flex flex-column gap-3">
                        @foreach($courseProgress as $cp)
                        <div>
                            <div class="d-flex justify-content-between mb-1">
                                <span class="small fw-medium">{{ $cp['name'] }}</span>
                                <span class="small text-muted">{{ $cp['pct'] }}%</span>
                            </div>
                            <div class="progress rounded-pill" style="height:10px;">
                                <div class="progress-bar bg-{{ $cp['color'] }} rounded-pill"
                                     data-width="{{ $cp['pct'] }}"
                                     style="width:0%;transition:width 1.2s ease;"
                                     role="progressbar" aria-valuenow="{{ $cp['pct'] }}"
                                     aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    {{-- Manual bar chart visual --}}
                    <div class="mt-4 pt-3 border-top">
                        <div class="d-flex align-items-end justify-content-around" style="height:120px;">
                            @php
                                $barColors = ['primary','success','info','warning','danger'];
                                $months    = ['Jan','Feb','Mar','Apr','Mei','Jun'];
                                $vals      = [65, 78, 55, 90, 72, 88];
                            @endphp
                            @foreach($months as $i => $m)
                            <div class="d-flex flex-column align-items-center gap-1">
                                <div class="bar-chart-bar bg-{{ $barColors[$i % 5] }}"
                                     data-h="{{ $vals[$i] }}"
                                     style="width:36px;height:0;transition:height 1s ease {{ $i * 0.1 }}s;">
                                </div>
                                <span class="text-muted" style="font-size:.7rem;">{{ $m }}</span>
                            </div>
                            @endforeach
                        </div>
                        <div class="text-muted text-center mt-1" style="font-size:.75rem;">Aktivitas Semester 2024</div>
                    </div>
                </div>
            </div>

            {{-- Recent Activity --}}
            <div class="col-lg-5">
                <div class="card border-0 shadow-sm rounded-3 p-4 h-100">
                    <h6 class="fw-bold mb-4"><i class="bi bi-activity me-2 text-primary"></i>Aktivitas Terbaru</h6>
                    @foreach($recentActivity as $act)
                    <div class="d-flex gap-3 mb-3 {{ $loop->last ? '' : 'pb-3 border-bottom' }}">
                        <div class="rounded-3 p-2 flex-shrink-0"
                             style="background:var(--bs-{{ $act['color'] }}-bg-subtle, #ede9fe);width:38px;height:38px;display:flex;align-items:center;justify-content:center;">
                            <i class="bi bi-{{ $act['icon'] }} text-{{ $act['color'] }} small"></i>
                        </div>
                        <div>
                            <div class="small fw-medium">{{ $act['action'] }}</div>
                            <div class="text-muted" style="font-size:.75rem;">{{ $act['time'] }}</div>
                        </div>
                    </div>
                    @endforeach

                    <div class="mt-3 pt-3 border-top">
                        <div class="row g-2 text-center">
                            <div class="col-6">
                                <div class="rounded-3 p-3 bg-body-secondary">
                                    <div class="fw-bold text-success">{{ $stats['total_students'] - 4 }}</div>
                                    <div class="text-muted" style="font-size:.72rem;">Mhs Aktif</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="rounded-3 p-3 bg-body-secondary">
                                    <div class="fw-bold text-warning">4</div>
                                    <div class="text-muted" style="font-size:.72rem;">Mhs Nonaktif</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        {{-- Quick links --}}
        <div class="row g-3 mt-2">
            <div class="col-12">
                <div class="card border-0 shadow-sm rounded-3 p-4">
                    <h6 class="fw-bold mb-3"><i class="bi bi-lightning-charge me-2 text-warning"></i>Akses Cepat</h6>
                    <div class="d-flex flex-wrap gap-2">
                        <a href="{{ route('students') }}"  class="btn btn-outline-primary rounded-3 btn-sm"><i class="bi bi-people me-1"></i>Mahasiswa</a>
                        <a href="{{ route('lecturers') }}" class="btn btn-outline-info rounded-3 btn-sm"><i class="bi bi-person-badge me-1"></i>Dosen</a>
                        <a href="{{ route('courses') }}"   class="btn btn-outline-success rounded-3 btn-sm"><i class="bi bi-book me-1"></i>Mata Kuliah</a>
                        <a href="{{ route('articles') }}"  class="btn btn-outline-warning rounded-3 btn-sm"><i class="bi bi-newspaper me-1"></i>Artikel</a>
                        <a href="{{ route('profile') }}"   class="btn btn-outline-secondary rounded-3 btn-sm"><i class="bi bi-person me-1"></i>Profile</a>
                        <a href="{{ route('home') }}"      class="btn btn-outline-dark rounded-3 btn-sm"><i class="bi bi-house me-1"></i>Homepage</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>

@endsection

@section('scripts')
<script>
    // ── Sidebar Collapse ─────────────────────────────────────
    function toggleSidebar() {
        const sidebar  = document.getElementById('adminSidebar');
        const content  = document.getElementById('adminContent');

        if (window.innerWidth >= 992) {
            sidebar.classList.toggle('collapsed');
            content.classList.toggle('expanded');
        } else {
            sidebar.classList.toggle('show');
        }
    }

    // ── Animate progress bars & bars ─────────────────────────
    document.addEventListener('DOMContentLoaded', function () {
        setTimeout(function () {
            document.querySelectorAll('.progress-bar[data-width]').forEach(function (bar) {
                bar.style.width = bar.dataset.width + '%';
            });
            document.querySelectorAll('.bar-chart-bar[data-h]').forEach(function (bar) {
                bar.style.height = bar.dataset.h + 'px';
            });
        }, 400);
    });
</script>
@endsection
