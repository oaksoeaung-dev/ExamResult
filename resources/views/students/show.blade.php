@php use Carbon\Carbon; @endphp
<x-app-layout>
    <div class="grid grid-cols-6 gap-4">
        <div class="col-span-2 grid gap-8">
            <div class="p-8 bg-gray-50/60 h-fit rounded-lg shadow-lg border border-gray-50 relative">
                <div class="absolute top-5 right-5 flex flex-col gap-2">
                    <a href="{{ route('students.edit',$student->id) }}" class="">
                        <i
                            class="fi fi-rr-pen-square text-xl text-gray-500 hover:text-gray-700 transition-all duration-300"></i>
                    </a>

                    <a href="#" data-delete-id="{{ $student->id }}" data-modal-target="confirm-delete-modal"
                        data-modal-toggle="confirm-delete-modal" class="delete-btn">
                        <i
                            class="fi fi-rr-trash text-xl text-red-500 hover:text-red-700 transition-all duration-300"></i>
                    </a>
                </div>
                <div class="space-y-5">
                    <img src="{{ asset('storage/studentphotos/'.$student->image) }}"
                        class="w-40 h-40 mx-auto object-cover bg-white rounded-full border border-gray-300 ring-1 ring-gray-500 ring-offset-4" />
                    <h1 class="text-xl font-bold text-center text-gray-700">{{ $student->name }}</h1>
                    <hr />
                </div>
                <div class="mt-5 space-y-3">
                    <div class="flex items-center gap-4">
                        <p class="p-3 bg-gray-800 flex items-center rounded-md justify-center text-sm"><i
                                class="fi fi-sr-envelope text-white"></i></p>
                        <p class="text-gray-700">{{ $student->email }}</p>
                    </div>
                    <div class="flex items-center gap-4">
                        <p class="p-3 bg-gray-800 flex items-center rounded-md justify-center text-sm"><i
                                class="fi fi-sr-mobile-button text-white"></i></p>
                        <p class="text-gray-700">{{ $student->phone }}</p>
                    </div>
                    <div class="flex items-center gap-4">
                        <p class="p-3 bg-gray-800 flex items-center rounded-md justify-center text-sm"><i
                                class="fi fi-ss-venus-mars text-white"></i></p>
                        <p class="text-gray-700">{{ ucfirst($student->gender) }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-span-4 h-fit overflow-hidden grid gap-5">
            <div class="px-3">
                <div class="relative h-52 overflow-auto rounded-lg">
                    <div class="px-6 py-4 flex justify-between bg-sky-300">
                        <h4 class="text-2xl text-sky-50 font-medium">Classes</h4>
                        <a class="text-sky-500 bg-sky-50 focus:ring-4 focus:outline-none focus:ring-sky-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center transition-all duration-300" data-modal-target="add-class-modal" data-modal-toggle="add-class-modal" href="#">Add Class</a>
                    </div>
                    <table class="w-full text-sm text-left text-gray-500 overflow-hidden">
                        <thead class="text-xs text-gray-700 uppercase bg-sky-50">
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
                            <tr class="bg-sky-50">
                                <th class="px-6 py-4 font-normal text-gray-700 whitespace-nowrap">
                                    {{ $class->name }}
                                </th>
                                <th class="px-6 py-4 font-normal text-gray-700 whitespace-nowrap">
                                    {{ Carbon::parse($class->startdate)->format("d-M-Y") }}
                                </th>
                                <th class="px-6 py-4 font-normal text-gray-700 whitespace-nowrap">
                                    {{ Carbon::parse($class->enddate)->format("d-M-Y") }}
                                </th>
                                <th class="px-6 py-4 font-normal text-gray-700 whitespace-nowrap">
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
            </div>

            <div class="px-3">
                <div class="relative overflow-auto rounded-lg">
                    <div class="px-6 py-4 flex justify-between bg-teal-300">
                        <h4 class="text-2xl text-teal-50 font-medium">Exam Results</h4>
                    </div>
                    
                    <div data-accordion="collapse" data-active-classes="bg-teal-100 text-blue-600">
                        @foreach($classes as $class)
                            <h2>
                                <button type="button" class="flex items-center justify-between w-full p-3 bg-teal-50 hover:bg-teal-100 transition-all duration-300 gap-3" data-accordion-target="#{{ $class->slug}}" aria-expanded="false">
                                    <span class="text-sm">{{ $class->name}}</span>
                                </button>
                            </h2>
                            <div id="{{ $class->slug}}" class="hidden">
                                <div class="bg-gray-50">
                                    <a href="{{ route('student.addResults',[$student->id,$class->id]) }}" class="flex justify-center items-center hover:bg-teal-100 transition-all duration-300 gap-3 py-3"><i class="fi fi-rr-multiple"></i><span class="text-sm">Add Results</span></a>
                                </div>
                            </div>
                            
                        @endforeach
                    </div>
  
                    <!-- <table class="w-full text-sm text-left text-gray-500 overflow-hidden">
                        <thead class="text-xs text-gray-700 uppercase bg-teal-50">
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
                            <tr class="bg-teal-50">
                                <th class="px-6 py-4 font-normal text-gray-700 whitespace-nowrap">
                                    {{ $class->name }}
                                </th>
                                <th class="px-6 py-4 font-normal text-gray-700 whitespace-nowrap">
                                    {{ Carbon::parse($class->startdate)->format("d-M-Y") }}
                                </th>
                                <th class="px-6 py-4 font-normal text-gray-700 whitespace-nowrap">
                                    {{ Carbon::parse($class->enddate)->format("d-M-Y") }}
                                </th>
                                <th class="px-6 py-4 font-normal text-gray-700 whitespace-nowrap">
                                    <a href="#" data-delete-id="{{ $class->id }}"
                                        data-modal-target="confirm-removeclass-modal"
                                        data-modal-toggle="confirm-removeclass-modal"
                                        class="text-sm text-red-500 remove-btn">Remove</a>
                                </th>
                            </tr>
                            
                            @endforeach
                        </tbody>
                    </table> -->
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
                    class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
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
                    <h3 class="mb-5 text-lg font-normal text-gray-500">Are you sure you want to delete this student? All
                        data and related class will be delete!</h3>

                    <form id="delete-form" action="{{ route('students.index') }}/" method="POST" class="hidden">@csrf
                        @method('DELETE')</form>

                    <button data-modal-hide="confirm-delete-modal" type="submit" form="delete-form" class="btn-red">
                        Yes, I'm sure
                    </button>
                    <button data-modal-hide="confirm-delete-modal" type="button" class="btn-outline-gray">No,
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
                    class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                    data-modal-hide="add-class-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-4 md:p-5 text-center space-y-4">
                    <h3 class="mb-5 text-lg font-normal text-gray-500">Add Class</h3>
                    <form action="{{ route('student.addAcademicClass',$student->id) }}" method="post">
                        @csrf
                        <select id="small" name="academicclass"
                            class="block w-full p-2 mb-6 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-2 focus:ring-gray-300 focus:ring-offset-1">
                            <option selected disabled>Choose a class</option>
                            @foreach($allClasses as $class)
                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                            @endforeach
                        </select>
                        <div class="flex justify-end gap-4">
                            <button data-modal-hide="add-class-modal" type="button"
                                class="btn-outline-gray">Cancel</button>
                            <button data-modal-hide="add-class-modal" type="submit" class="btn-gray">
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
                    class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
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
                    <h3 class="mb-5 text-lg font-normal text-gray-500">Are you sure you want to remove this class?</h3>

                    <form id="remove-form" action="/students/removeacademicclass/{{ $student->id }}/" method="POST"
                        class="hidden">@csrf @method('DELETE')</form>

                    <button data-modal-hide="confirm-removeclass-modal" type="submit" form="remove-form"
                        class="btn-red">
                        Yes, I'm sure
                    </button>
                    <button data-modal-hide="confirm-removeclass-modal" type="button" class="btn-outline-gray">No,
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