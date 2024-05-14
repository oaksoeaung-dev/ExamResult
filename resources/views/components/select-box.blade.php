@props(['name'])

<div class="flex items-center">
    <input name="{{ $name }}" type="checkbox" {{ $attributes->merge(['class' => 'w-4 h-4 text-teal-600 bg-gray-100 border-gray-300 rounded']) }}>
    <label for="{{ $name }}" class="w-full py-3 ms-2 text-sm font-medium text-gray-900">{{ $slot }}</label>
</div>
