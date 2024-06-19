@php use Carbon\Carbon; @endphp
<x-app-layout>
    <div class="max-w-md">
        <div class="p-8 bg-zinc-50/60 h-fit rounded-lg shadow-lg border border-zinc-50 relative">
            <div class="absolute top-5 right-5 flex flex-col gap-2">
                <a href="{{ route('teachers.edit',$teacher->id) }}" class="">
                    <i
                        class="fi fi-rr-pen-square text-xl text-zinc-500 hover:text-zinc-700 transition-all duration-300"></i>
                </a>

                <a href="#" data-delete-id="{{ $teacher->id }}" data-modal-target="confirm-delete-modal"
                   data-modal-toggle="confirm-delete-modal" class="delete-btn">
                    <i
                        class="fi fi-rr-trash text-xl text-red-500 hover:text-red-700 transition-all duration-300"></i>
                </a>
            </div>
            <div class="space-y-5">
                <img src="{{ asset('storage/signs/'.$teacher->sign) }}"
                     class="w-40 h-40 object-contain bg-white border border-zinc-300 ring-1 ring-zinc-500 ring-offset-4" />
                <h1 class="text-xl font-bold text-zinc-700">{{ $teacher->name }}</h1>
                <hr />
            </div>
            <div class="mt-5 space-y-3">
                <div class="flex items-center gap-4">
                    <p class="p-3 bg-zinc-800 flex items-center rounded-md justify-center text-sm"><i
                            class="fi fi-sr-envelope text-white"></i></p>
                    <p class="text-zinc-700">{{ $teacher->email }}</p>
                </div>
                <div class="flex items-center gap-4">
                    <p class="p-3 bg-zinc-800 flex items-center rounded-md justify-center text-sm"><i
                            class="fi fi-sr-key text-white"></i></p>
                    <p class="text-zinc-700">{{ $teacher->slug }}</p>
                </div>
            </div>
        </div>
    </div>

    {{--Start Confirm Delete Modal--}}
    <div id="confirm-delete-modal" tabindex="-1"
         class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow">
                <button type="button"
                        class="absolute top-3 end-2.5 text-zinc-400 bg-transparent hover:bg-zinc-200 hover:text-zinc-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                        data-modal-hide="confirm-delete-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-4 md:p-5 text-center space-y-4">
                    <img src="{{ asset('images/icons/bin.png') }}" class="h-24 w-auto mx-auto" alt="bin" />
                    <h3 class="mb-5 text-lg font-normal text-zinc-500">Are you sure you want to delete this teacher? The teacher's sign will be delete!</h3>

                    <form id="delete-form" action="{{ route('teachers.index') }}/" method="POST" class="hidden">@csrf
                        @method('DELETE')</form>

                    <button data-modal-hide="confirm-delete-modal" type="submit" form="delete-form" class="btn-red">
                        Yes, I'm sure
                    </button>
                    <button data-modal-hide="confirm-delete-modal" type="button" class="btn-outline-zinc">No,
                        cancel</button>
                </div>
            </div>
        </div>
    </div>
    {{--End Confirm Delete Modal--}}

    @section('scripts')
        <script type="text/javascript" src="{{ asset('js/deleteModal.js') }}"></script>
    @endsection
</x-app-layout>
