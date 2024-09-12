@props([
    "active",
    "icon",
])

@php
    $classes = $active ?? false ? "group mx-2 flex items-center gap-2 rounded-lg bg-white p-2 pl-9 text-zinc-700 transition-all duration-300 hover:bg-white" : "group mx-2 flex items-center gap-2 rounded-lg p-2 pl-9 text-zinc-600 transition-all duration-300 hover:bg-white";
@endphp

<a {{ $attributes->merge(["class" => $classes]) }}>
    <i @class([$icon . " text-zinc-600 transition duration-300 group-hover:text-zinc-900", $icon . " text-zinc-700 transition duration-300" => $active ?? false])></i>
    {{ $slot }}
</a>
