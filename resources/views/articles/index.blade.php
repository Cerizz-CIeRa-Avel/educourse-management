@extends('layouts.app')

@section('title', 'Artikel')

@section('content')

<div class="hero-section py-4">
    <div class="container py-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-2">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white-50 text-decoration-none">Home</a></li>
                <li class="breadcrumb-item active text-white">Artikel</li>
            </ol>
        </nav>
        <h1 class="fw-bold text-white mb-1"><i class="bi bi-newspaper me-2"></i>Artikel</h1>
        <p class="text-white-50 mb-0">Wawasan dan panduan dari para dosen &amp; akademisi</p>
    </div>
</div>

<div class="container py-5">

    <div class="row g-4">
        {{-- Article grid --}}
        <div class="col-lg-8">
            <div class="row g-4">
                @foreach($articles as $article)
                <div class="col-md-6">
                    <a href="{{ route('article.detail', ['slug' => $article['slug']]) }}" class="text-decoration-none">
                        <div class="card border-0 shadow-sm rounded-3 h-100 stat-card overflow-hidden">
                            <img src="{{ $article['foto'] }}" alt="{{ $article['judul'] }}"
                                 style="height:180px;object-fit:cover;">
                            <div class="card-body p-3">
                                <div class="d-flex align-items-center gap-2 mb-2">
                                    <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill small">{{ $article['kategori'] }}</span>
                                    <small class="text-muted">{{ $article['tanggal'] }}</small>
                                </div>
                                <h6 class="fw-bold mb-2 lh-sm">{{ $article['judul'] }}</h6>
                                <p class="text-muted small mb-3 lh-base">{{ Str::limit($article['excerpt'], 100) }}</p>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="rounded-circle d-flex align-items-center justify-content-center"
                                         style="width:28px;height:28px;background:linear-gradient(135deg,#4f46e5,#7c3aed);font-size:.65rem;color:white;font-weight:700;">
                                        {{ strtoupper(substr($article['penulis'], 0, 1)) }}
                                    </div>
                                    <small class="text-muted">{{ $article['penulis'] }}</small>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>

        {{-- Sidebar --}}
        <div class="col-lg-4">
            <x-card title="Kategori" icon="tag">
                @php
                    $kategoriList = collect($articles)->groupBy('kategori');
                @endphp
                <div class="d-flex flex-column gap-2">
                    @foreach($kategoriList as $kat => $items)
                    <div class="d-flex justify-content-between align-items-center p-2 rounded-3 bg-body-secondary">
                        <span class="small">{{ $kat }}</span>
                        <span class="badge bg-primary rounded-pill">{{ count($items) }}</span>
                    </div>
                    @endforeach
                </div>
            </x-card>

            <x-card title="Artikel Populer" icon="fire" class="mt-3">
                @foreach(collect($articles)->take(4) as $a)
                <a href="{{ route('article.detail', $a['slug']) }}" class="text-decoration-none d-flex gap-2 mb-3">
                    <img src="{{ $a['foto'] }}" alt="" class="rounded-2 flex-shrink-0"
                         style="width:56px;height:56px;object-fit:cover;">
                    <div>
                        <div class="small fw-medium lh-sm" style="color:inherit;">{{ Str::limit($a['judul'], 50) }}</div>
                        <div class="text-muted" style="font-size:.75rem;">{{ $a['tanggal'] }}</div>
                    </div>
                </a>
                @endforeach
            </x-card>

            <x-card title="Tags" icon="hash" class="mt-3">
                <div class="d-flex flex-wrap gap-2">
                    @foreach(collect($articles)->pluck('tags')->flatten()->unique() as $tag)
                    <span class="badge bg-body-secondary text-body rounded-pill px-3 py-2 small">{{ $tag }}</span>
                    @endforeach
                </div>
            </x-card>
        </div>
    </div>
</div>

@endsection
