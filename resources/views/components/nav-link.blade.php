@props(['active','icon'])

@php
$classes = ($active ?? false)
            ? 'flex items-center gap-5 p-2 text-gray-700 rounded-lg bg-gray-100 hover:bg-gray-100 group transition-all duration-300'
            : 'flex items-center gap-5 p-2 text-gray-600 rounded-lg hover:bg-gray-100 group transition-all duration-300';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    <i
        @class([
            $icon.' text-gray-600 transition duration-300 group-hover:text-gray-900',
            $icon.' text-gray-700 transition duration-300' => $active ?? false,
        ])
    ></i>
    {{ $slot }}
</a>
