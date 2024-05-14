@props(['active','icon','dropDownId','dropDownName'])

@php
$classes = ($active ?? false)
            ? 'bg-gray-100 rounded-lg cursor-pointer'
            : 'hover:bg-gray-100 group transition-all duration-300 rounded-lg cursor-pointer';
@endphp

<div {{ $attributes->merge(['class' => $classes]) }}>
    <a {{ $attributes }} class="flex items-center gap-5 p-2 text-gray-700 w-full group transition-all duration-300" data-collapse-toggle="{{ $dropDownId }}">
        <i
            @class([
                $icon.' text-gray-600 transition duration-300 group-hover:text-gray-900',
                $icon.' text-gray-700 transition duration-300' => $active ?? false,
            ])
        ></i>
        <span class="flex items-center gap-2">
            <span>{{ $dropDownName }}</span>
        </span>
    </a>
    <ul id="{{ $dropDownId }}" class="{{ ($active == false) ? 'hidden' : '' }} py-2 space-y-2">
        {{ $slot }}
    </ul>
</div>
