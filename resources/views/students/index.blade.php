@extends('layouts.app')

@section('title', 'Data Mahasiswa')

@section('content')

{{-- Page Header --}}
<div class="hero-section py-4">
    <div class="container py-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-2">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white-50 text-decoration-none">Home</a></li>
                <li class="breadcrumb-item active text-white">Mahasiswa</li>
            </ol>
        </nav>
        <h1 class="fw-bold text-white mb-1"><i class="bi bi-people-fill me-2"></i>Data Mahasiswa</h1>
        <p class="text-white-50 mb-0">Kelola dan pantau data seluruh mahasiswa aktif</p>
    </div>
</div>

<div class="container py-5">

    {{-- Stat summary --}}
    <div class="row g-3 mb-4">
        <div class="col-sm-4">
            <div class="card border-0 shadow-sm rounded-3 p-3 text-center">
                <div class="fs-2 fw-bold text-primary">{{ $total }}</div>
                <div class="text-muted small">Total Mahasiswa</div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card border-0 shadow-sm rounded-3 p-3 text-center">
                <div class="fs-2 fw-bold text-success">{{ $aktif }}</div>
                <div class="text-muted small">Mahasiswa Aktif</div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card border-0 shadow-sm rounded-3 p-3 text-center">
                <div class="fs-2 fw-bold text-danger">{{ $nonaktif }}</div>
                <div class="text-muted small">Mahasiswa Nonaktif</div>
            </div>
        </div>
    </div>

    {{-- Alert component usage --}}
    <x-alert type="info" :dismissible="true">
        <strong>Info:</strong> Data mahasiswa ditampilkan dalam mode read-only. Untuk edit data, silakan login sebagai Admin.
    </x-alert>

    <x-card title="Daftar Mahasiswa" icon="people" badge="{{ $total }} Mahasiswa" badgeType="primary">

        {{-- Search & Filter Bar --}}
        <div class="row g-2 mb-4">
            <div class="col-md-6">
                <div class="input-group">
                    <span class="input-group-text bg-body border-end-0">
                        <i class="bi bi-search text-muted"></i>
                    </span>
                    <input type="text" id="searchInput" class="form-control border-start-0 ps-0"
                           placeholder="Cari nama, NIM, atau jurusan...">
                </div>
            </div>
            <div class="col-md-3">
                <select id="filterStatus" class="form-select">
                    <option value="">Semua Status</option>
                    <option value="Aktif">Aktif</option>
                    <option value="Nonaktif">Nonaktif</option>
                </select>
            </div>
            <div class="col-md-3">
                <select id="filterAngkatan" class="form-select">
                    <option value="">Semua Angkatan</option>
                    <option value="2023">2023</option>
                    <option value="2022">2022</option>
                    <option value="2021">2021</option>
                    <option value="2020">2020</option>
                </select>
            </div>
        </div>

        {{-- No result alert --}}
        <div id="noResult" class="alert alert-warning d-none rounded-3">
            <i class="bi bi-search me-2"></i>Tidak ada data yang sesuai dengan pencarian.
        </div>

        {{-- Table --}}
        <div class="table-responsive">
            <table class="table table-hover align-middle" id="studentTable">
                <thead class="table-dark">
                    <tr>
                        <th width="50">#</th>
                        <th>Nama Mahasiswa</th>
                        <th>NIM</th>
                        <th>Jurusan</th>
                        <th width="90">Angkatan</th>
                        <th width="110">Status</th>
                        <th width="80">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $s)
                    <tr class="student-row">
                        <td class="text-muted small">{{ $loop->iteration }}</td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0"
                                     style="width:36px;height:36px;background:linear-gradient(135deg,#4f46e5,#7c3aed);font-size:.75rem;color:white;font-weight:600;">
                                    {{ strtoupper(substr($s['nama'], 0, 1)) }}
                                </div>
                                <span class="fw-medium">{{ $s['nama'] }}</span>
                            </div>
                        </td>
                        <td><code class="text-primary">{{ $s['nim'] }}</code></td>
                        <td class="text-muted">{{ $s['jurusan'] }}</td>
                        <td>
                            <span class="badge bg-secondary bg-opacity-10 text-secondary rounded-pill">{{ $s['angkatan'] }}</span>
                        </td>
                        <td>
                            @if($s['status'] === 'Aktif')
                                <span class="badge bg-success rounded-pill px-3">
                                    <i class="bi bi-circle-fill me-1" style="font-size:.4rem;"></i>Aktif
                                </span>
                            @else
                                <span class="badge bg-danger rounded-pill px-3">
                                    <i class="bi bi-circle-fill me-1" style="font-size:.4rem;"></i>Nonaktif
                                </span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('student.greet', ['name' => urlencode($s['nama'])]) }}"
                               class="btn btn-sm btn-outline-primary rounded-2">
                                <i class="bi bi-eye"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Pagination UI (manual) --}}
        <nav class="mt-3">
            <ul class="pagination pagination-sm justify-content-end">
                <li class="page-item disabled"><a class="page-link" href="#">«</a></li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item disabled"><a class="page-link" href="#">»</a></li>
            </ul>
        </nav>

    </x-card>
</div>

@endsection

@section('scripts')
<script>
    // ── Realtime Search JS ────────────────────────────────────
    const searchInput    = document.getElementById('searchInput');
    const filterStatus   = document.getElementById('filterStatus');
    const filterAngkatan = document.getElementById('filterAngkatan');
    const rows           = document.querySelectorAll('.student-row');
    const noResult       = document.getElementById('noResult');

    function filterTable() {
        const query    = searchInput.value.toLowerCase().trim();
        const status   = filterStatus.value.toLowerCase();
        const angkatan = filterAngkatan.value;
        let visible    = 0;

        rows.forEach(function (row) {
            const text     = row.innerText.toLowerCase();
            const inSearch = text.includes(query);
            const inStatus = status   ? text.includes(status)   : true;
            const inTahun  = angkatan ? text.includes(angkatan) : true;

            if (inSearch && inStatus && inTahun) {
                row.style.display = '';
                visible++;
            } else {
                row.style.display = 'none';
            }
        });

        noResult.classList.toggle('d-none', visible > 0);
    }

    searchInput.addEventListener('input', filterTable);
    filterStatus.addEventListener('change', filterTable);
    filterAngkatan.addEventListener('change', filterTable);
</script>
@endsection
