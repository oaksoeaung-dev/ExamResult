<x-app-layout>
    <div class="space-y-10">
        <div>
            <h1 class="flex gap-2 items-center"><i class="fi fi-rr-gym"></i><span>Activities</span></h1>
        </div>

        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left text-zinc-500">
                <thead class="text-xs text-zinc-700 uppercase bg-zinc-100">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
                </thead>
                <tbody>
                    @foreach($activities as $activity)
                        <tr class="bg-white border-b">
                            <th class="px-6 py-4 font-normal text-zinc-700 whitespace-nowrap">
                                {{ $activity->name }}
                            </th>
                            <th class="px-6 py-4 font-normal text-zinc-700 whitespace-nowrap flex gap-4">
                                <a href="{{ route('activities.edit',$activity->id) }}" class="text-sky-500 hover:text-sky-700 transition-all duration-300">Edit</a>
                                <a href="#" data-delete-id="{{ $activity->id }}" data-modal-target="confirm-delete-modal" data-modal-toggle="confirm-delete-modal" class="delete-btn text-rose-500 hover:text-rose-700 transition-all duration-300">Delete</a>
                            </th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div id="confirm-delete-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow">
                <button type="button" class="absolute top-3 end-2.5 text-zinc-400 bg-transparent hover:bg-zinc-200 hover:text-zinc-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="confirm-delete-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-4 md:p-5 text-center space-y-4">
                    <img src="{{ asset('images/icons/bin.png') }}" class="h-24 w-auto mx-auto" alt="bin"/>
                    <h3 class="mb-5 text-lg font-normal text-zinc-500">Are you sure you want to delete this activity?</h3>

                    <form id="delete-form" action="{{ route('activities.index') }}/" method="POST" class="hidden">@csrf @method('DELETE')</form>

                    <button data-modal-hide="confirm-delete-modal" type="submit" form="delete-form" class="btn-red">
                        Yes, I'm sure
                    </button>
                    <button data-modal-hide="confirm-delete-modal" type="button" class="btn-outline-zinc">No, cancel</button>
                </div>
            </div>
        </div>
    </div>
    @section('scripts')
        <script type="text/javascript" src="{{ asset('js/deleteModal.js') }}"></script>
    @endsection
</x-app-layout>
