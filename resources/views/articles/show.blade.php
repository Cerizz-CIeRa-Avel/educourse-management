@extends('layouts.app')

@section('title', $article['judul'])

@section('content')

<div class="hero-section py-4">
    <div class="container py-3">
        {{-- Breadcrumb --}}
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-2">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white-50 text-decoration-none">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('articles') }}" class="text-white-50 text-decoration-none">Artikel</a></li>
                <li class="breadcrumb-item active text-white">{{ Str::limit($article['judul'], 40) }}</li>
            </ol>
        </nav>
        <span class="badge bg-white bg-opacity-25 text-white rounded-pill mb-2">{{ $article['kategori'] }}</span>
        <h1 class="fw-bold text-white mb-2" style="max-width:700px;">{{ $article['judul'] }}</h1>
        <div class="d-flex align-items-center gap-3 text-white-50 small">
            <span><i class="bi bi-person me-1"></i>{{ $article['penulis'] }}</span>
            <span><i class="bi bi-calendar me-1"></i>{{ $article['tanggal'] }}</span>
        </div>
    </div>
</div>

<div class="container py-5">
    <div class="row g-4">

        {{-- Article content --}}
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-3 overflow-hidden">
                <img src="{{ $article['foto'] }}" alt="{{ $article['judul'] }}"
                     class="img-fluid" style="max-height:400px;object-fit:cover;">
                <div class="card-body p-4 p-md-5">
                    <p class="lead text-muted mb-4">{{ $article['excerpt'] }}</p>
                    <div class="article-content lh-lg">
                        {!! $article['konten'] !!}
                    </div>
                    {{-- Tags --}}
                    <div class="mt-4 pt-3 border-top d-flex flex-wrap gap-2">
                        @foreach($article['tags'] as $tag)
                        <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3 py-2">
                            <i class="bi bi-hash"></i>{{ $tag }}
                        </span>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- Share --}}
            <div class="mt-3 d-flex align-items-center gap-2">
                <span class="text-muted small me-1">Bagikan:</span>
                <button class="btn btn-sm btn-outline-primary rounded-pill px-3" onclick="copyLink()">
                    <i class="bi bi-link-45deg me-1"></i>Copy Link
                </button>
            </div>
        </div>

        {{-- Sidebar --}}
        <div class="col-lg-4">

            {{-- Author --}}
            <x-card title="Penulis" icon="person-circle">
                <div class="text-center">
                    <div class="rounded-circle d-flex align-items-center justify-content-center mx-auto mb-2"
                         style="width:60px;height:60px;background:linear-gradient(135deg,#4f46e5,#7c3aed);font-size:1.4rem;color:white;font-weight:700;">
                        {{ strtoupper(substr($article['penulis'], 0, 1)) }}
                    </div>
                    <div class="fw-semibold">{{ $article['penulis'] }}</div>
                    <div class="text-muted small">Kontributor EduCourse</div>
                </div>
            </x-card>

            {{-- Related articles --}}
            @if(count($related) > 0)
            <x-card title="Artikel Terkait" icon="newspaper" class="mt-3">
                @foreach($related as $r)
                <a href="{{ route('article.detail', $r['slug']) }}" class="text-decoration-none d-flex gap-3 mb-3 {{ $loop->last ? '' : 'pb-3 border-bottom' }}">
                    <img src="{{ $r['foto'] }}" alt="" class="rounded-2 flex-shrink-0"
                         style="width:64px;height:64px;object-fit:cover;">
                    <div>
                        <div class="small fw-semibold lh-sm mb-1" style="color:inherit;">{{ Str::limit($r['judul'], 55) }}</div>
                        <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill" style="font-size:.65rem;">{{ $r['kategori'] }}</span>
                    </div>
                </a>
                @endforeach
            </x-card>
            @endif

            <div class="mt-3">
                <a href="{{ route('articles') }}" class="btn btn-outline-primary w-100 rounded-3">
                    <i class="bi bi-arrow-left me-2"></i>Semua Artikel
                </a>
            </div>
        </div>

    </div>
</div>

@endsection

@section('scripts')
<script>
    function copyLink() {
        navigator.clipboard.writeText(window.location.href).then(function () {
            var btn = event.target.closest('button');
            var orig = btn.innerHTML;
            btn.innerHTML = '<i class="bi bi-check-lg me-1"></i>Disalin!';
            btn.classList.replace('btn-outline-primary', 'btn-success');
            setTimeout(() => {
                btn.innerHTML = orig;
                btn.classList.replace('btn-success', 'btn-outline-primary');
            }, 2000);
        });
    }
</script>
@endsection
