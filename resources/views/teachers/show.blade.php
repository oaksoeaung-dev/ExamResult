@php
    use Carbon\Carbon;
@endphp

<x-app-layout>
    <div class="max-w-md">
        <div class="relative h-fit rounded-lg border border-zinc-50 bg-zinc-50/60 p-8 shadow-lg">
            <div class="absolute right-5 top-5 flex flex-col gap-2">
                <a href="{{ route("teachers.edit", $teacher->id) }}" class="">
                    <i class="fi fi-rr-pen-square text-xl text-zinc-500 transition-all duration-300 hover:text-zinc-700"></i>
                </a>

                <a href="#" data-delete-id="{{ $teacher->id }}" data-modal-target="confirm-delete-modal" data-modal-toggle="confirm-delete-modal" class="delete-btn">
                    <i class="fi fi-rr-trash text-xl text-red-500 transition-all duration-300 hover:text-red-700"></i>
                </a>
            </div>
            <div class="space-y-5">
                <img src="{{ asset("storage/signs/" . $teacher->sign) }}" class="h-40 w-40 border border-zinc-300 bg-white object-contain ring-1 ring-zinc-500 ring-offset-4" />
                <h1 class="text-xl font-bold text-zinc-700">{{ $teacher->name }}</h1>
                <hr />
            </div>
            <div class="mt-5 space-y-3">
                <div class="flex items-center gap-4">
                    <p class="flex items-center justify-center rounded-md bg-zinc-800 p-3 text-sm">
                        <i class="fi fi-sr-envelope text-white"></i>
                    </p>
                    <p class="text-zinc-700">{{ $teacher->email }}</p>
                </div>
                <div class="flex items-center gap-4">
                    <p class="flex items-center justify-center rounded-md bg-zinc-800 p-3 text-sm">
                        <i class="fi fi-sr-key text-white"></i>
                    </p>
                    <p class="text-zinc-700">{{ $teacher->slug }}</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Start Confirm Delete Modal --}}
    <div id="confirm-delete-modal" tabindex="-1" class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0">
        <div class="relative max-h-full w-full max-w-md p-4">
            <div class="relative rounded-lg bg-white shadow">
                <button type="button" class="absolute end-2.5 top-3 ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-zinc-400 hover:bg-zinc-200 hover:text-zinc-900" data-modal-hide="confirm-delete-modal">
                    <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="space-y-4 p-4 text-center md:p-5">
                    <img src="{{ asset("images/icons/bin.png") }}" class="mx-auto h-24 w-auto" alt="bin" />
                    <h3 class="mb-5 text-lg font-normal text-zinc-500">Are you sure you want to delete this teacher? The teacher's sign will be delete!</h3>

                    <form id="delete-form" action="{{ route("teachers.index") }}/" method="POST" class="hidden">
                        @csrf
                        @method("DELETE")
                    </form>

                    <button data-modal-hide="confirm-delete-modal" type="submit" form="delete-form" class="btn-red">Yes, I'm sure</button>
                    <button data-modal-hide="confirm-delete-modal" type="button" class="btn-outline-zinc">No, cancel</button>
                </div>
            </div>
        </div>
    </div>
    {{-- End Confirm Delete Modal --}}

    @section("scripts")
        <script type="text/javascript" src="{{ asset("js/deleteModal.js") }}"></script>
    @endsection
</x-app-layout>
