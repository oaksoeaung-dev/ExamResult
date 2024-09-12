@props([
    "active",
    "icon",
])

@php
    $classes = $active ?? false ? "group flex items-center gap-5 rounded-lg bg-zinc-100 p-2 text-zinc-700 transition-all duration-300 hover:bg-zinc-100" : "group flex items-center gap-5 rounded-lg p-2 text-zinc-600 transition-all duration-300 hover:bg-zinc-100";
@endphp

<a {{ $attributes->merge(["class" => $classes]) }}>
    <i @class([$icon . " text-zinc-600 transition duration-300 group-hover:text-zinc-900", $icon . " text-zinc-700 transition duration-300" => $active ?? false])></i>
    {{ $slot }}
</a>
