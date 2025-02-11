@php
    use Carbon\Carbon;
@endphp

<x-app-layout>
    <div class="container mx-auto py-10 text-zinc-700">
        <div class="my-5 flex justify-end gap-5">
            <a href="{{ route("healthrecords.viewqr", $record->id) }}" class="btn-zinc">View QR</a>
            <a href="{{ route("healthrecords.edit", $record->id) }}" class="btn-zinc">Edit</a>
        </div>
        <div class="rounded-lg bg-blue-50 p-10 shadow-xl">
            <div class="mx-auto max-w-4xl space-y-10">
                {{-- Start Personal Information --}}
                <div class="w-full rounded-xl bg-gray-50 p-5">
                    <div class="grid place-items-center gap-4">
                        <img src="{{ ! empty($record->image) ? asset("storage/studentphotos/" . $record->image) : asset("images/profiles/" . $record->gender . ".png") }}" class="h-36 w-36 overflow-hidden object-cover" alt="student image" />

                        <h1 class="text-center text-2xl font-bold">{{ $record->name }}</h1>

                        <div class="grid w-full gap-5 md:grid-cols-2">
                            <div class="flex gap-4 rounded-lg bg-white px-4 py-3">
                                <div class="flex h-12 w-12 flex-none items-center justify-center rounded-full bg-violet-100 text-violet-500">
                                    <i class="fi fi-rs-venus-mars"></i>
                                </div>
                                <div>
                                    <p class="text-sm font-bold">Gender</p>
                                    <p class="text-xs font-medium text-zinc-600">{{ ucfirst($record->gender) }}</p>
                                </div>
                            </div>
                            <div class="flex gap-4 rounded-lg bg-white px-4 py-3">
                                <div class="flex h-12 w-12 flex-none items-center justify-center rounded-full bg-teal-100 text-teal-500">
                                    <i class="fi fi-rs-cake-wedding"></i>
                                </div>
                                <div>
                                    <p class="text-sm font-bold">Date Of Birth</p>
                                    <p class="text-xs font-medium text-zinc-600">
                                        {{ Carbon::parse($record->dob)->format("d-M-Y") }}
                                    </p>
                                </div>
                            </div>
                            <div class="flex gap-4 rounded-lg bg-white px-4 py-3">
                                <div class="flex h-12 w-12 flex-none items-center justify-center rounded-full bg-rose-100 text-rose-500">
                                    <i class="fi fi-rs-envelopes"></i>
                                </div>
                                <div>
                                    <p class="text-sm font-bold">Email</p>
                                    <p class="text-xs font-medium text-zinc-600">{{ $record->email }}</p>
                                </div>
                            </div>
                            <div class="flex gap-4 rounded-lg bg-white px-4 py-3">
                                <div class="flex h-12 w-12 flex-none items-center justify-center rounded-full bg-yellow-100 text-yellow-500">
                                    <i class="fi fi-rs-mobile-button"></i>
                                </div>
                                <div>
                                    <p class="text-sm font-bold">Phone</p>
                                    <p class="text-xs font-medium text-zinc-600">{{ $record->phone }}</p>
                                </div>
                            </div>
                            <div class="flex gap-4 rounded-lg bg-white px-4 py-3">
                                <div class="flex h-12 w-12 flex-none items-center justify-center rounded-full bg-lime-100 text-lime-500">
                                    <i class="fi fi-rs-route"></i>
                                </div>
                                <div>
                                    <p class="text-sm font-bold">Address</p>
                                    <p class="text-xs font-medium text-zinc-600">{{ $record->address }}</p>
                                </div>
                            </div>
                            <div class="flex gap-4 rounded-lg bg-white px-4 py-3">
                                <div class="flex h-12 w-12 flex-none items-center justify-center rounded-full bg-sky-100 text-cyan-500">
                                    <i class="fi fi-rs-users"></i>
                                </div>
                                <div>
                                    <p class="text-sm font-bold">Guardian</p>
                                    <p class="text-xs font-medium text-zinc-600">{{ $record->guardian_name }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- End Personal Information --}}

                {{-- Start History Taking --}}
                <div class="w-full space-y-5 rounded-xl bg-gray-50 p-5">
                    <img src="{{ asset("images/icons/contract.png") }}" class="size-32 overflow-hidden object-cover" alt="student image" />
                    <h1 class="text-lg font-bold">History Taking</h1>

                    <div class="grid grid-cols-2 gap-5">
                        <div class="rounded-lg bg-white p-5">
                            <h1 class="text-sm font-bold">Medical Conditions Currently Being Experienced</h1>
                            <ul class="mt-1 list-inside list-disc space-y-1 text-xs">
                                <li>Condition 1</li>
                                <li>Condition 2</li>
                                <li>Condition 3</li>
                            </ul>
                        </div>

                        <div class="rounded-lg bg-white p-5">
                            <h1 class="text-sm font-bold">Health Issues In The Past</h1>
                            <ul class="mt-1 list-inside list-disc space-y-1 text-xs">
                                <li>Condition 1</li>
                                <li>Condition 2</li>
                                <li>Condition 3</li>
                            </ul>
                        </div>

                        <div class="rounded-lg bg-white p-5">
                            <h1 class="text-sm font-bold">Allergies</h1>
                            <ul class="mt-1 list-inside list-disc space-y-1 text-xs">
                                <li>Condition 1</li>
                                <li>Condition 2</li>
                                <li>Condition 3</li>
                            </ul>
                        </div>

                        <div class="rounded-lg bg-white p-5">
                            <h1 class="text-sm font-bold">Previous Vaccination</h1>
                            <ul class="mt-1 list-inside list-disc space-y-1 text-xs">
                                <li>Condition 1</li>
                                <li>Condition 2</li>
                                <li>Condition 3</li>
                            </ul>
                        </div>

                        <div class="rounded-lg bg-white p-5">
                            <h1 class="text-sm font-bold">Current Medications / Medications Taken Routinely</h1>
                            <ul class="mt-1 list-inside list-disc space-y-1 text-xs">
                                <li>Condition 1</li>
                                <li>Condition 2</li>
                                <li>Condition 3</li>
                            </ul>
                        </div>
                    </div>
                </div>
                {{-- End History Taking --}}

                {{-- Start General Apperance --}}
                <div class="w-full space-y-5 rounded-xl bg-gray-50 p-5">
                    <img src="{{ asset("images/icons/emoji.png") }}" class="size-32 overflow-hidden object-cover" alt="student image" />
                    <h1 class="text-lg font-bold">General Appearance</h1>
                    <div class="grid grid-cols-2 gap-5">
                        <div class="rounded-lg bg-white p-5">
                            <h1 class="text-sm font-bold">Skin</h1>
                            <p class="mt-1 text-xs">abc</p>
                        </div>
                        <div class="rounded-lg bg-white p-5">
                            <h1 class="text-sm font-bold">Skin</h1>
                            <p class="mt-1 text-xs">abc</p>
                        </div>
                        <div class="rounded-lg bg-white p-5">
                            <h1 class="text-sm font-bold">Skin</h1>
                            <p class="mt-1 text-xs">abc</p>
                        </div>
                        <div class="rounded-lg bg-white p-5">
                            <h1 class="text-sm font-bold">Skin</h1>
                            <p class="mt-1 text-xs">abc</p>
                        </div>
                        <div class="rounded-lg bg-white p-5">
                            <h1 class="text-sm font-bold">Skin</h1>
                            <p class="mt-1 text-xs">abc</p>
                        </div>
                        <div class="rounded-lg bg-white p-5">
                            <h1 class="text-sm font-bold">Skin</h1>
                            <p class="mt-1 text-xs">abc</p>
                        </div>
                        <div class="rounded-lg bg-white p-5">
                            <h1 class="text-sm font-bold">Skin</h1>
                            <p class="mt-1 text-xs">abc</p>
                        </div>
                        <div class="rounded-lg bg-white p-5">
                            <h1 class="text-sm font-bold">Skin</h1>
                            <p class="mt-1 text-xs">abc</p>
                        </div>
                    </div>
                </div>
                {{-- End General Apperance --}}

                {{-- Start Vision --}}
                <div class="w-full space-y-5 rounded-xl bg-gray-50 p-5">
                    <img src="{{ asset("images/icons/eye.png") }}" class="size-32 overflow-hidden object-cover" alt="student image" />
                    <h1 class="text-lg font-bold">Vision</h1>
                    <div class="grid grid-cols-2 gap-5">
                        <div class="rounded-lg bg-white p-5">
                            <h1 class="text-sm font-bold">Skin</h1>
                            <p class="mt-1 text-xs">abc</p>
                        </div>
                        <div class="rounded-lg bg-white p-5">
                            <h1 class="text-sm font-bold">Skin</h1>
                            <p class="mt-1 text-xs">abc</p>
                        </div>
                        <div class="rounded-lg bg-white p-5">
                            <h1 class="text-sm font-bold">Skin</h1>
                            <p class="mt-1 text-xs">abc</p>
                        </div>
                        <div class="rounded-lg bg-white p-5">
                            <h1 class="text-sm font-bold">Skin</h1>
                            <p class="mt-1 text-xs">abc</p>
                        </div>
                    </div>
                </div>
                {{-- End Vision --}}

                {{-- Start Hearing --}}
                <div class="w-full space-y-5 rounded-xl bg-gray-50 p-5">
                    <img src="{{ asset("images/icons/ear.png") }}" class="size-32 overflow-hidden object-cover" alt="student image" />
                    <h1 class="text-lg font-bold">Hearing</h1>
                    <div class="grid grid-cols-2 gap-5">
                        <div class="rounded-lg bg-white p-5">
                            <h1 class="text-sm font-bold">Skin</h1>
                            <p class="mt-1 text-xs">abc</p>
                        </div>
                        <div class="rounded-lg bg-white p-5">
                            <h1 class="text-sm font-bold">Skin</h1>
                            <p class="mt-1 text-xs">abc</p>
                        </div>
                    </div>
                </div>
                {{-- End Hearing --}}

                {{-- Start Physical & Mental Health Assessment --}}
                <div class="w-full space-y-5 rounded-xl bg-gray-50 p-5">
                    <img src="{{ asset("images/icons/humanoid.png") }}" class="size-32 overflow-hidden object-cover" alt="student image" />
                    <h1 class="text-lg font-bold">Physical & Mental Health Assessment</h1>
                    <div class="grid grid-cols-2 gap-5">
                        <div class="rounded-lg bg-white p-5">
                            <h1 class="text-sm font-bold">Skin</h1>
                            <p class="mt-1 text-xs">abc</p>
                        </div>
                        <div class="rounded-lg bg-white p-5">
                            <h1 class="text-sm font-bold">Skin</h1>
                            <p class="mt-1 text-xs">abc</p>
                        </div>
                        <div class="rounded-lg bg-white p-5">
                            <h1 class="text-sm font-bold">Skin</h1>
                            <p class="mt-1 text-xs">abc</p>
                        </div>
                        <div class="rounded-lg bg-white p-5">
                            <h1 class="text-sm font-bold">Skin</h1>
                            <p class="mt-1 text-xs">abc</p>
                        </div>
                        <div class="rounded-lg bg-white p-5">
                            <h1 class="text-sm font-bold">Skin</h1>
                            <p class="mt-1 text-xs">abc</p>
                        </div>
                        <div class="rounded-lg bg-white p-5">
                            <h1 class="text-sm font-bold">Skin</h1>
                            <p class="mt-1 text-xs">abc</p>
                        </div>
                        <div class="rounded-lg bg-white p-5">
                            <h1 class="text-sm font-bold">Skin</h1>
                            <p class="mt-1 text-xs">abc</p>
                        </div>
                        <div class="rounded-lg bg-white p-5">
                            <h1 class="text-sm font-bold">Skin</h1>
                            <p class="mt-1 text-xs">abc</p>
                        </div>
                        <div class="rounded-lg bg-white p-5">
                            <h1 class="text-sm font-bold">Skin</h1>
                            <p class="mt-1 text-xs">abc</p>
                        </div>
                        <div class="rounded-lg bg-white p-5">
                            <h1 class="text-sm font-bold">Skin</h1>
                            <p class="mt-1 text-xs">abc</p>
                        </div>
                    </div>
                </div>
                {{-- End Physical & Mental Health Assessment --}}

                {{-- Start Examining Doctor's Information --}}
                <div class="w-full space-y-5 rounded-xl bg-gray-50 p-5">
                    <img src="{{ asset("images/icons/doctor.png") }}" class="size-32 overflow-hidden object-cover" alt="student image" />
                    <h1 class="text-lg font-bold">Examining Doctor's Information</h1>
                    <div class="grid grid-cols-2 gap-5">
                        <div class="rounded-lg bg-white p-5">
                            <h1 class="text-sm font-bold">Comments By Examining Doctor</h1>
                            <div class="mt-1 flex items-center gap-5 text-xs">
                                <p>Fit in all area :</p>
                                <span class="badge-sky">Yes</span>
                            </div>
                            <div class="mt-5 flex items-center gap-5 text-xs">
                                <p>Futher assessment is required</p>
                                <span class="badge-sky">Yes</span>
                            </div>
                            <div class="mt-5 flex items-center gap-5 text-xs">
                                <p>Comment :</p>
                                <span>She goes home</span>
                            </div>
                        </div>

                        <div class="space-y-5 rounded-lg bg-white p-5">
                            <h1 class="text-sm font-bold">Details of Examing Doctor</h1>
                            <div class="mt-1 gap-5">
                                <p class="text-sm font-bold">Name</p>
                                <p class="text-xs">Kyaw Kyaw</p>
                            </div>
                            <div class="mt-1 gap-5 text-xs">
                                <p class="text-sm font-bold">Sign</p>
                                <img src="{{ asset("images/icons/lungs.png") }}" class="size-14 object-contain" />
                            </div>
                        </div>
                    </div>
                </div>
                {{-- End Examining Doctor's Information --}}
            </div>
        </div>
    </div>
</x-app-layout>
