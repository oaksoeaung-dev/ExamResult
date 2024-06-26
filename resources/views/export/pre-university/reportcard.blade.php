<x-app-layout>
    <div class="space-y-10">
        <div>
            <h1 class="flex items-center gap-2">
                <i class="fi fi-rr-apartment"></i>
                <span>Pre-University</span>
            </h1>
        </div>
        <div class="max-w-2xl rounded-lg border p-5 shadow">
            <h2 class="text-2xl">
                Upload
                <span class="text-red-500">CSV</span>
                File
            </h2>
            <form
                action="{{ route("export.pre-university.reportcard-export") }}"
                method="post"
                enctype="multipart/form-data"
                class="mt-5 space-y-5"
            >
                @csrf
                <div>
                    <div class="flex">
                        <input
                            type="file"
                            name="csv"
                            id="file-input"
                            class="peer block w-full rounded-l-lg border-y border-l border-zinc-200 text-sm shadow-sm file:me-4 file:border-0 file:bg-zinc-50 file:px-4 file:py-3 focus:border-zinc-500 focus:outline-none disabled:pointer-events-none disabled:opacity-50"
                        />
                        <select
                            name="marks"
                            class="border bg-zinc-50 text-sm focus:border-zinc-500 focus:outline-none peer-focus:border-zinc-500"
                        >
                            <option selected disabled>Choose Mark</option>
                            <option value="80marks">80 Marks</option>
                            <option value="50marks">50 Marks</option>
                        </select>
                        <a
                            href="{{ route("export.pre-university.download", "preuni_example.csv") }}"
                            class="flex w-52 items-center justify-center gap-3 rounded-r-lg border-y border-r border-zinc-200 bg-zinc-50 py-2 text-sm hover:bg-zinc-100 peer-focus:border-zinc-500"
                        >
                            <i class="fi fi-rr-file-download"></i>
                            <span>Example CSV</span>
                        </a>
                    </div>
                    @error("csv")
                        <p class="mt-1 text-red-500">{{ $message }}</p>
                    @enderror

                    @error("marks")
                        <p class="mt-1 text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex justify-end gap-3">
                    <a href="{{ route("export.pre-university.index") }}" class="btn-red">Cancel</a>
                    <button class="btn-zinc">Submit</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
