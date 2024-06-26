@props([
    "disabled" => false,
    "messages",
    "icon",
])

<div class="relative">
    <div
        class="{{ ! empty($messages) ? "text-red-500" : "text-zinc-600" }} pointer-events-none absolute inset-y-0 start-0 flex items-center ps-3.5"
    >
        <i class="{{ ! empty($icon) ? $icon : "" }}"></i>
    </div>
    <input
        {{ $disabled ? "disabled" : "" }}
        {{ $attributes }}
        @class([
            "block w-full rounded-lg border border-zinc-300 bg-white p-2.5 ps-10 text-sm text-zinc-900 shadow-sm focus:border-zinc-500 focus:ring-zinc-500",
            "border-red-400" => ! empty($messages),
        ])
    />
</div>

@if (! empty($messages))
    <ul class="mt-2 space-y-1 text-sm text-red-600">
        @foreach ((array) $messages as $message)
            <li class="text-red-600">{{ $message }}</li>
        @endforeach
    </ul>
@endif

{{-- {!! $attributes->merge(['class' => "bg-zinc-50 border border-zinc-300 text-zinc-900 text-sm rounded-lg shadow-sm focus:ring-zinc-500 focus:border-zinc-500 block w-full ps-10 p-2.5"]) !!} --}}
