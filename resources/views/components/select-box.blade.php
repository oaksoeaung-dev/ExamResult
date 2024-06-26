@props([
    "name",
])

<div class="flex items-center">
    <input
        name="{{ $name }}"
        type="checkbox"
        {{ $attributes->merge(["class" => "w-4 h-4 text-teal-600 bg-zinc-100 border-zinc-300 rounded"]) }}
    />
    <label for="{{ $name }}" class="ms-2 w-full py-3 text-sm font-medium text-zinc-900">{{ $slot }}</label>
</div>
