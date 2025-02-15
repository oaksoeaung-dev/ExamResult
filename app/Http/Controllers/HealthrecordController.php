<?php

namespace App\Http\Controllers;

use App\Models\Doctorinformation;
use App\Models\Generalappearance;
use App\Models\Healthrecord;
use App\Http\Requests\StoreHealthrecordRequest;
use App\Http\Requests\UpdateHealthrecordRequest;
use App\Models\Hearing;
use App\Models\Historytaking;
use App\Models\Physicalmentalhealthassessment;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Vision;
use Illuminate\Database\QueryException;

class HealthrecordController extends Controller
{

    public function index()
    {
        $students = Student::select('id','name','email','phone')->get();
        return view('healthrecords.index',compact('students'));
    }

    public function create()
    {
        $doctorsigns = Teacher::where('email','like','%doctor%')->get();
        return view('healthrecords.create',compact('doctorsigns'));
    }

    public function store(StoreHealthrecordRequest $request)
    {
        $student = Student::whereRaw('BINARY stdId = ?', ["$request->stdid"])->first();
        $doctorsign = Teacher::where('email','like','%'.$request->sign.'%')->first();
        try
        {
            if(!empty($student))
            {
                $historytaking = new Historytaking();
                $historytaking->medical_conditions_currently_being_experienced = $request->medical_conditions_currently_being_experienced;
                $historytaking->health_issues_in_the_past = $request->health_issues_in_the_past;
                $historytaking->allergies = $request->allergies;
                $historytaking->previous_vaccination = $request->previous_vaccination;
                $historytaking->current_medications = $request->current_medications;
                $historytaking->student()->associate($student);
                $historytaking->save();

                $generalAppearance = new Generalappearance();
                $generalAppearance->skin = $request->skin;
                $generalAppearance->height = $request->height;
                $generalAppearance->pulse_rate = $request->pulse_rate;
                $generalAppearance->temperature = $request->temperature;
                $generalAppearance->weight = $request->weight;
                $generalAppearance->blood_pressure = $request->blood_pressure;
                $generalAppearance->bmi = $request->bmi;
                $generalAppearance->spo2 = $request->spo2;
                $generalAppearance->student()->associate($student);
                $generalAppearance->save();

                $vision = new Vision();
                $vision->pupil = $request->pupil;
                $vision->right_visual_fields = $request->right_visual_fields;
                $vision->color_vision = $request->color_vision;
                $vision->left_visual_fields = $request->left_visual_fields;
                $vision->student()->associate($student);
                $vision->save();

                $hearing = new Hearing();
                $hearing->right = $request->right;
                $hearing->left = $request->left;
                $hearing->student()->associate($student);
                $hearing->save();

                $physical = new Physicalmentalhealthassessment();
                $physical->eyes_and_pupils = $request->eyes_and_pupils;
                $physical->nose = $request->nose;
                $physical->throat = $request->throat;
                $physical->teeth_and_mouth = $request->teeth_and_mouth;
                $physical->lungs_and_chest = $request->lungs_and_chest;
                $physical->cardiovascular_system = $request->cardiovascular_system;
                $physical->abdomen = $request->abdomen;
                $physical->extremities_and_back = $request->extremities_and_back;
                $physical->musculoskeletal = $request->musculoskeletal;
                $physical->mental_health_status = $request->mental_health_status;
                $physical->student()->associate($student);
                $physical->save();

                $doctorInformation = new Doctorinformation();
                $doctorInformation->fit_in_all_area = $request->fitArea;
                $doctorInformation->futher_assessment = $request->futherAssessment;
                $doctorInformation->comment = $request->comment;
                $doctorInformation->name = $doctorsign->name;
                $doctorInformation->doctor_sign = $request->sign;
                $doctorInformation->student()->associate($student);
                $doctorInformation->save();

                return redirect()->route('healthrecords.show',$student->id);
            }
            else
            {
                return back()->withInput()->withErrors(['student' => 'Student not found.']);
            }
        }catch (QueryException $e)
        {
            dd($e->getMessage());
            abort('404');
        }
    }

    public function show(Student $healthrecord)
    {
        $record = $healthrecord;
        $record = $healthrecord->load(['historytaking','generalAppearance','hearing', 'physicalmentalhealthassessment','vision','doctorinformation']);
        foreach ($record->getRelations() as $relation)
        {
            if($relation == null)
            {
                return redirect()->route('healthrecords.create');
            }
        }
        return view('healthrecords.show',compact('record'));
    }

