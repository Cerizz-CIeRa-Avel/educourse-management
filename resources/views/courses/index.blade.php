@extends('layouts.app')

@section('title', 'Mata Kuliah')

@section('content')

<div class="hero-section py-4">
    <div class="container py-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-2">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white-50 text-decoration-none">Home</a></li>
                <li class="breadcrumb-item active text-white">Mata Kuliah</li>
            </ol>
        </nav>
        <h1 class="fw-bold text-white mb-1"><i class="bi bi-book-fill me-2"></i>Mata Kuliah</h1>
        <p class="text-white-50 mb-0">Kurikulum Program Studi Teknik Informatika</p>
    </div>
</div>

<div class="container py-5">

    {{-- Filter tabs by semester --}}
    <ul class="nav nav-pills mb-4 gap-1" id="semesterTab">
        <li class="nav-item">
            <button class="nav-link active rounded-pill" data-sem="0">Semua</button>
        </li>
        @foreach(range(1, 6) as $sem)
        <li class="nav-item">
            <button class="nav-link rounded-pill" data-sem="{{ $sem }}">Semester {{ $sem }}</button>
        </li>
        @endforeach
    </ul>

    <x-card title="Daftar Mata Kuliah" icon="book" badge="{{ count($courses) }} MK" badgeType="success">

        <div class="table-responsive">
            <table class="table table-hover align-middle" id="courseTable">
                <thead class="table-dark">
                    <tr>
                        <th width="80">Kode</th>
                        <th>Nama Mata Kuliah</th>
                        <th width="60" class="text-center">SKS</th>
                        <th width="90" class="text-center">Semester</th>
                        <th>Dosen Pengampu</th>
                        <th width="90">Status</th>
                        <th width="80">Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($courses as $c)
                    <tr data-semester="{{ $c['semester'] }}">
                        <td><code class="text-primary small">{{ $c['kode'] }}</code></td>
                        <td>
                            <span class="fw-medium">{{ $c['nama'] }}</span>
                        </td>
                        <td class="text-center">
                            <span class="badge bg-info bg-opacity-10 text-info rounded-pill">{{ $c['sks'] }} SKS</span>
                        </td>
                        <td class="text-center">
                            <span class="badge bg-secondary bg-opacity-10 text-secondary rounded-pill">Sem. {{ $c['semester'] }}</span>
                        </td>
                        <td class="text-muted small">{{ $c['dosen'] }}</td>
                        <td>
                            @if($c['status'] === 'Wajib')
                                <span class="badge bg-danger rounded-pill px-3">Wajib</span>
                            @else
                                <span class="badge bg-warning text-dark rounded-pill px-3">Pilihan</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('course.detail', ['id' => $c['id']]) }}"
                               class="btn btn-sm btn-outline-primary rounded-2">
                                <i class="bi bi-eye"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </x-card>

    {{-- Summary cards by semester --}}
    <div class="row g-3 mt-4">
        @foreach(range(1, 6) as $sem)
        @php $semCourses = collect($courses)->where('semester', $sem); @endphp
        <div class="col-sm-6 col-md-4 col-xl-2">
            <div class="card border-0 shadow-sm rounded-3 text-center p-3">
                <div class="fw-bold fs-4 text-primary">{{ $semCourses->count() }}</div>
                <div class="text-muted small">Sem. {{ $sem }}</div>
                <div class="text-muted" style="font-size:.7rem;">
                    {{ $semCourses->sum('sks') }} SKS total
                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>

@endsection

@section('scripts')
<script>
    // Filter by semester
    document.querySelectorAll('#semesterTab .nav-link').forEach(function (btn) {
        btn.addEventListener('click', function () {
            document.querySelectorAll('#semesterTab .nav-link').forEach(b => b.classList.remove('active'));
            this.classList.add('active');

            const sem = this.dataset.sem;
            document.querySelectorAll('#courseTable tbody tr').forEach(function (row) {
                if (sem === '0' || row.dataset.semester === sem) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    });
</script>
@endsection
