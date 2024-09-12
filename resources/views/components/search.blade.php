<form action="">
    <div class="flex justify-end">
        <div class="relative">
            <div class="pointer-events-none absolute inset-y-0 start-0 flex items-center ps-3.5">
                <i class="fi fi-rr-search"></i>
            </div>
            <input type="text" name="search" value="{{ request("search") }}" class="block w-full rounded-l-lg border-y border-s border-zinc-300 bg-white p-2.5 ps-10 text-sm text-zinc-900 shadow-sm focus:border-zinc-500 focus:ring-zinc-500" />
        </div>
        <button class="rounded-e-lg bg-zinc-800 px-5 py-2.5 text-sm font-medium text-white hover:bg-zinc-900 focus:outline-none focus:ring-4 focus:ring-zinc-300">Search</button>
    </div>
</form>
