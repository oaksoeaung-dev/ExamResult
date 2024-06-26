@php
    use Carbon\Carbon;
@endphp

<x-app-layout>
    <div class="space-y-5">
        <div class="relative grid h-fit gap-5 rounded-lg border border-zinc-50 bg-zinc-50/60 p-8 shadow-lg">
            <div class="absolute right-5 top-5 flex flex-col gap-2">
                <a href="{{ route("students.edit", $student->id) }}" class="">
                    <i
                        class="fi fi-rr-pen-square text-xl text-zinc-500 transition-all duration-300 hover:text-zinc-700"
                    ></i>
                </a>

                <a
                    href="#"
                    data-delete-id="{{ $student->id }}"
                    data-modal-target="confirm-delete-modal"
                    data-modal-toggle="confirm-delete-modal"
                    class="delete-btn"
                >
                    <i class="fi fi-rr-trash text-xl text-red-500 transition-all duration-300 hover:text-red-700"></i>
                </a>
            </div>
            <div class="col-span-5">
                <h3 class="flex items-center gap-3 text-2xl">
                    <i class="fi fi-rr-id-badge"></i>
                    <span>Personal Information</span>
                </h3>
            </div>

            <div class="my-5 grid grid-cols-5 gap-5">
                <div class="col-span-1">
                    <img
                        src="{{ ! empty($student->image) ? asset("storage/studentphotos/" . $student->image) : asset("images/profiles/" . $student->gender . ".png") }}"
                        class="h-72 w-full bg-white object-contain"
                    />
                </div>
                <div class="col-span-4 col-start-2 space-y-3 px-5">
                    <div class="flex items-center gap-5">
                        <p class="w-32 font-semibold">Name :</p>
                        <p>{{ $student->name }}</p>
                    </div>
                    <div class="flex items-center gap-5">
                        <p class="w-32 font-semibold">Student ID :</p>
                        <p>{{ $student->stdId }}</p>
                    </div>
                    <div class="flex items-center gap-5">
                        <p class="w-32 font-semibold">Email :</p>
                        <p>{{ $student->email }}</p>
                    </div>
                    <div class="flex items-center gap-5">
                        <p class="w-32 font-semibold">Phone :</p>
                        <p>{{ $student->phone }}</p>
                    </div>
                    <div class="flex items-center gap-5">
                        <p class="w-32 font-semibold">Date Of Birth :</p>
                        <p>{{ Carbon::parse($student->dob)->format("d-M-y") }}</p>
                    </div>
                    <div class="flex items-center gap-5">
                        <p class="w-32 font-semibold">Gender :</p>
                        <p>{{ ucfirst($student->gender) }}</p>
                    </div>
                    <div class="flex items-center gap-5">
                        <p class="w-32 font-semibold">Address :</p>
                        <p>{{ $student->address }}</p>
                    </div>
                    <div class="flex items-center gap-5">
                        <p class="w-32 font-semibold">Guardian Name :</p>
                        <p>{{ $student->guardian_name }}</p>
                    </div>
                    <div class="flex items-center gap-5">
                        <p class="w-32 font-semibold">Health Record :</p>
                        <a href="{{ route("healthrecords.show", $student->id) }}" class="text-sky-500 hover:underline">
                            View
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="grid h-fit gap-5 rounded-lg border border-zinc-50 bg-zinc-50/60 p-8 shadow-lg">
            <div class="">
                <h3 class="flex items-center gap-3 text-2xl">
                    <i class="fi fi-rr-books"></i>
                    <span>Academic</span>
                </h3>
            </div>
            <div class="grid grid-cols-6 gap-5">
                <div class="relative col-span-3 h-96 overflow-auto rounded-lg">
                    <div class="flex justify-between bg-zinc-900 px-6 py-3">
                        <h4 class="text-xl font-medium text-zinc-50">Classes</h4>
                        <a
                            class="rounded-lg bg-zinc-50 px-5 py-1 text-center text-sm font-medium text-zinc-800 transition-all duration-300 focus:outline-none focus:ring-4 focus:ring-zinc-300"
                            data-modal-target="add-class-modal"
                            data-modal-toggle="add-class-modal"
                            href="#"
                        >
                            Add Class
                        </a>
                    </div>
                    <table class="w-full overflow-hidden text-left text-sm text-zinc-500">
                        <thead class="bg-zinc-50 text-xs uppercase text-zinc-700">
                            <tr>
                                <th scope="col" class="px-6 py-3">Name</th>
                                <th scope="col" class="px-6 py-3">Start Date</th>
                                <th scope="col" class="px-6 py-3">End Date</th>
                                <th scope="col" class="px-6 py-3"></th>
                            </tr>
                        </thead>
                        <tbody class="">
                            @foreach ($classes as $class)
                                <tr class="bg-zinc-50">
                                    <th class="whitespace-nowrap px-6 py-4 font-normal text-zinc-700">
                                        {{ $class->name }}
                                    </th>
                                    <th class="whitespace-nowrap px-6 py-4 font-normal text-zinc-700">
                                        {{ Carbon::parse($class->startdate)->format("d-M-Y") }}
                                    </th>
                                    <th class="whitespace-nowrap px-6 py-4 font-normal text-zinc-700">
                                        {{ Carbon::parse($class->enddate)->format("d-M-Y") }}
                                    </th>
                                    <th class="whitespace-nowrap px-6 py-4 font-normal text-zinc-700">
                                        <a
                                            href="#"
                                            data-delete-id="{{ $class->id }}"
                                            data-modal-target="confirm-removeclass-modal"
                                            data-modal-toggle="confirm-removeclass-modal"
                                            class="remove-btn text-sm text-red-500"
                                        >
                                            Remove
                                        </a>
                                    </th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="relative col-span-3 h-96 overflow-auto rounded-lg">
                    <div class="flex justify-between bg-zinc-900 px-6 py-3">
                        <h4 class="text-xl font-medium text-zinc-50">Exam Results</h4>
                    </div>

                    <div data-accordion="collapse" data-active-classes="bg-teal-100 text-blue-600">
                        @foreach ($classes as $class)
                            <h2>
                                <button
                                    type="button"
                                    class="flex w-full items-center justify-between gap-3 bg-zinc-50 p-3 transition-all duration-300 hover:bg-zinc-100"
                                    data-accordion-target="#{{ $class->slug }}"
                                    aria-expanded="false"
                                >
                                    <span class="text-sm">{{ $class->name }}</span>
                                </button>
                            </h2>
                            <div id="{{ $class->slug }}" class="hidden">
                                <div class="bg-zinc-50">
                                    <a
                                        href="{{ route("student.addResults", [$student->id, $class->id]) }}"
                                        class="flex items-center justify-center gap-3 py-3 transition-all duration-300 hover:bg-zinc-100"
                                    >
                                        <i class="fi fi-rr-multiple"></i>
                                        <span class="text-sm">Add Results</span>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Start Confirm Delete Modal --}}
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
                        Are you sure you want to delete this student? All data and related class will be delete!
                    </h3>

                    <form id="delete-form" action="{{ route("students.index") }}/" method="POST" class="hidden">
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
    {{-- End Confirm Delete Modal --}}

    {{-- Start Add Class Modal --}}
    <div
        id="add-class-modal"
        tabindex="-1"
        class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0"
    >
        <div class="relative max-h-full w-full max-w-md p-4">
            <div class="relative rounded-lg bg-white shadow">
                <button
                    type="button"
                    class="absolute end-2.5 top-3 ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-zinc-400 hover:bg-zinc-200 hover:text-zinc-900"
                    data-modal-hide="add-class-modal"
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
                    <h3 class="mb-5 text-lg font-normal text-zinc-500">Add Class</h3>
                    <form action="{{ route("student.addAcademicClass", $student->id) }}" method="post">
                        @csrf
                        <select
                            id="small"
                            name="academicclass"
                            class="mb-6 block w-full rounded-lg border border-zinc-300 bg-zinc-50 p-2 text-sm text-zinc-900 focus:ring-2 focus:ring-zinc-300 focus:ring-offset-1"
                        >
                            <option selected disabled>Choose a class</option>
                            @foreach ($allClasses as $class)
                                <option value="{{ $class->id }}">{{ $class->name }}</option>
                            @endforeach
                        </select>
                        <div class="flex justify-end gap-4">
                            <button data-modal-hide="add-class-modal" type="button" class="btn-outline-zinc">
                                Cancel
                            </button>
                            <button data-modal-hide="add-class-modal" type="submit" class="btn-zinc">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- Start Add Class Modal --}}

    {{-- Start Remove Class Modal --}}
    <div
        id="confirm-removeclass-modal"
        tabindex="-1"
        class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0"
    >
        <div class="relative max-h-full w-full max-w-md p-4">
            <div class="relative rounded-lg bg-white shadow">
                <button
                    type="button"
                    class="absolute end-2.5 top-3 ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-zinc-400 hover:bg-zinc-200 hover:text-zinc-900"
                    data-modal-hide="confirm-removeclass-modal"
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
                    <img src="{{ asset("images/icons/trash.png") }}" class="mx-auto h-20 w-auto" alt="bin" />
                    <h3 class="mb-5 text-lg font-normal text-zinc-500">Are you sure you want to remove this class?</h3>

                    <form
                        id="remove-form"
                        action="/students/removeacademicclass/{{ $student->id }}/"
                        method="POST"
                        class="hidden"
                    >
                        @csrf
                        @method("DELETE")
                    </form>

                    <button
                        data-modal-hide="confirm-removeclass-modal"
                        type="submit"
                        form="remove-form"
                        class="btn-red"
                    >
                        Yes, I'm sure
                    </button>
                    <button data-modal-hide="confirm-removeclass-modal" type="button" class="btn-outline-zinc">
                        No, cancel
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{-- End Remove Class Modal --}}
    @section("scripts")
        <script type="text/javascript" src="{{ asset("js/deleteModal.js") }}"></script>
        <script>
            let removeBtns = document.querySelectorAll('.remove-btn');
            let removeFormTargetUrl = document.getElementById('remove-form').getAttribute('action');
            removeBtns.forEach((removeBtn) => {
                removeBtn.addEventListener('click', function () {
                    document.getElementById('remove-form').action =
                        removeFormTargetUrl + removeBtn.getAttribute('data-delete-id');
                });
            });
        </script>
    @endsection
</x-app-layout>
