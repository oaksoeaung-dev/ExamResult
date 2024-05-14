@props(['disabled' => false,'messages','icon'])

<div class="relative">
    <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none {{ !empty($messages) ? 'text-red-500' : 'text-gray-600' }}">
        <i class=" {{ !empty($icon) ? $icon : '' }}"></i>
    </div>
    <input
        {{ $disabled ? 'disabled' : '' }}
        {{ $attributes }}
        @class([
            "bg-white border-gray-300 border text-gray-900 text-sm rounded-lg shadow-sm focus:ring-gray-500 focus:border-gray-500 block w-full ps-10 p-2.5",
            "border-red-400" => !empty($messages)
        ])
    >
</div>

@if (!empty($messages))
    <ul class = 'text-sm text-red-600 space-y-1 mt-2'>
        @foreach ((array) $messages as $message)
            <li class="text-red-600">{{ $message }}</li>
        @endforeach
    </ul>
@endif

{{-- {!! $attributes->merge(['class' => "bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-gray-500 focus:border-gray-500 block w-full ps-10 p-2.5"]) !!} --}}
