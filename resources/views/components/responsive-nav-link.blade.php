@props([
    "active",
])

@php
    $classes = $active ?? false ? "block w-full border-l-4 border-indigo-400 bg-indigo-50 py-2 pe-4 ps-3 text-start text-base font-medium text-indigo-700 transition duration-150 ease-in-out focus:border-indigo-700 focus:bg-indigo-100 focus:text-indigo-800 focus:outline-none" : "block w-full border-l-4 border-transparent py-2 pe-4 ps-3 text-start text-base font-medium text-zinc-600 transition duration-150 ease-in-out hover:border-zinc-300 hover:bg-zinc-50 hover:text-zinc-800 focus:border-zinc-300 focus:bg-zinc-50 focus:text-zinc-800 focus:outline-none";
@endphp

<a {{ $attributes->merge(["class" => $classes]) }}>
    {{ $slot }}
</a>
