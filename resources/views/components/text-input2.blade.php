<div class="">
    <label for="{{ $name }}" class="mb-2 block text-sm font-medium text-zinc-900">{{ $slot }}</label>
    <input
        type="text"
        id="{{ $name }}"
        name="{{ $name }}"
        {{ $attributes }}
        class="block w-full rounded-lg border border-zinc-300 bg-zinc-50 p-2.5 text-sm text-zinc-700 focus:border-zinc-500 focus:ring-zinc-500"
        placeholder=""
    />
    @error($name)
        <p class="mt-1 text-xs font-semibold text-red-500">{{ $errors->first($name) }}</p>
    @enderror
</div>
