@props([
    "active",
    "icon",
    "dropDownId",
    "dropDownName",
])

@php
    $classes = $active ?? false ? "cursor-pointer rounded-lg bg-zinc-100" : "group cursor-pointer rounded-lg transition-all duration-300 hover:bg-zinc-100";
@endphp

<div {{ $attributes->merge(["class" => $classes]) }}>
    <a {{ $attributes }} class="group flex w-full items-center gap-5 p-2 text-zinc-700 transition-all duration-300" data-collapse-toggle="{{ $dropDownId }}">
        <i @class([$icon . " text-zinc-600 transition duration-300 group-hover:text-zinc-900", $icon . " text-zinc-700 transition duration-300" => $active ?? false])></i>
        <span class="flex items-center gap-2">
            <span>{{ $dropDownName }}</span>
        </span>
    </a>
    <ul id="{{ $dropDownId }}" class="{{ $active == false ? "hidden" : "" }} space-y-2 py-2">
        {{ $slot }}
    </ul>
</div>
