@php use Carbon\Carbon; @endphp
    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased">
    <div class="container mx-auto py-10 text-zinc-700">
    <div class="grid md:grid-cols-6 md:grid-rows-12 gap-3">
        {{-- Start Personal Information --}}
        <div class="w-full p-5 bg-gray-50 rounded-lg md:col-start-1 md:col-span-3 md:row-start-1 md:row-span-4">
            <div class="grid gap-4 place-items-center">
                <img src="{{ !empty($record->image) ? asset('storage/studentphotos/'.$record->image) : asset('images/profiles/'. $record->gender.".png")  }}" class="w-36 h-36 overflow-hidden object-cover" alt="student image" />

                <h1 class="text-2xl font-bold">{{ $record->name }}</h1>

                <div class="w-full grid md:grid-cols-2 gap-5">

                    <div class="flex gap-4 bg-white px-4 py-3 rounded-lg">
                        <div class="w-12 h-12 rounded-full flex items-center justify-center bg-violet-100 text-violet-500 flex-none">
                            <i class="fi fi-rs-venus-mars"></i>
                        </div>
                        <div>
                            <p class="text-sm font-bold">Gender</p>
                            <p class="text-zinc-600 text-xs font-medium">{{ $record->gender }}</p>
                        </div>
                    </div>
                    <div class="flex gap-4 bg-white px-4 py-3 rounded-lg">
                        <div class="w-12 h-12 rounded-full flex items-center justify-center bg-teal-100 text-teal-500 flex-none">
                            <i class="fi fi-rs-cake-wedding"></i>
                        </div>
                        <div>
                            <p class="text-sm font-bold">Date Of Birth</p>
                            <p class="text-zinc-600 text-xs font-medium">{{ Carbon::parse($record->dob)->format("d-M-Y") }}</p>
                        </div>
                    </div>
                    <div class="flex gap-4 bg-white px-4 py-3 rounded-lg">
                        <div class="w-12 h-12 rounded-full flex items-center justify-center bg-rose-100 text-rose-500 flex-none">
                            <i class="fi fi-rs-envelopes"></i>
                        </div>
                        <div>
                            <p class="text-sm font-bold">Email</p>
                            <p class="text-zinc-600 text-xs font-medium">{{ $record->email }}</p>
                        </div>
                    </div>
                    <div class="flex gap-4 bg-white px-4 py-3 rounded-lg">
                        <div class="w-12 h-12 rounded-full flex items-center justify-center bg-yellow-100 text-yellow-500 flex-none">
                            <i class="fi fi-rs-mobile-button"></i>
                        </div>
                        <div>
                            <p class="text-sm font-bold">Phone</p>
                            <p class="text-zinc-600 text-xs font-medium">{{ $record->phone }}</p>
                        </div>
                    </div>
                    <div class="flex gap-4 bg-white px-4 py-3 rounded-lg">
                        <div class="w-12 h-12 rounded-full flex items-center justify-center bg-lime-100 text-lime-500 flex-none">
                            <i class="fi fi-rs-route"></i>
                        </div>
                        <div>
                            <p class="text-sm font-bold">Address</p>
                            <p class="text-zinc-600 text-xs font-medium">{{ $record->address }}</p>
                        </div>
                    </div>
                    <div class="flex gap-4 bg-white px-4 py-3 rounded-lg">
                        <div class="w-12 h-12 rounded-full flex items-center justify-center bg-sky-100 text-cyan-500 flex-none">
                            <i class="fi fi-rs-users"></i>
                        </div>
                        <div>
                            <p class="text-sm font-bold">Guardian</p>
                            <p class="text-zinc-600 text-xs font-medium">{{ $record->guardian_name }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- End Personal Information --}}

        {{-- Start History Taking --}}
        <div class="w-full bg-gray-50 rounded-lg p-5 md:col-start-4 md:col-span-3 md:row-start-1 md:row-span-4">
            <div class="grid gap-4">
                <div>
                    <img src="{{ asset('images/icons/contract.png') }}" alt="history-taking" class="w-24" />
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
        <div class="bg-gray-50 rounded-lg p-5 md:col-start-1 md:col-span-2 md:row-start-5 md:row-span-3">
            <div class="grid gap-4">
                <div class="flex-none">
                    <img src="{{ asset('images/icons/humanoid.png') }}" alt="Body & Nutritional status" class="w-16" />
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
        <div class="bg-gray-50 rounded-lg p-5 md:col-start-3 md:col-span-2 md:row-start-5 md:row-span-1">
            <div class="flex gap-4">
                <div class="flex-none">
                    <img src="{{ asset('images/icons/heart.png') }}" alt="Heart" class="w-16" />
                </div>

                <div class="">
                    <h1 class="text-lg font-bold">Heart</h1>
                    <p class="text-xs">{{ $record->heart->data }}</p>
                </div>
            </div>
        </div>
        {{-- End Heart --}}

        {{-- Start Lungs --}}
        <div class="bg-gray-50 rounded-lg p-5 md:col-start-3 md:col-span-2 md:row-start-6 md:row-span-1">
            <div class="flex gap-4">
                <div class="flex-none">
                    <img src="{{ asset('images/icons/lungs.png') }}" alt="Lungs" class="w-16" />
                </div>

                <div class="">
                    <h1 class="text-lg font-bold">Lungs</h1>
                    <p class="text-xs">{{ $record->lungs->data }}</p>
                </div>
            </div>
        </div>
        {{-- End Lungs --}}

        {{-- Start Abdomen --}}
        <div class="bg-gray-50 rounded-lg p-5 md:col-start-3 md:col-span-2 md:row-start-7 md:row-span-1">
            <div class="flex gap-4">
                <div class="flex-none">
                    <img src="{{ asset('images/icons/stomach.png') }}" alt="Abdomen" class="w-16" />
                </div>

                <div class="">
                    <h1 class="text-lg font-bold">Abdomen</h1>
                    <p class="text-xs">{{ $record->abdomen->data }}</p>
                </div>
            </div>
        </div>
        {{-- End Abdomen --}}

        {{-- Start Mouth --}}
        <div class="bg-gray-50 rounded-lg p-5 md:col-start-5 md:col-span-2 md:row-start-5 md:row-span-3">
            <div class="grid gap-4">
                <div class="flex-none">
                    <img src="{{ asset('images/icons/mouth.png') }}" alt="Mouth" class="w-16" />
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
        <div class="bg-gray-50 rounded-lg p-5 md:col-start-1 md:col-span-2 md:row-start-8 md:row-span-2">
            <div class="grid gap-4">
                <div class="">
                    <img src="{{ asset('images/icons/eye.png') }}" alt="Eye" class="w-16" />
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
        <div class="bg-gray-50 rounded-lg p-5 md:col-start-3 md:col-span-2 md:row-start-8 md:row-span-2">
            <div class="grid gap-4">
                <div class="">
                    <img src="{{ asset('images/icons/ear.png') }}" alt="Ear" class="w-16" />
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
        <div class="bg-gray-50 rounded-lg p-5 md:col-start-5 md:col-span-2 md:row-start-8 md:row-span-2">
            <div class="grid gap-4">
                <div class="">
                    <img src="{{ asset('images/icons/neck.png') }}" alt="Neck" class="w-16" />
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
        <div class="bg-gray-50 rounded-lg p-5 md:col-start-1 md:col-span-2 md:row-start-10 md:row-span-3">
            <div class="grid gap-4">
                <div class="">
                    <img src="{{ asset('images/icons/muscular.png') }}" alt="Musuloskeletal" class="w-16" />
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
        <div class="bg-gray-50 rounded-lg p-5 md:col-start-3 md:col-span-2 md:row-start-10 md:row-span-2">
            <div class="grid gap-4">
                <div class="">
                    <img src="{{ asset('images/icons/allergies.png') }}" alt="Allergy" class="w-16" />
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
        <div class="bg-gray-50 rounded-lg p-5 md:col-start-3 md:col-span-2 md:row-start-12 md:row-span-1">
            <div class="flex gap-4">
                <div class="flex-none">
                    <img src="{{ asset('images/icons/immune-system.png') }}" alt="Immunization" class="w-16" />
                </div>

                <div class="">
                    <h1 class="text-lg font-bold">Immunization</h1>
                    <p class="text-xs">{{ $record->immunization->data }}</p>
                </div>
            </div>
        </div>
        {{-- End Immunization --}}

        {{-- Start Personal Hygiene --}}
        <div class="bg-gray-50 rounded-lg p-5 md:col-start-5 md:col-span-2 md:row-start-10 md:row-span-1">
            <div class="flex gap-4">
                <div class="flex-none">
                    <img src="{{ asset('images/icons/protection.png') }}" alt="Personal Hygiene" class="w-16" />
                </div>

                <div class="">
                    <h1 class="text-lg font-bold">Personal Hygiene</h1>
                    <p class="text-xs">{{ $record->hygiene->data }}</p>
                </div>
            </div>
        </div>
        {{-- End Personal Hygiene --}}

        {{-- Start Sign --}}
        <div class="bg-gray-50 rounded-lg p-5 md:col-start-5 md:col-span-2 md:row-start-11 md:row-span-2">
            <div class="grid gap-4">
                <div class="">
                    <img src="{{ asset('images/icons/doctor.png') }}" alt="Doctor" class="w-14" />
                </div>

                <div class="space-y-1">
                    <h1 class="text-sm font-bold">Name</h1>
                    <p class="text-sm">{{ $record->doctorsign->sign == "doctor1" ? "Dr. Aung Pyae Phyo" : "Dr. Khun Nyo Thway" }}</p>
                </div>

                <div class="space-y-3">
                    <h1 class="text-sm font-bold">Sign</h1>
                    <img src="{{ asset('storage/signs/'.$record->doctorsign->sign).'.png' }}" alt="signature" class="w-14 object-contain" />
                </div>
            </div>
        </div>
        {{-- End Sign --}}
    </div>
</div>
</body>
</html>



