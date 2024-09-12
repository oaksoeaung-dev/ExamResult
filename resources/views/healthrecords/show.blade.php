@php
    use Carbon\Carbon;
@endphp

<x-app-layout>
    <div class="container mx-auto py-10 text-zinc-700">
        <div class="my-5 flex justify-end gap-5">
            <a href="{{ route("healthrecords.viewqr", $record->id) }}" class="btn-zinc">View QR</a>
            <a href="{{ route("healthrecords.edit", $record->id) }}" class="btn-zinc">Edit</a>
        </div>
        <div class="grid gap-3 md:grid-cols-6 md:grid-rows-12">
            {{-- Start Personal Information --}}
            <div class="w-full rounded-lg bg-gray-50 p-5 md:col-span-3 md:col-start-1 md:row-span-4 md:row-start-1">
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
            <div class="w-full rounded-lg bg-gray-50 p-5 md:col-span-3 md:col-start-4 md:row-span-4 md:row-start-1">
                <div class="grid gap-4">
                    <div>
                        <img src="{{ asset("images/icons/contract.png") }}" alt="history-taking" class="w-24" />
                    </div>

                    <h1 class="text-lg font-bold">History Taking</h1>

                    <div class="space-y-1">
                        <h1 class="text-sm font-bold">Past Medical Hisory</h1>
                        <p class="text-xs">{{ $record->historytaking->past_medical_history }}</p>
                    </div>

                    <div class="space-y-1">
                        <h1 class="text-sm font-bold">Family Hisory</h1>
                        <p class="text-xs">{{ $record->historytaking->family_history }}</p>
                    </div>

                    <div class="space-y-1">
                        <h1 class="text-sm font-bold">Past Surgical Hisory</h1>
                        <p class="text-xs">{{ $record->historytaking->past_surgical_history }}</p>
                    </div>

                    <div class="space-y-1">
                        <h1 class="text-sm font-bold">Current Medication</h1>
                        <p class="text-xs">{{ $record->historytaking->current_medication }}</p>
                    </div>

                    <div class="space-y-1">
                        <h1 class="text-sm font-bold">History of present illness</h1>
                        <p class="text-xs">{{ $record->historytaking->history_of_present_illness }}</p>
                    </div>
                </div>
            </div>
            {{-- End History Taking --}}

            {{-- Start Body & Nutritional status --}}
            <div class="rounded-lg bg-gray-50 p-5 md:col-span-2 md:col-start-1 md:row-span-3 md:row-start-5">
                <div class="grid gap-4">
                    <div class="flex-none">
                        <img src="{{ asset("images/icons/humanoid.png") }}" alt="Body & Nutritional status" class="w-16" />
                    </div>

                    <h1 class="text-lg font-bold">Body & Nutritional status</h1>

                    <div class="space-y-1">
                        <h1 class="text-sm font-bold">Weight</h1>
                        <p class="text-xs">{{ $record->bodystatus->weight }}</p>
                    </div>

                    <div class="space-y-1">
                        <h1 class="text-sm font-bold">Height</h1>
                        <p class="text-xs">{{ $record->bodystatus->height }}</p>
                    </div>

                    <div class="space-y-1">
                        <h1 class="text-sm font-bold">BMI</h1>
                        <p class="text-xs">{{ $record->bodystatus->bmi }}</p>
                    </div>

                    <div class="space-y-1">
                        <h1 class="text-sm font-bold">Remark</h1>
                        <p class="text-xs">{{ $record->bodystatus->remark }}</p>
                    </div>
                </div>
            </div>
            {{-- End Body & Nutritional status --}}

            {{-- Start Heart --}}
            <div class="rounded-lg bg-gray-50 p-5 md:col-span-2 md:col-start-3 md:row-span-1 md:row-start-5">
                <div class="flex gap-4">
                    <div class="flex-none">
                        <img src="{{ asset("images/icons/heart.png") }}" alt="Heart" class="w-16" />
                    </div>

                    <div class="">
                        <h1 class="text-lg font-bold">Heart</h1>
                        <p class="text-xs">{{ $record->heart->data }}</p>
                    </div>
                </div>
            </div>
            {{-- End Heart --}}

            {{-- Start Lungs --}}
            <div class="rounded-lg bg-gray-50 p-5 md:col-span-2 md:col-start-3 md:row-span-1 md:row-start-6">
                <div class="flex gap-4">
                    <div class="flex-none">
                        <img src="{{ asset("images/icons/lungs.png") }}" alt="Lungs" class="w-16" />
                    </div>

                    <div class="">
                        <h1 class="text-lg font-bold">Lungs</h1>
                        <p class="text-xs">{{ $record->lungs->data }}</p>
                    </div>
                </div>
            </div>
            {{-- End Lungs --}}

            {{-- Start Abdomen --}}
            <div class="rounded-lg bg-gray-50 p-5 md:col-span-2 md:col-start-3 md:row-span-1 md:row-start-7">
                <div class="flex gap-4">
                    <div class="flex-none">
                        <img src="{{ asset("images/icons/stomach.png") }}" alt="Abdomen" class="w-16" />
                    </div>

                    <div class="">
                        <h1 class="text-lg font-bold">Abdomen</h1>
                        <p class="text-xs">{{ $record->abdomen->data }}</p>
                    </div>
                </div>
            </div>
            {{-- End Abdomen --}}

            {{-- Start Mouth --}}
            <div class="rounded-lg bg-gray-50 p-5 md:col-span-2 md:col-start-5 md:row-span-3 md:row-start-5">
                <div class="grid gap-4">
                    <div class="flex-none">
                        <img src="{{ asset("images/icons/mouth.png") }}" alt="Mouth" class="w-16" />
                    </div>

                    <h1 class="text-lg font-bold">Mouth</h1>

                    <div class="space-y-1">
                        <h1 class="text-sm font-bold">Fissures</h1>
                        <p class="text-xs">{{ $record->mouth->fissures }}</p>
                    </div>

                    <div class="space-y-1">
                        <h1 class="text-sm font-bold">Tongue</h1>
                        <p class="text-xs">{{ $record->mouth->tongue }}</p>
                    </div>

                    <div class="space-y-1">
                        <h1 class="text-sm font-bold">Teeth & Gum</h1>
                        <p class="text-xs">{{ $record->mouth->teeth_and_gum }}</p>
                    </div>

                    <div class="space-y-1">
                        <h1 class="text-sm font-bold">Remark</h1>
                        <p class="text-xs">{{ $record->mouth->remark }}</p>
                    </div>
                </div>
            </div>
            {{-- End Mouth --}}

            {{-- Start Eye --}}
            <div class="rounded-lg bg-gray-50 p-5 md:col-span-2 md:col-start-1 md:row-span-2 md:row-start-8">
                <div class="grid gap-4">
                    <div class="">
                        <img src="{{ asset("images/icons/eye.png") }}" alt="Eye" class="w-16" />
                    </div>

                    <h1 class="text-lg font-bold">Eye</h1>

                    <div class="space-y-1">
                        <h1 class="text-sm font-bold">Anaemia</h1>
                        <p class="text-xs">{{ $record->eye->anaemia }}</p>
                    </div>

                    <div class="space-y-1">
                        <h1 class="text-sm font-bold">Jaundice</h1>
                        <p class="text-xs">{{ $record->eye->jaundice }}</p>
                    </div>
                </div>
            </div>
            {{-- End Eye --}}

            {{-- Start Ear --}}
            <div class="rounded-lg bg-gray-50 p-5 md:col-span-2 md:col-start-3 md:row-span-2 md:row-start-8">
                <div class="grid gap-4">
                    <div class="">
                        <img src="{{ asset("images/icons/ear.png") }}" alt="Ear" class="w-16" />
                    </div>

                    <h1 class="text-lg font-bold">Ear</h1>

                    <div class="space-y-1">
                        <h1 class="text-sm font-bold">Position</h1>
                        <p class="text-xs">{{ $record->ear->position }}</p>
                    </div>

                    <div class="space-y-1">
                        <h1 class="text-sm font-bold">Discharge</h1>
                        <p class="text-xs">{{ $record->ear->discharge }}</p>
                    </div>
                </div>
            </div>
            {{-- End Ear --}}

            {{-- Start Neck --}}
            <div class="rounded-lg bg-gray-50 p-5 md:col-span-2 md:col-start-5 md:row-span-2 md:row-start-8">
                <div class="grid gap-4">
                    <div class="">
                        <img src="{{ asset("images/icons/neck.png") }}" alt="Neck" class="w-16" />
                    </div>

                    <h1 class="text-lg font-bold">Neck</h1>

                    <div class="space-y-1">
                        <h1 class="text-sm font-bold">Thyroid</h1>
                        <p class="text-xs">{{ $record->neck->thyroid }}</p>
                    </div>

                    <div class="space-y-1">
                        <h1 class="text-sm font-bold">Lymph node</h1>
                        <p class="text-xs">{{ $record->neck->lymph_node }}</p>
                    </div>
                </div>
            </div>
            {{-- End Neck --}}

            {{-- Start Musuloskeletal --}}
            <div class="rounded-lg bg-gray-50 p-5 md:col-span-2 md:col-start-1 md:row-span-3 md:row-start-10">
                <div class="grid gap-4">
                    <div class="">
                        <img src="{{ asset("images/icons/muscular.png") }}" alt="Musuloskeletal" class="w-16" />
                    </div>

                    <h1 class="text-lg font-bold">Musculoskeletal</h1>

                    <div class="space-y-1">
                        <h1 class="text-sm font-bold">Back</h1>
                        <p class="text-xs">{{ $record->musculoskeletal->back }}</p>
                    </div>

                    <div class="space-y-1">
                        <h1 class="text-sm font-bold">Joints</h1>
                        <p class="text-xs">{{ $record->musculoskeletal->joints }}</p>
                    </div>

                    <div class="space-y-1">
                        <h1 class="text-sm font-bold">Deformity</h1>
                        <p class="text-xs">{{ $record->musculoskeletal->deformity }}</p>
                    </div>
                </div>
            </div>
            {{-- End Musuloskeletal --}}

            {{-- Start Allergy --}}
            <div class="rounded-lg bg-gray-50 p-5 md:col-span-2 md:col-start-3 md:row-span-2 md:row-start-10">
                <div class="grid gap-4">
                    <div class="">
                        <img src="{{ asset("images/icons/allergies.png") }}" alt="Allergy" class="w-16" />
                    </div>

                    <h1 class="text-lg font-bold">Allergy</h1>

                    <div class="space-y-1">
                        <h1 class="text-sm font-bold">Drug</h1>
                        <p class="text-xs">{{ $record->allergy->drug }}</p>
                    </div>

                    <div class="space-y-1">
                        <h1 class="text-sm font-bold">Allergen</h1>
                        <p class="text-xs">{{ $record->allergy->allergen }}</p>
                    </div>
                </div>
            </div>
            {{-- End Allergy --}}

            {{-- Start Immunization --}}
            <div class="rounded-lg bg-gray-50 p-5 md:col-span-2 md:col-start-3 md:row-span-1 md:row-start-12">
                <div class="flex gap-4">
                    <div class="flex-none">
                        <img src="{{ asset("images/icons/immune-system.png") }}" alt="Immunization" class="w-16" />
                    </div>

                    <div class="">
                        <h1 class="text-lg font-bold">Immunization</h1>
                        <p class="text-xs">{{ $record->immunization->data }}</p>
                    </div>
                </div>
            </div>
            {{-- End Immunization --}}

            {{-- Start Personal Hygiene --}}
            <div class="rounded-lg bg-gray-50 p-5 md:col-span-2 md:col-start-5 md:row-span-1 md:row-start-10">
                <div class="flex gap-4">
                    <div class="flex-none">
                        <img src="{{ asset("images/icons/protection.png") }}" alt="Personal Hygiene" class="w-16" />
                    </div>

                    <div class="">
                        <h1 class="text-lg font-bold">Personal Hygiene</h1>
                        <p class="text-xs">{{ $record->hygiene->data }}</p>
                    </div>
                </div>
            </div>
            {{-- End Personal Hygiene --}}

            {{-- Start Sign --}}
            <div class="rounded-lg bg-gray-50 p-5 md:col-span-2 md:col-start-5 md:row-span-2 md:row-start-11">
                <div class="grid gap-4">
                    <div class="">
                        <img src="{{ asset("images/icons/doctor.png") }}" alt="Doctor" class="w-14" />
                    </div>

                    <div class="space-y-1">
                        <h1 class="text-sm font-bold">Name</h1>
                        <p class="text-sm">
                            {{ $record->doctorsign->sign == "doctor1" ? "Dr. Aung Pyae Phyo" : "Dr. Khun Nyo Thway" }}
                        </p>
                    </div>

                    <div class="space-y-3">
                        <h1 class="text-sm font-bold">Sign</h1>
                        <img src="{{ asset("storage/signs/" . $record->doctorsign->sign) . ".png" }}" alt="signature" class="w-14 object-contain" />
                    </div>
                </div>
            </div>
            {{-- End Sign --}}
        </div>
    </div>
</x-app-layout>
