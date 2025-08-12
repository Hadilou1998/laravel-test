@props([
    'type' => 'button',
    'variant' => 'primary',
    'size' => 'md',
])

@php

    $baseClasses = 'inline-flex items-center justify-center rounded-lg font-medium transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2';
    $variantClasses = [
        'primary' => 'bg-primary-600 text-white hover:bg-primary-700 focus:ring-primary-500',
        'secondary' => 'bg-secondary-600 text-white hover:bg-secondary-700 focus:ring-secondary-500',
        'danger' => 'bg-danger-600 text-white hover:bg-danger-700 focus:ring-danger-500',
    ][$variant] ?? $variant;

    $sizeClasses = [
        'sm' => 'px-3 py-2 text-sm',
        'md' => 'px-4 py-2 text-base',
        'lg' => 'px-5 py-3 text-lg',
    ][$size] ?? $size;
@endphp

<button type="{{ $type }}" {{ $attributes->merge(['class' => "$baseClasses $variantClasses $sizeClasses"]) }}>
    {{ $slot }}
</button>