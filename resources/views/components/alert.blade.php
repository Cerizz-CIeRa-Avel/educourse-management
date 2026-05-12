@props([
    'type'        => 'info',
    'dismissible' => true,
    'icon'        => null,
])

@php
    $icons = [
        'success' => 'check-circle-fill',
        'danger'  => 'exclamation-triangle-fill',
        'warning' => 'exclamation-circle-fill',
        'info'    => 'info-circle-fill',
        'primary' => 'bell-fill',
    ];
    $resolvedIcon = $icon ?? ($icons[$type] ?? 'info-circle-fill');
@endphp

<div class="alert alert-{{ $type }} {{ $dismissible ? 'alert-dismissible fade show' : '' }} d-flex align-items-start gap-2 rounded-3 shadow-sm"
     role="alert">
    <i class="bi bi-{{ $resolvedIcon }} mt-1 flex-shrink-0"></i>
    <div>{{ $slot }}</div>
    @if($dismissible)
        <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
    @endif
</div>
