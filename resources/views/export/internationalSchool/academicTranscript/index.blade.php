<x-app-layout>
    <div class="space-y-10">
        <div class="space-y-8">
            <h1 class="flex items-center gap-2">
                <i class="fi fi-rr-school"></i>
                <span>International School</span>
            </h1>
            <h2 class="text-3xl">Academic Transcript</h2>
        </div>
        <div class="grid grid-cols-2 gap-5">
            <div class="max-w-full h-fit rounded-lg border p-5 shadow">
                <h2 class="text-2xl">
                    Upload
                    <span class="text-red-500">XLSX</span>
                    File
                </h2>
                <form action="{{ route("export.internationalSchool.academicTranscript.generate") }}" method="post" enctype="multipart/form-data" class="mt-5 space-y-5">
                    @csrf
                    <div>
                        <div class="flex">
                            <input type="file" name="xlsx" id="file-input" class="peer block w-full rounded-l-lg border-y border-l border-zinc-200 text-sm shadow-sm file:me-4 file:border-0 file:bg-zinc-50 file:px-4 file:py-3 focus:border-zinc-500 focus:outline-none disabled:pointer-events-none disabled:opacity-50" />
                            <a href="{{ route("export.internationalSchool.download", "graduation_example.xlsx") }}" class="flex w-52 items-center justify-center gap-3 rounded-r-lg border-y border-r border-zinc-200 bg-zinc-50 py-2 text-sm hover:bg-zinc-100 peer-focus:border-zinc-500">
                                <i class="fi fi-rr-file-download"></i>
                                <span>Example XLSX</span>
                            </a>
                        </div>
                        @error("csv")
                        <p class="mt-1 text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex justify-end gap-3">
                        <a href="{{ route("export.internationalSchool") }}" class="btn-red">Cancel</a>
                        <button class="btn-zinc">Submit</button>
                    </div>
                </form>
            </div>

            @if($errors->any())
                <div class="max-w-full rounded-lg border p-5 shadow-lg shadow-rose-100 bg-rose-100 border-rose-100 text-gray-500">
                    <h2 class="text-2xl flex items-center gap-2"><i class="fi fi-rr-not-found text-gray-600"></i><span
                            class="text-gray-600">Errors Found</span></h2>
                    <ul class="list-disc p-5 space-y-1">
                        @foreach($errors->all() as $error)
                            <li class="text-gray-600">{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
