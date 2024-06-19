<x-app-layout>
    <div>
        <div>
            <h1 class="">Edit a record</h1>
        </div>

        <form method="post" action="{{ route('healthrecords.update',$record->id) }}">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-3 gap-5 mt-10 h-full">
                <div class="space-y-5">
                    <div class="bg-zinc-50 p-5 shadow-lg rounded-lg h-fit">
                        <h3 class="text-2xl">Student Information</h3>
                        <div class="mt-5">
                            <x-text-input2 name="stdid" :disabled="true" :value="old('stdid',$record->stdId)">Student ID</x-text-input2>
                            @if(!empty(session('errors')))
                                <p class="mt-1 text-xs font-semibold text-red-500">{{ session('errors')->first('student') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="bg-zinc-50 p-5 shadow-lg rounded-lg h-fit">
                        <h3 class="text-2xl">Heart</h3>
                        <div class="mt-5">
                            <x-text-input2 name="heart" :value="old('heart',$record->heart->data)">Data</x-text-input2>
                        </div>
                    </div>
                    <div class="bg-zinc-50 p-5 shadow-lg rounded-lg h-fit">
                        <h3 class="text-2xl">Lungs</h3>
                        <div class="mt-5">
                            <x-text-input2 name="lungs" :value="old('lungs',$record->lungs->data)">Data</x-text-input2>
                        </div>
                    </div>
                    <div class="bg-zinc-50 p-5 shadow-lg rounded-lg h-fit">
                        <h3 class="text-2xl">Abdomen</h3>
                        <div class="mt-5">
                            <x-text-input2 name="abdomen" :value="old('abdomen',$record->abdomen->data)">Data</x-text-input2>
                        </div>
                    </div>
                    <div class="bg-zinc-50 p-5 shadow-lg rounded-lg h-fit">
                        <h3 class="text-2xl">Ears</h3>
                        <div class="mt-5 space-y-5">
                            <x-text-input2 name="position" :value="old('position',$record->ear->position)">Position</x-text-input2>
                            <x-text-input2 name="discharge" :value="old('discharge',$record->ear->discharge)">Discharge</x-text-input2>
                        </div>
                    </div>
                    <div class="bg-zinc-50 p-5 shadow-lg rounded-lg h-fit">
                        <h3 class="text-2xl">Musculoskeletal</h3>
                        <div class="mt-5 space-y-5">
                            <x-text-input2 name="back" :value="old('back',$record->musculoskeletal->back)">Back</x-text-input2>
                            <x-text-input2 name="joints" :value="old('joints',$record->musculoskeletal->joints)">Joints</x-text-input2>
                            <x-text-input2 name="deformity" :value="old('deformity',$record->musculoskeletal->deformity)">Deformity</x-text-input2>
                        </div>
                    </div>
                </div>
                <div class="space-y-5">
                    <div class="bg-zinc-50 p-5 shadow-lg rounded-lg h-fit">
                        <h3 class="text-2xl">History Taking</h3>
                        <div class="mt-5 space-y-5">
                            <x-text-input2 name="past_medical_history" :value="old('past_medical_history',$record->historytaking->past_medical_history)">Past Medical History</x-text-input2>
                            <x-text-input2 name="family_history" :value="old('family_history',$record->historytaking->family_history)">Family History</x-text-input2>
                            <x-text-input2 name="past_surgical_history" :value="old('past_surgical_history',$record->historytaking->past_surgical_history)">Past Surgical History</x-text-input2>
                            <x-text-input2 name="current_medication" :value="old('current_medication',$record->historytaking->current_medication)">Current Medication</x-text-input2>
                            <x-text-input2 name="history_of_present_illness" :value="old('history_of_present_illness',$record->historytaking->history_of_present_illness)">History Of Present Illness</x-text-input2>
                        </div>
                    </div>
                    <div class="bg-zinc-50 p-5 shadow-lg rounded-lg h-fit">
                        <h3 class="text-2xl">Mouth</h3>
                        <div class="mt-5 space-y-5">
                            <x-text-input2 name="fissures" :value="old('fissures',$record->mouth->fissures)">Fissures</x-text-input2>
                            <x-text-input2 name="tongue" :value="old('tongue',$record->mouth->tongue)">Tongue</x-text-input2>
                            <x-text-input2 name="teeth_and_gum" :value="old('teeth_and_gum',$record->mouth->teeth_and_gum)">Teeth And Gum</x-text-input2>
                            <div class="">
                                <label for="mouth_remark" class="block mb-2 text-sm font-medium text-zinc-900">Remark</label>
                                <textarea type="text" id="mouth_remark" name="mouth_remark" class="bg-zinc-50 border border-zinc-300 text-zinc-700 text-sm rounded-lg focus:ring-zinc-500 focus:border-zinc-500 block w-full p-2.5 focus:outline-none" placeholder="" >{{ old('mouth_remark',$record->mouth->remark) }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="bg-zinc-50 p-5 shadow-lg rounded-lg h-fit">
                        <h3 class="text-2xl">Allergies</h3>
                        <div class="mt-5 space-y-5">
                            <x-text-input2 name="drug" :value="old('drug',$record->allergy->drug)">Drug</x-text-input2>
                            <x-text-input2 name="allergen" :value="old('allergen',$record->allergy->allergen)">Allergen</x-text-input2>
                        </div>
                    </div>
                </div>
                <div class="space-y-5">
                    <div class="bg-zinc-50 p-5 shadow-lg rounded-lg h-fit">
                        <h3 class="text-2xl">Body & Nutritional Status</h3>
                        <div class="mt-5 space-y-5">
                            <x-text-input2 name="weight" :value="old('weight',$record->bodystatus->weight)">Weight</x-text-input2>
                            <x-text-input2 name="height" :value="old('height',$record->bodystatus->height)">Height</x-text-input2>
                            <x-text-input2 name="bmi" :value="old('bmi',$record->bodystatus->bmi)">BMI</x-text-input2>
                            <div class="">
                                <label for="body_remark" class="block mb-2 text-sm font-medium text-zinc-900">Remark</label>
                                <textarea type="text" id="body_remark" name="body_remark" class="bg-zinc-50 border border-zinc-300 text-zinc-700 text-sm rounded-lg focus:ring-zinc-500 focus:border-zinc-500 block w-full p-2.5 focus:outline-none" placeholder="" >{{ old('body_remark',$record->bodystatus->remark) }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="bg-zinc-50 p-5 shadow-lg rounded-lg h-fit">
                        <h3 class="text-2xl">Eyes</h3>
                        <div class="mt-5 space-y-5">
                            <x-text-input2 name="anaemia" :value="old('anaemia',$record->eye->anaemia)">Anaemia</x-text-input2>
                            <x-text-input2 name="jaundice" :value="old('jaundice',$record->eye->jaundice)">Jaundice</x-text-input2>
                        </div>
                    </div>
                    <div class="bg-zinc-50 p-5 shadow-lg rounded-lg h-fit">
                        <h3 class="text-2xl">Neck</h3>
                        <div class="mt-5 space-y-5">
                            <x-text-input2 name="thyroid" :value="old('thyroid',$record->neck->thyroid)">Thyroid</x-text-input2>
                            <x-text-input2 name="lymph_node" :value="old('lymph_node',$record->neck->lymph_node)">Lymph Node</x-text-input2>
                        </div>
                    </div>
                    <div class="bg-zinc-50 p-5 shadow-lg rounded-lg h-fit">
                        <h3 class="text-2xl">Hygiene</h3>
                        <div class="mt-5">
                            <x-text-input2 name="hygiene" :value="old('hygiene',$record->hygiene->data)">Data</x-text-input2>
                        </div>
                    </div>
                    <div class="bg-zinc-50 p-5 shadow-lg rounded-lg h-fit">
                        <h3 class="text-2xl">Immunization</h3>
                        <div class="mt-5">
                            <x-text-input2 name="immunization" :value="old('immunization',$record->immunization->data)">Data</x-text-input2>
                        </div>
                    </div>
                    <div class="bg-zinc-50 p-5 shadow-lg rounded-lg h-fit">
                        <h3 class="text-2xl">Doctor's Sign</h3>
                        <div class="mt-5">
                            <div class="">
                                <label for="sign" class="block mb-2 text-sm font-medium text-gray-900">Select doctor's sign</label>
                                <select id="sign" name="sign" class="bg-zinc-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-zinc-500 focus:outline-none focus:border-zinc-500 block w-full p-2.5">
                                    <option selected disabled>Choose doctor's sign</option>
                                    @foreach($doctorsigns as $docsign)
                                        <option value="{{$docsign->slug}}" {{ old('sign',$record->doctorsign->sign) == $docsign->slug ? "selected" : "" }}>{{ $docsign->name }}</option>
                                    @endforeach
                                </select>
                                @error('sign')
                                <p class="text-red-500 text-xs mt-1 font-semibold">{{ $errors->first('sign') }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex gap-10 justify-end mt-5">
                <a href="{{ route('healthrecords.index') }}" class="btn-outline-zinc w-1/5">Cancel</a>
                <button type="submit" class="btn-zinc w-1/5">Update</button>
            </div>
        </form>
    </div>
</x-app-layout>
