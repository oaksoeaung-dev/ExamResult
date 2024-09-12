<x-app-layout>
    <div>
        <div>
            <h1 class="">Add a new record</h1>
        </div>

        <form method="post" action="{{ route("healthrecords.store") }}">
            @csrf
            <div class="mt-10 grid h-full grid-cols-3 gap-5">
                <div class="space-y-5">
                    <div class="h-fit rounded-lg bg-zinc-50 p-5 shadow-lg">
                        <h3 class="text-2xl">Student Information</h3>
                        <div class="mt-5">
                            <x-text-input2 name="stdid" :value="old('stdid')">Student ID</x-text-input2>
                            @if (! empty(session("errors")))
                                <p class="mt-1 text-xs font-semibold text-red-500">
                                    {{ session("errors")->first("student") }}
                                </p>
                            @endif
                        </div>
                    </div>
                    <div class="h-fit rounded-lg bg-zinc-50 p-5 shadow-lg">
                        <h3 class="text-2xl">Heart</h3>
                        <div class="mt-5">
                            <x-text-input2 name="heart" :value="old('heart')">Data</x-text-input2>
                        </div>
                    </div>
                    <div class="h-fit rounded-lg bg-zinc-50 p-5 shadow-lg">
                        <h3 class="text-2xl">Lungs</h3>
                        <div class="mt-5">
                            <x-text-input2 name="lungs" :value="old('lungs')">Data</x-text-input2>
                        </div>
                    </div>
                    <div class="h-fit rounded-lg bg-zinc-50 p-5 shadow-lg">
                        <h3 class="text-2xl">Abdomen</h3>
                        <div class="mt-5">
                            <x-text-input2 name="abdomen" :value="old('abdomen')">Data</x-text-input2>
                        </div>
                    </div>
                    <div class="h-fit rounded-lg bg-zinc-50 p-5 shadow-lg">
                        <h3 class="text-2xl">Ears</h3>
                        <div class="mt-5 space-y-5">
                            <x-text-input2 name="position" :value="old('position')">Position</x-text-input2>
                            <x-text-input2 name="discharge" :value="old('discharge')">Discharge</x-text-input2>
                        </div>
                    </div>
                    <div class="h-fit rounded-lg bg-zinc-50 p-5 shadow-lg">
                        <h3 class="text-2xl">Musculoskeletal</h3>
                        <div class="mt-5 space-y-5">
                            <x-text-input2 name="back" :value="old('back')">Back</x-text-input2>
                            <x-text-input2 name="joints" :value="old('joints')">Joints</x-text-input2>
                            <x-text-input2 name="deformity" :value="old('deformity')">Deformity</x-text-input2>
                        </div>
                    </div>
                </div>
                <div class="space-y-5">
                    <div class="h-fit rounded-lg bg-zinc-50 p-5 shadow-lg">
                        <h3 class="text-2xl">History Taking</h3>
                        <div class="mt-5 space-y-5">
                            <x-text-input2 name="past_medical_history" :value="old('past_medical_history')">Past Medical History</x-text-input2>
                            <x-text-input2 name="family_history" :value="old('family_history')">Family History</x-text-input2>
                            <x-text-input2 name="past_surgical_history" :value="old('past_surgical_history')">Past Surgical History</x-text-input2>
                            <x-text-input2 name="current_medication" :value="old('current_medication')">Current Medication</x-text-input2>
                            <x-text-input2 name="history_of_present_illness" :value="old('history_of_present_illness')">History Of Present Illness</x-text-input2>
                        </div>
                    </div>
                    <div class="h-fit rounded-lg bg-zinc-50 p-5 shadow-lg">
                        <h3 class="text-2xl">Mouth</h3>
                        <div class="mt-5 space-y-5">
                            <x-text-input2 name="fissures" :value="old('fissures')">Fissures</x-text-input2>
                            <x-text-input2 name="tongue" :value="old('tongue')">Tongue</x-text-input2>
                            <x-text-input2 name="teeth_and_gum" :value="old('teeth_and_gum')">Teeth And Gum</x-text-input2>
                            <div class="">
                                <label for="mouth_remark" class="mb-2 block text-sm font-medium text-zinc-900">Remark</label>
                                <textarea type="text" id="mouth_remark" name="mouth_remark" class="block w-full rounded-lg border border-zinc-300 bg-zinc-50 p-2.5 text-sm text-zinc-700 focus:border-zinc-500 focus:outline-none focus:ring-zinc-500" placeholder="">{{ old("mouth_remark") }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="h-fit rounded-lg bg-zinc-50 p-5 shadow-lg">
                        <h3 class="text-2xl">Allergies</h3>
                        <div class="mt-5 space-y-5">
                            <x-text-input2 name="drug" :value="old('drug')">Drug</x-text-input2>
                            <x-text-input2 name="allergen" :value="old('allergen')">Allergen</x-text-input2>
                        </div>
                    </div>
                </div>
                <div class="space-y-5">
                    <div class="h-fit rounded-lg bg-zinc-50 p-5 shadow-lg">
                        <h3 class="text-2xl">Body & Nutritional Status</h3>
                        <div class="mt-5 space-y-5">
                            <x-text-input2 name="weight" :value="old('weight')">Weight</x-text-input2>
                            <x-text-input2 name="height" :value="old('height')">Height</x-text-input2>
                            <x-text-input2 name="bmi" :value="old('bmi')">BMI</x-text-input2>
                            <div class="">
                                <label for="body_remark" class="mb-2 block text-sm font-medium text-zinc-900">Remark</label>
                                <textarea type="text" id="body_remark" name="body_remark" class="block w-full rounded-lg border border-zinc-300 bg-zinc-50 p-2.5 text-sm text-zinc-700 focus:border-zinc-500 focus:outline-none focus:ring-zinc-500" placeholder="">{{ old("body_remark") }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="h-fit rounded-lg bg-zinc-50 p-5 shadow-lg">
                        <h3 class="text-2xl">Eyes</h3>
                        <div class="mt-5 space-y-5">
                            <x-text-input2 name="anaemia" :value="old('anaemia')">Anaemia</x-text-input2>
                            <x-text-input2 name="jaundice" :value="old('jaundice')">Jaundice</x-text-input2>
                        </div>
                    </div>
                    <div class="h-fit rounded-lg bg-zinc-50 p-5 shadow-lg">
                        <h3 class="text-2xl">Neck</h3>
                        <div class="mt-5 space-y-5">
                            <x-text-input2 name="thyroid" :value="old('thyroid')">Thyroid</x-text-input2>
                            <x-text-input2 name="lymph_node" :value="old('lymph_node')">Lymph Node</x-text-input2>
                        </div>
                    </div>
                    <div class="h-fit rounded-lg bg-zinc-50 p-5 shadow-lg">
                        <h3 class="text-2xl">Hygiene</h3>
                        <div class="mt-5">
                            <x-text-input2 name="hygiene" :value="old('hygiene')">Data</x-text-input2>
                        </div>
                    </div>
                    <div class="h-fit rounded-lg bg-zinc-50 p-5 shadow-lg">
                        <h3 class="text-2xl">Immunization</h3>
                        <div class="mt-5">
                            <x-text-input2 name="immunization" :value="old('immunization')">Data</x-text-input2>
                        </div>
                    </div>
                    <div class="h-fit rounded-lg bg-zinc-50 p-5 shadow-lg">
                        <h3 class="text-2xl">Doctor's Sign</h3>
                        <div class="mt-5">
                            <div class="">
                                <label for="sign" class="mb-2 block text-sm font-medium text-gray-900">Select doctor's sign</label>
                                <select id="sign" name="sign" class="block w-full rounded-lg border border-gray-300 bg-zinc-50 p-2.5 text-sm text-gray-900 focus:border-zinc-500 focus:outline-none focus:ring-zinc-500">
                                    <option selected disabled>Choose doctor's sign</option>
                                    @foreach ($doctorsigns as $doctorsign)
                                        <option value="{{ $doctorsign->slug }}" {{ old("sign") == $doctorsign->slug ? "selected" : "" }}>
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
            </div>

            <div class="mt-5 flex justify-end gap-10">
                <a href="{{ route("healthrecords.index") }}" class="btn-outline-zinc w-1/5">Cancel</a>
                <button type="submit" class="btn-zinc w-1/5">Create</button>
            </div>
        </form>
    </div>
</x-app-layout>
