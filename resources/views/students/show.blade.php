@php use Carbon\Carbon; @endphp
<x-app-layout>
    <div class="space-y-5">
        <div class="grid p-8 gap-5 bg-zinc-50/60 h-fit rounded-lg shadow-lg border border-zinc-50 relative">
            <div class="absolute top-5 right-5 flex flex-col gap-2">
                <a href="{{ route('students.edit',$student->id) }}" class="">
                    <i class="fi fi-rr-pen-square text-xl text-zinc-500 hover:text-zinc-700 transition-all duration-300"></i>
                </a>

                <a href="#" data-delete-id="{{ $student->id }}" data-modal-target="confirm-delete-modal"
                   data-modal-toggle="confirm-delete-modal" class="delete-btn">
                    <i
                        class="fi fi-rr-trash text-xl text-red-500 hover:text-red-700 transition-all duration-300"></i>
                </a>
            </div>
            <div class="col-span-5">
                <h3 class="text-2xl flex items-center gap-3"><i class="fi fi-rr-id-badge"></i><span>Personal Information</span></h3>
            </div>

            <div class="grid grid-cols-5 gap-5 my-5">
                <div class="col-span-1">
                    <img src="{{ !empty($student->image) ? asset('storage/studentphotos/'.$student->image) : asset('images/profiles/'. $student->gender.".png")  }}" class="w-full h-72 object-contain bg-white" />
                </div>
                <div class="col-start-2 col-span-4 space-y-3 px-5">
                    <div class="flex items-center gap-5">
                        <p class="font-semibold w-32">Name : </p>
                        <p>{{ $student->name }}</p>
                    </div>
                    <div class="flex items-center gap-5">
                        <p class="font-semibold w-32">Student ID : </p>
                        <p>{{ $student->stdId }}</p>
                    </div>
                    <div class="flex items-center gap-5">
                        <p class="font-semibold w-32">Email : </p>
                        <p>{{ $student->email }}</p>
                    </div>
                    <div class="flex items-center gap-5">
                        <p class="font-semibold w-32">Phone : </p>
                        <p>{{ $student->phone }}</p>
                    </div>
                    <div class="flex items-center gap-5">
                        <p class="font-semibold w-32">Date Of Birth : </p>
                        <p>{{ Carbon::parse($student->dob)->format('d-M-y') }}</p>
                    </div>
                    <div class="flex items-center gap-5">
                        <p class="font-semibold w-32">Gender : </p>
                        <p>{{ ucfirst($student->gender) }}</p>
                    </div>
                    <div class="flex items-center gap-5">
                        <p class="font-semibold w-32">Address : </p>
                        <p>{{ $student->address }}</p>
                    </div>
                    <div class="flex items-center gap-5">
                        <p class="font-semibold w-32">Guardian Name : </p>
                        <p>{{ $student->guardian_name }}</p>
                    </div>
                    <div class="flex items-center gap-5">
                        <p class="font-semibold w-32">Health Record : </p>
                        <a href="{{ route('healthrecords.show',$student->id) }}" class="text-sky-500 hover:underline">View</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="grid gap-5 p-8 bg-zinc-50/60 h-fit rounded-lg shadow-lg border border-zinc-50">
            <div class="">
                <h3 class="text-2xl flex items-center gap-3"><i class="fi fi-rr-books"></i><span>Academic</span></h3>
            </div>
            <div class="grid grid-cols-6 gap-5">
                <div class="col-span-3 relative h-96 overflow-auto rounded-lg">
                    <div class="px-6 py-3 flex justify-between bg-zinc-900">
                        <h4 class="text-xl text-zinc-50 font-medium">Classes</h4>
                        <a class="text-zinc-800 bg-zinc-50 focus:ring-4 focus:outline-none focus:ring-zinc-300 font-medium rounded-lg text-sm px-5 py-1 text-center transition-all duration-300" data-modal-target="add-class-modal" data-modal-toggle="add-class-modal" href="#">Add Class</a>
                    </div>
                    <table class="w-full text-sm text-left text-zinc-500 overflow-hidden">
                        <thead class="text-xs text-zinc-700 uppercase bg-zinc-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Start Date
                            </th>
                            <th scope="col" class="px-6 py-3">
                                End Date
                            </th>
                            <th scope="col" class="px-6 py-3">

                            </th>
                        </tr>
                        </thead>
                        <tbody class="">
                        @foreach($classes as $class)
                            <tr class="bg-zinc-50">
                                <th class="px-6 py-4 font-normal text-zinc-700 whitespace-nowrap">
                                    {{ $class->name }}
                                </th>
                                <th class="px-6 py-4 font-normal text-zinc-700 whitespace-nowrap">
                                    {{ Carbon::parse($class->startdate)->format("d-M-Y") }}
                                </th>
                                <th class="px-6 py-4 font-normal text-zinc-700 whitespace-nowrap">
                                    {{ Carbon::parse($class->enddate)->format("d-M-Y") }}
                                </th>
                                <th class="px-6 py-4 font-normal text-zinc-700 whitespace-nowrap">
                                    <a href="#" data-delete-id="{{ $class->id }}"
                                       data-modal-target="confirm-removeclass-modal"
                                       data-modal-toggle="confirm-removeclass-modal"
                                       class="text-sm text-red-500 remove-btn">Remove</a>
                                </th>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-span-3 relative h-96 overflow-auto rounded-lg">
                    <div class="px-6 py-3 flex justify-between bg-zinc-900">
                        <h4 class="text-xl text-zinc-50 font-medium">Exam Results</h4>
                    </div>

                    <div data-accordion="collapse" data-active-classes="bg-teal-100 text-blue-600">
                        @foreach($classes as $class)
                            <h2>
                                <button type="button" class="flex items-center justify-between w-full p-3 bg-zinc-50 hover:bg-zinc-100 transition-all duration-300 gap-3" data-accordion-target="#{{ $class->slug}}" aria-expanded="false">
                                    <span class="text-sm">{{ $class->name}}</span>
                                </button>
                            </h2>
                            <div id="{{ $class->slug}}" class="hidden">
                                <div class="bg-zinc-50">
                                    <a href="{{ route('student.addResults',[$student->id,$class->id]) }}" class="flex justify-center items-center hover:bg-zinc-100 transition-all duration-300 gap-3 py-3"><i class="fi fi-rr-multiple"></i><span class="text-sm">Add Results</span></a>
                                </div>
                            </div>

                        @endforeach
                    </div>
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
                    <h3 class="mb-5 text-lg font-normal text-zinc-500">Are you sure you want to delete this student? All
                        data and related class will be delete!</h3>

                    <form id="delete-form" action="{{ route('students.index') }}/" method="POST" class="hidden">@csrf
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

    {{-- Start Add Class Modal--}}
    <div id="add-class-modal" tabindex="-1"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow">
                <button type="button"
                    class="absolute top-3 end-2.5 text-zinc-400 bg-transparent hover:bg-zinc-200 hover:text-zinc-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                    data-modal-hide="add-class-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-4 md:p-5 text-center space-y-4">
                    <h3 class="mb-5 text-lg font-normal text-zinc-500">Add Class</h3>
                    <form action="{{ route('student.addAcademicClass',$student->id) }}" method="post">
                        @csrf
                        <select id="small" name="academicclass"
                            class="block w-full p-2 mb-6 text-sm text-zinc-900 border border-zinc-300 rounded-lg bg-zinc-50 focus:ring-2 focus:ring-zinc-300 focus:ring-offset-1">
                            <option selected disabled>Choose a class</option>
                            @foreach($allClasses as $class)
                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                            @endforeach
                        </select>
                        <div class="flex justify-end gap-4">
                            <button data-modal-hide="add-class-modal" type="button"
                                class="btn-outline-zinc">Cancel</button>
                            <button data-modal-hide="add-class-modal" type="submit" class="btn-zinc">
                                Add
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    {{-- Start Add Class Modal--}}

    {{--Start Remove Class Modal--}}
    <div id="confirm-removeclass-modal" tabindex="-1"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow">
                <button type="button"
                    class="absolute top-3 end-2.5 text-zinc-400 bg-transparent hover:bg-zinc-200 hover:text-zinc-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                    data-modal-hide="confirm-removeclass-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-4 md:p-5 text-center space-y-4">
                    <img src="{{ asset('images/icons/trash.png') }}" class="h-20 w-auto mx-auto" alt="bin" />
                    <h3 class="mb-5 text-lg font-normal text-zinc-500">Are you sure you want to remove this class?</h3>

                    <form id="remove-form" action="/students/removeacademicclass/{{ $student->id }}/" method="POST"
                        class="hidden">@csrf @method('DELETE')</form>

                    <button data-modal-hide="confirm-removeclass-modal" type="submit" form="remove-form"
                        class="btn-red">
                        Yes, I'm sure
                    </button>
                    <button data-modal-hide="confirm-removeclass-modal" type="button" class="btn-outline-zinc">No,
                        cancel</button>
                </div>
            </div>
        </div>
    </div>
    {{--End Remove Class Modal--}}
    @section('scripts')
    <script type="text/javascript" src="{{ asset('js/deleteModal.js') }}"></script>
    <script>
        let removeBtns = document.querySelectorAll('.remove-btn');
        let removeFormTargetUrl = document.getElementById('remove-form').getAttribute('action');
        removeBtns.forEach((removeBtn) => {
            removeBtn.addEventListener('click', function () {
                document.getElementById('remove-form').action = removeFormTargetUrl + removeBtn.getAttribute('data-delete-id');
            });
        })

    </script>
    @endsection
</x-app-layout>