    public function qrShow($studentId)
    {
        if(isset(request()->query()["stdKey"]))
        {
            $record = Student::whereRaw('BINARY stdId = ?', ["$studentId"])->whereRaw('BINARY stdKey = ?', [request()->query()["stdKey"]])->with(['historytaking','generalAppearance','hearing', 'physicalmentalhealthassessment','vision','doctorinformation'])->first();

            if($record != null)
            {
                return view('healthrecords.qrShow',compact('record'));
            }
            else{
                abort('404');
            }
        }
        else{
            abort('404');
        }
    }

    public function edit(Student $healthrecord)
    {
        $doctorsigns = Teacher::where('email','like','%doctor%')->get();
        $record = $healthrecord->load(['historytaking','generalAppearance','hearing', 'physicalmentalhealthassessment','vision','doctorinformation']);
        return view('healthrecords.edit',compact('record','doctorsigns'));
    }

    public function update(UpdateHealthrecordRequest $request, Student $healthrecord)
    {
        $doctorsign = Teacher::where('email','like','%'.$request->sign.'%')->first();

        $healthrecord->historytaking->medical_conditions_currently_being_experienced = $request->medical_conditions_currently_being_experienced;
        $healthrecord->historytaking->health_issues_in_the_past = $request->health_issues_in_the_past;
        $healthrecord->historytaking->allergies = $request->allergies;
        $healthrecord->historytaking->previous_vaccination = $request->previous_vaccination;
        $healthrecord->historytaking->current_medications = $request->current_medications;
        $healthrecord->historytaking->save();

        $healthrecord->generalAppearance->skin = $request->skin;
        $healthrecord->generalAppearance->height = $request->height;
        $healthrecord->generalAppearance->pulse_rate = $request->pulse_rate;
        $healthrecord->generalAppearance->temperature = $request->temperature;
        $healthrecord->generalAppearance->weight = $request->weight;
        $healthrecord->generalAppearance->blood_pressure = $request->blood_pressure;
        $healthrecord->generalAppearance->bmi = $request->bmi;
        $healthrecord->generalAppearance->spo2 = $request->spo2;
        $healthrecord->generalAppearance->save();

        $healthrecord->vision->pupil = $request->pupil;
        $healthrecord->vision->right_visual_fields = $request->right_visual_fields;
        $healthrecord->vision->color_vision = $request->color_vision;
        $healthrecord->vision->left_visual_fields = $request->left_visual_fields;
        $healthrecord->vision->save();

        $healthrecord->hearing->right = $request->right;
        $healthrecord->hearing->left = $request->left;
        $healthrecord->hearing->save();

        $healthrecord->physicalmentalhealthassessment->eyes_and_pupils = $request->eyes_and_pupils;
        $healthrecord->physicalmentalhealthassessment->nose = $request->nose;
        $healthrecord->physicalmentalhealthassessment->throat = $request->throat;
        $healthrecord->physicalmentalhealthassessment->teeth_and_mouth = $request->teeth_and_mouth;
        $healthrecord->physicalmentalhealthassessment->lungs_and_chest = $request->lungs_and_chest;
        $healthrecord->physicalmentalhealthassessment->cardiovascular_system = $request->cardiovascular_system;
        $healthrecord->physicalmentalhealthassessment->abdomen = $request->abdomen;
        $healthrecord->physicalmentalhealthassessment->extremities_and_back = $request->extremities_and_back;
        $healthrecord->physicalmentalhealthassessment->musculoskeletal = $request->musculoskeletal;
        $healthrecord->physicalmentalhealthassessment->mental_health_status = $request->mental_health_status;
        $healthrecord->physicalmentalhealthassessment->save();

        $healthrecord->doctorinformation->fit_in_all_area = $request->fitArea;
        $healthrecord->doctorinformation->futher_assessment = $request->futherAssessment;
        $healthrecord->doctorinformation->comment = $request->comment;
        $healthrecord->doctorinformation->name = $doctorsign->name;
        $healthrecord->doctorinformation->doctor_sign = $request->sign;
        $healthrecord->doctorinformation->save();

        return redirect()->route('healthrecords.show',$healthrecord->id);
    }

    public function viewQr(Student $healthrecord)
    {
        $name = $healthrecord->name;
        $stdId = $healthrecord->stdId;
        $stdKey = $healthrecord->stdKey;
        return view('healthrecords.viewqr',compact('name','stdId','stdKey'));
    }

    public function destroy(Healthrecord $healthrecord)
    {
        //
    }
}
