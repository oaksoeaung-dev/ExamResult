<div class="">
    <label for="{{ $name }}" class="block mb-2 text-sm font-medium text-zinc-900">{{ $slot }}</label>
    <input type="text" id="{{ $name }}" name="{{ $name }}" {{ $attributes }} class="bg-zinc-50 border border-zinc-300 text-zinc-700 text-sm rounded-lg focus:ring-zinc-500 focus:border-zinc-500 block w-full p-2.5" placeholder="" />
    @error($name)
        <p class="text-red-500 text-xs mt-1 font-semibold">{{ $errors->first($name) }}</p>
    @enderror
</div>
