<x-app-layout>
    <div class="space-y-10">
        <div>
            <h1 class="flex gap-2 items-center"><i class="fi fi-rr-apartment"></i><span>Pre-University</span></h1>
        </div>
        <div class="max-w-2xl border p-5 rounded-lg shadow">
            <h2 class="text-2xl">Upload <span class="text-red-500">CSV</span> File</h2>
            <form action="{{ route("export.pre-university.reportcard-export") }}" method="post" enctype="multipart/form-data" class="space-y-5 mt-5">
                @csrf
                <div>
                    <div class="flex">
                        <input type="file" name="csv" id="file-input" class="peer block w-full border-y border-l border-gray-200 shadow-sm rounded-l-lg text-sm focus:outline-none focus:border-gray-500 disabled:opacity-50 disabled:pointer-events-none file:bg-gray-50 file:border-0 file:me-4 file:py-3 file:px-4">
                        <select name="marks" class="border focus:outline-none focus:border-gray-500 bg-gray-50 text-sm peer-focus:border-gray-500">
                            <option selected disabled>Choose Mark</option>
                            <option value="80marks">80 Marks</option>
                            <option value="50marks">50 Marks</option>
                        </select>
                        <a href="{{ route("export.pre-university.download","preuni_example.csv") }}" class="w-52 py-2 text-sm border-y border-r rounded-r-lg border-gray-200 bg-gray-50 flex gap-3 justify-center items-center peer-focus:border-gray-500 hover:bg-gray-100"><i class="fi fi-rr-file-download"></i><span>Example CSV</span></a>
                    </div>
                    @error('csv')
                        <p class="text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                    @error('marks')
                        <p class="text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex justify-end gap-3">
                    <a href="{{ route('export.pre-university.index') }}" class="btn-red">Cancel</a>
                    <button class="btn-gray">Submit</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
