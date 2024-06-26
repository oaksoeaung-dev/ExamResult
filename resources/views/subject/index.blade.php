<x-app-layout>
    <div class="space-y-10">
        <div>
            <h1 class="flex items-center gap-2">
                <i class="fi fi-rr-diary-bookmark-down"></i>
                <span>Subjects</span>
            </h1>
        </div>

        <div class="relative overflow-x-auto">
            <table class="w-full text-left text-sm text-zinc-500">
                <thead class="bg-zinc-100 text-xs uppercase text-zinc-700">
                    <tr>
                        <th scope="col" class="px-6 py-3">Name</th>
                        <th scope="col" colspan="6" class="px-6 py-3 text-center">Skills</th>
                        <th scope="col" class="px-6 py-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subjects as $subject)
                        <tr class="border-b bg-white">
                            <th class="whitespace-nowrap px-6 py-4 font-normal text-zinc-700">
                                {{ $subject->name }}
                            </th>
                            @for ($i = 1; $i <=6; $i++)
                                <th class="px-6 py-4 font-normal text-zinc-700">
                                    {{ Str::limit($subject["skill" . $i], 10) }}
                                </th>
                            @endfor

                            <th class="flex gap-4 whitespace-nowrap px-6 py-4 font-normal text-zinc-700">
                                <a
                                    href="{{ route("subjects.show", $subject->id) }}"
                                    class="text-teal-500 transition-all duration-300 hover:text-teal-700"
                                >
                                    View
                                </a>
                                <a
                                    href="{{ route("subjects.edit", $subject->id) }}"
                                    class="text-sky-500 transition-all duration-300 hover:text-sky-700"
                                >
                                    Edit
                                </a>
                                <a
                                    href="#"
                                    data-delete-id="{{ $subject->id }}"
                                    data-modal-target="confirm-delete-modal"
                                    data-modal-toggle="confirm-delete-modal"
                                    class="delete-btn text-rose-500 transition-all duration-300 hover:text-rose-700"
                                >
                                    Delete
                                </a>
                            </th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div
        id="confirm-delete-modal"
        tabindex="-1"
        class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0"
    >
        <div class="relative max-h-full w-full max-w-md p-4">
            <div class="relative rounded-lg bg-white shadow">
                <button
                    type="button"
                    class="absolute end-2.5 top-3 ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-zinc-400 hover:bg-zinc-200 hover:text-zinc-900"
                    data-modal-hide="confirm-delete-modal"
                >
                    <svg
                        class="h-3 w-3"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 14 14"
                    >
                        <path
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"
                        />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="space-y-4 p-4 text-center md:p-5">
                    <img src="{{ asset("images/icons/bin.png") }}" class="mx-auto h-24 w-auto" alt="bin" />
                    <h3 class="mb-5 text-lg font-normal text-zinc-500">
                        Are you sure you want to delete this subject?
                    </h3>
                    <form id="delete-form" action="{{ route("subjects.index") }}/" method="POST" class="hidden">
                        @csrf
                        @method("DELETE")
                    </form>
                    <button data-modal-hide="confirm-delete-modal" type="submit" form="delete-form" class="btn-red">
                        Yes, I'm sure
                    </button>
                    <button data-modal-hide="confirm-delete-modal" type="button" class="btn-outline-zinc">
                        No, cancel
                    </button>
                </div>
            </div>
        </div>
    </div>
    @section("scripts")
        <script type="text/javascript" src="{{ asset("js/deleteModal.js") }}"></script>
    @endsection
</x-app-layout>
