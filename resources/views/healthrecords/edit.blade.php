<x-app-layout>
    <div>
        <div>
            <h1 class="">Edit a record</h1>
        </div>

        <form method="post" action="{{ route("healthrecords.update", $record->id) }}">
            @csrf
            @method("PUT")
            <div class="mt-10 grid h-full grid-cols-1 gap-5">
                <div class="h-fit rounded-lg bg-zinc-50 p-5 shadow-lg">
                    <h3 class="mb-5 text-2xl">Student Information</h3>
                    <div class="mt-5">
                        <x-text-input2 name="stdid" disabled :value="old('stdid',$record->stdId)">Student ID</x-text-input2>
                        @if (! empty(session("errors")))
                            <p class="mt-1 text-xs font-semibold text-red-500">
                                {{ session("errors")->first("student") }}
                            </p>
                        @endif
                    </div>
                </div>
                <div class="h-fit rounded-lg bg-zinc-50 p-5 shadow-lg">
                    <h3 class="mb-5 text-2xl">History Taking</h3>
                    <div class="mt-5 space-y-5">
                        <x-text-input2 name="medical_conditions_currently_being_experienced" :value="old('medical_conditions_currently_being_experienced',$record->historytaking->medical_conditions_currently_being_experienced)">Medical Conditions Currently Being Experienced</x-text-input2>
                        <x-text-input2 name="health_issues_in_the_past" :value="old('health_issues_in_the_past',$record->historytaking->health_issues_in_the_past)">Health Issues In The Past</x-text-input2>
                        <x-text-input2 name="allergies" :value="old('allergies',$record->historytaking->allergies)">Allergies</x-text-input2>
                        <x-text-input2 name="previous_vaccination" :value="old('previous_vaccination',$record->historytaking->previous_vaccination)">Previous Vaccination</x-text-input2>
                        <x-text-input2 name="current_medications" :value="old('current_medications',$record->historytaking->current_medications)">Current Medications / Medications Taken Routinely</x-text-input2>
                    </div>
                </div>

                <div class="h-fit rounded-lg bg-zinc-50 p-5 shadow-lg">
                    <h3 class="mb-5 text-2xl">General Appearance</h3>
                    <div class="mt-5 space-y-5">
                        <x-text-input2 name="skin" :value="old('skin',$record->generalAppearance->skin)">Skin</x-text-input2>
                        <x-text-input2 name="height" :value="old('height',$record->generalAppearance->height)">Height</x-text-input2>
                        <x-text-input2 name="pulse_rate" :value="old('pulse_rate',$record->generalAppearance->pulse_rate)">Pulse Rate</x-text-input2>
                        <x-text-input2 name="temperature" :value="old('temperature',$record->generalAppearance->temperature)">Temperature</x-text-input2>
                        <x-text-input2 name="weight" :value="old('weight',$record->generalAppearance->weight)">Weight</x-text-input2>
                        <x-text-input2 name="blood_pressure" :value="old('blood_pressure',$record->generalAppearance->blood_pressure)">Height</x-text-input2>
                        <x-text-input2 name="bmi" :value="old('bmi',$record->generalAppearance->bmi)">BMI</x-text-input2>
                        <x-text-input2 name="spo2" :value="old('spo2',$record->generalAppearance->spo2)">SPO2</x-text-input2>
                    </div>
                </div>

                <div class="h-fit rounded-lg bg-zinc-50 p-5 shadow-lg">
                    <h3 class="mb-5 text-2xl">Vision</h3>
                    <div class="mt-5 space-y-5">
                        <x-text-input2 name="pupil" :value="old('pupil',$record->vision->pupil)">Pupil</x-text-input2>
                        <x-text-input2 name="right_visual_fields" :value="old('right_visual_fields',$record->vision->right_visual_fields)">Right Visual Fields</x-text-input2>
                        <x-text-input2 name="color_vision" :value="old('color_vision',$record->vision->color_vision)">Color Vision</x-text-input2>
                        <x-text-input2 name="left_visual_fields" :value="old('left_visual_fields',$record->vision->left_visual_fields )">Left Visual Fields</x-text-input2>
                    </div>
                </div>

                <div class="h-fit rounded-lg bg-zinc-50 p-5 shadow-lg">
                    <h3 class="mb-5 text-2xl">Hearing</h3>
                    <div class="mt-5 space-y-5">
                        <x-text-input2 name="right" :value="old('right',$record->hearing->right)">Right</x-text-input2>
                        <x-text-input2 name="left" :value="old('left',$record->hearing->left)">Left</x-text-input2>
                    </div>
                </div>

                <div class="h-fit rounded-lg bg-zinc-50 p-5 shadow-lg">
                    <h3 class="mb-5 text-2xl">Physical & Mental Health Assessment</h3>
                    <div class="mt-5 space-y-5">
                        <x-text-input2 name="eyes_and_pupils" :value="old('eyes_and_pupils',$record->physicalmentalhealthassessment->eyes_and_pupils)">Eyes and Pupils</x-text-input2>
                        <x-text-input2 name="nose" :value="old('nose',$record->physicalmentalhealthassessment->nose)">Nose</x-text-input2>
                        <x-text-input2 name="throat" :value="old('throat',$record->physicalmentalhealthassessment->throat)">Throat</x-text-input2>
                        <x-text-input2 name="teeth_and_mouth" :value="old('teeth_and_mouth',$record->physicalmentalhealthassessment->teeth_and_mouth)">Teeth and Mouth</x-text-input2>
                        <x-text-input2 name="lungs_and_chest" :value="old('lungs_and_chest',$record->physicalmentalhealthassessment->lungs_and_chest)">Lungs and Chest</x-text-input2>
                        <x-text-input2 name="cardiovascular_system" :value="old('cardiovascular_system',$record->physicalmentalhealthassessment->cardiovascular_system)">Cardiovascular System</x-text-input2>
                        <x-text-input2 name="abdomen" :value="old('abdomen',$record->physicalmentalhealthassessment->abdomen)">Abdomen</x-text-input2>
                        <x-text-input2 name="extremities_and_back" :value="old('extremities_and_back',$record->physicalmentalhealthassessment->extremities_and_back)">Extremities and Back</x-text-input2>
                        <x-text-input2 name="musculoskeletal" :value="old('musculoskeletal',$record->physicalmentalhealthassessment->musculoskeletal)">Musculoskeletal</x-text-input2>
                        <x-text-input2 name="mental_health_status" :value="old('mental_health_status',$record->physicalmentalhealthassessment->mental_health_status)">Mental Health Status</x-text-input2>
                    </div>
                </div>

                <div class="h-fit rounded-lg bg-zinc-50 p-5 shadow-lg space-y-5">
                    <h3 class="mb-5 text-2xl">Comments By Examining Doctor</h3>
                    <div>
                        <p class="mb-3 text-sm font-medium">Fit In All Area</p>
                        <div class="flex items-center gap-5">
                            <div class="flex items-center gap-2">
                                <input id="fit-yes" type="radio" value="yes" {{ $record->doctorinformation->fit_in_all_area == "yes" ? "checked" : "" }} name="fitArea" class="h-4 w-4 border-zinc-300 bg-zinc-100 text-blue-600 focus:ring-blue-500" />
                                <label for="fit-yes" class="text-sm font-medium text-zinc-900">Yes</label>
                            </div>
                            <div class="flex items-center gap-2">
                                <input id="fit-no" type="radio" value="no" {{ $record->doctorinformation->fit_in_all_area == "no" ? "checked" : "" }} name="fitArea" class="h-4 w-4 border-zinc-300 bg-zinc-100 text-blue-600 focus:ring-blue-500" />
                                <label for="fit-no" class="text-sm font-medium text-zinc-900">No</label>
                            </div>
                        </div>
                        @error("fitArea")
                            <p class="mt-2 text-sm text-red-600">{{ $errors->first("fitArea") }}</p>
                        @enderror
                    </div>

                    <div>
                        <p class="mb-3 text-sm font-medium">Futher assessment is required</p>
                        <div class="flex items-center gap-5">
                            <div class="flex items-center gap-2">
                                <input id="futherAssessment-yes" type="radio" value="yes" {{ $record->doctorinformation->futher_assessment == "yes" ? "checked" : "" }} name="futherAssessment" class="h-4 w-4 border-zinc-300 bg-zinc-100 text-blue-600 focus:ring-blue-500" />
                                <label for="futherAssessment-yes" class="text-sm font-medium text-zinc-900">Yes</label>
                            </div>
                            <div class="flex items-center gap-2">
                                <input id="futherAssessment-no" type="radio" value="no" {{ $record->doctorinformation->futher_assessment == "no" ? "checked" : "" }} name="futherAssessment" class="h-4 w-4 border-zinc-300 bg-zinc-100 text-blue-600 focus:ring-blue-500" />
                                <label for="futherAssessment-no" class="text-sm font-medium text-zinc-900">No</label>
                            </div>
                        </div>
                        @error("futherAssessment")
                            <p class="mt-2 text-sm text-red-600">{{ $errors->first("futherAssessment") }}</p>
                        @enderror
                    </div>

                    <x-text-input2 name="comment" :value="old('comment',$record->doctorinformation->comment)">Comment</x-text-input2>
                </div>

                <div class="h-fit rounded-lg bg-zinc-50 p-5">
                    <h3 class="mb-5 text-2xl">Examining Doctor's Information</h3>
                    <div class="mt-5">
                        <div class="">
                            <label for="sign" class="mb-2 block text-sm font-medium text-gray-900">Select doctor's sign</label>
                            <select id="sign" name="sign" class="block w-full rounded-lg border border-gray-300 bg-zinc-50 p-2.5 text-sm text-gray-900 focus:border-zinc-500 focus:outline-none focus:ring-zinc-500">
                                <option selected disabled>Choose doctor's sign</option>
                                @foreach ($doctorsigns as $doctorsign)
                                    <option value="{{ $doctorsign->slug }}" {{ old("sign",$record->doctorinformation->doctor_sign) == $doctorsign->slug ? "selected" : "" }}>
                                        {{ $doctorsign->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error("sign")
                                <p class="mt-1 text-xs font-semibold text-red-500">{{ $errors->first("sign") }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-5 flex justify-end gap-10">
                <a href="{{ route("healthrecords.index") }}" class="btn-outline-zinc w-1/5">Cancel</a>
                <button type="submit" class="btn-zinc w-1/5">Update</button>
            </div>
        </form>
    </div>
</x-app-layout>
