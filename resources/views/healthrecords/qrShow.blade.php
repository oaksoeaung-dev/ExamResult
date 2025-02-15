@php
    use Carbon\Carbon;
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>{{ config("app.name", "Laravel") }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net" />
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(["resources/css/app.css", "resources/js/app.js"])
    </head>
    <body class="antialiased">
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
                                @foreach (explode(",",$record->historytaking->medical_conditions_currently_being_experienced) as $history)
                                    <li>{{ $history }}</li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="rounded-lg bg-white p-5">
                            <h1 class="text-sm font-bold">Health Issues In The Past</h1>
                            <ul class="mt-1 list-inside list-disc space-y-1 text-xs">
                                @foreach (explode(",",$record->historytaking->health_issues_in_the_past) as $history)
                                    <li>{{ $history }}</li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="rounded-lg bg-white p-5">
                            <h1 class="text-sm font-bold">Allergies</h1>
                            <ul class="mt-1 list-inside list-disc space-y-1 text-xs">
                                @foreach (explode(",",$record->historytaking->allergies) as $history)
                                    <li>{{ $history }}</li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="rounded-lg bg-white p-5">
                            <h1 class="text-sm font-bold">Previous Vaccination</h1>
                            <ul class="mt-1 list-inside list-disc space-y-1 text-xs">
                                @foreach (explode(",",$record->historytaking->previous_vaccination) as $history)
                                    <li>{{ $history }}</li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="rounded-lg bg-white p-5">
                            <h1 class="text-sm font-bold">Current Medications / Medications Taken Routinely</h1>
                            <ul class="mt-1 list-inside list-disc space-y-1 text-xs">
                                @foreach (explode(",",$record->historytaking->current_medications) as $history)
                                    <li>{{ $history }}</li>
                                @endforeach
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
                            <p class="mt-1 text-xs">{{ $record->generalAppearance->skin }}</p>
                        </div>
                        <div class="rounded-lg bg-white p-5">
                            <h1 class="text-sm font-bold">Height</h1>
                            <p class="mt-1 text-xs">{{ $record->generalAppearance->height }}</p>
                        </div>
                        <div class="rounded-lg bg-white p-5">
                            <h1 class="text-sm font-bold">Pulse Rate</h1>
                            <p class="mt-1 text-xs">{{ $record->generalAppearance->pulse_rate }}</p>
                        </div>
                        <div class="rounded-lg bg-white p-5">
                            <h1 class="text-sm font-bold">Temperature</h1>
                            <p class="mt-1 text-xs">{{ $record->generalAppearance->temperature }}</p>
                        </div>
                        <div class="rounded-lg bg-white p-5">
                            <h1 class="text-sm font-bold">Weight</h1>
                            <p class="mt-1 text-xs">{{ $record->generalAppearance->weight }}</p>
                        </div>
                        <div class="rounded-lg bg-white p-5">
                            <h1 class="text-sm font-bold">Blood Pressure</h1>
                            <p class="mt-1 text-xs">{{ $record->generalAppearance->blood_pressure }}</p>
                        </div>
                        <div class="rounded-lg bg-white p-5">
                            <h1 class="text-sm font-bold">BMI</h1>
                            <p class="mt-1 text-xs">{{ $record->generalAppearance->bmi }}</p>
                        </div>
                        <div class="rounded-lg bg-white p-5">
                            <h1 class="text-sm font-bold">SPO2</h1>
                            <p class="mt-1 text-xs">{{ $record->generalAppearance->spo2 }}</p>
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
                            <h1 class="text-sm font-bold">Pupil</h1>
                            <p class="mt-1 text-xs">{{ $record->vision->pupil }}</p>
                        </div>
                        <div class="rounded-lg bg-white p-5">
                            <h1 class="text-sm font-bold">Right Visual Fields</h1>
                            <p class="mt-1 text-xs">{{ $record->vision->right_visual_fields }}</p>
                        </div>
                        <div class="rounded-lg bg-white p-5">
                            <h1 class="text-sm font-bold">Color Vision</h1>
                            <p class="mt-1 text-xs">{{ $record->vision->color_vision }}</p>
                        </div>
                        <div class="rounded-lg bg-white p-5">
                            <h1 class="text-sm font-bold">Left Visual Fields</h1>
                            <p class="mt-1 text-xs">{{ $record->vision->left_visual_fields }}</p>
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
                            <h1 class="text-sm font-bold">Right</h1>
                            <p class="mt-1 text-xs">{{ $record->hearing->right }}</p>
                        </div>
                        <div class="rounded-lg bg-white p-5">
                            <h1 class="text-sm font-bold">Left</h1>
                            <p class="mt-1 text-xs">{{ $record->hearing->left }}</p>
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
                            <h1 class="text-sm font-bold">Eyes And Pupils</h1>
                            <p class="mt-1 text-xs">{{ $record->physicalmentalhealthassessment->eyes_and_pupils }}</p>
                        </div>
                        <div class="rounded-lg bg-white p-5">
                            <h1 class="text-sm font-bold">Nose</h1>
                            <p class="mt-1 text-xs">{{ $record->physicalmentalhealthassessment->nose }}</p>
                        </div>
                        <div class="rounded-lg bg-white p-5">
                            <h1 class="text-sm font-bold">Throat</h1>
                            <p class="mt-1 text-xs">{{ $record->physicalmentalhealthassessment->throat }}</p>
                        </div>
                        <div class="rounded-lg bg-white p-5">
                            <h1 class="text-sm font-bold">Teeth And Mouth</h1>
                            <p class="mt-1 text-xs">{{ $record->physicalmentalhealthassessment->teeth_and_mouth }}</p>
                        </div>
                        <div class="rounded-lg bg-white p-5">
                            <h1 class="text-sm font-bold">Lungs And Chests</h1>
                            <p class="mt-1 text-xs">{{ $record->physicalmentalhealthassessment->lungs_and_chest }}</p>
                        </div>
                        <div class="rounded-lg bg-white p-5">
                            <h1 class="text-sm font-bold">Cardiovascular System</h1>
                            <p class="mt-1 text-xs">{{ $record->physicalmentalhealthassessment->cardiovascular_system }}</p>
                        </div>
                        <div class="rounded-lg bg-white p-5">
                            <h1 class="text-sm font-bold">Abdomen</h1>
                            <p class="mt-1 text-xs">{{ $record->physicalmentalhealthassessment->abdomen }}</p>
                        </div>
                        <div class="rounded-lg bg-white p-5">
                            <h1 class="text-sm font-bold">Extremities And Back</h1>
                            <p class="mt-1 text-xs">{{ $record->physicalmentalhealthassessment->extremities_and_back }}</p>
                        </div>
                        <div class="rounded-lg bg-white p-5">
                            <h1 class="text-sm font-bold">Musculoskeletal</h1>
                            <p class="mt-1 text-xs">{{ $record->physicalmentalhealthassessment->musculoskeletal }}</p>
                        </div>
                        <div class="rounded-lg bg-white p-5">
                            <h1 class="text-sm font-bold">Mental Health Status</h1>
                            <p class="mt-1 text-xs">{{ $record->physicalmentalhealthassessment->mental_health_status }}</p>
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
                                <span class="badge-sky">{{ $record->doctorinformation->fit_in_all_area }}</span>
                            </div>
                            <div class="mt-5 flex items-center gap-5 text-xs">
                                <p>Futher assessment is required</p>
                                <span class="badge-sky">{{ $record->doctorinformation->futher_assessment }}</span>
                            </div>
                            <div class="mt-5 flex items-center gap-5 text-xs">
                                <p>Comment :</p>
                                <span>{{ $record->doctorinformation->comment }}</span>
                            </div>
                        </div>

                        <div class="space-y-5 rounded-lg bg-white p-5">
                            <h1 class="text-sm font-bold">Details of Examing Doctor</h1>
                            <div class="mt-1 gap-5">
                                <p class="text-sm font-bold">Name</p>
                                <p class="text-xs">{{ $record->doctorinformation->name }}</p>
                            </div>
                            <div class="mt-1 gap-5 text-xs">
                                <p class="text-sm font-bold">Sign</p>
                                <img src="{{ asset('storage/signs/'.$record->doctorinformation->doctor_sign.'.png') }}" class="size-14 object-contain" />
                            </div>
                        </div>
                    </div>
                </div>
                {{-- End Examining Doctor's Information --}}
            </div>
        </div>
    </body>
</html>
