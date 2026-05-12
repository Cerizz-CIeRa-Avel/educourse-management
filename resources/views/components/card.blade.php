@props([
    'title'   => null,
    'icon'    => null,
    'badge'   => null,
    'badgeType' => 'primary',
    'footer'  => null,
    'hover'   => true,
    'shadow'  => 'sm',
])

<div class="card border-0 shadow-{{ $shadow }} rounded-3 {{ $hover ? 'stat-card' : '' }}">

    @if($title)
        <div class="card-header bg-transparent border-bottom d-flex align-items-center justify-content-between py-3">
            <div class="d-flex align-items-center gap-2">
                @if($icon)
                    <i class="bi bi-{{ $icon }} text-primary fs-5"></i>
                @endif
                <h6 class="mb-0 fw-semibold">{{ $title }}</h6>
            </div>
            @if($badge)
                <span class="badge bg-{{ $badgeType }} rounded-pill">{{ $badge }}</span>
            @endif
        </div>
    @endif

    <div class="card-body">
        {{ $slot }}
    </div>

    @if($footer)
        <div class="card-footer bg-transparent border-top small text-muted py-2">
            {{ $footer }}
        </div>
    @endif

</div>
