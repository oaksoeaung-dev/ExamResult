@props(['active','icon'])

@php
$classes = ($active ?? false)
            ? 'flex items-center gap-2 mx-2 p-2 pl-9 text-zinc-700 rounded-lg bg-white hover:bg-white group transition-all duration-300'
            : 'flex items-center gap-2 mx-2 p-2 pl-9 text-zinc-600 rounded-lg hover:bg-white group transition-all duration-300';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    <i
        @class([
            $icon.' text-zinc-600 transition duration-300 group-hover:text-zinc-900',
            $icon.' text-zinc-700 transition duration-300' => $active ?? false,
        ])
    ></i>
    {{ $slot }}
</a>
