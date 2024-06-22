<?php

namespace App\Http\Controllers;

use App\Models\Abdomen;
use App\Models\Allergy;
use App\Models\Bodystatus;
use App\Models\Doctorsign;
use App\Models\Ear;
use App\Models\Eye;
use App\Models\Healthrecord;
use App\Http\Requests\StoreHealthrecordRequest;
use App\Http\Requests\UpdateHealthrecordRequest;
use App\Models\Healthrecordqrcode;
use App\Models\Heart;
use App\Models\Historytaking;
use App\Models\Hygiene;
use App\Models\Immunization;
use App\Models\Lungs;
use App\Models\Mouth;
use App\Models\Musculoskeletal;
use App\Models\Neck;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

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
        try
        {
            if(!empty($student))
            {
                $historytaking = new Historytaking();
                $historytaking->past_medical_history = $request->past_medical_history;
                $historytaking->family_history = $request->family_history;
                $historytaking->past_surgical_history = $request->past_surgical_history;
                $historytaking->current_medication = $request->current_medication;
                $historytaking->history_of_present_illness = $request->history_of_present_illness;
                $historytaking->student()->associate($student);
                $historytaking->save();

                $bodystatus = new Bodystatus();
                $bodystatus->height = $request->height;
                $bodystatus->weight = $request->weight;
                $bodystatus->bmi = $request->bmi;
                $bodystatus->remark = $request->body_remark;
                $bodystatus->student()->associate($student);
                $bodystatus->save();

                $heart = new Heart();
                $heart->data = $request->heart;
                $heart->student()->associate($student);
                $heart->save();

                $lungs = new Lungs();
                $lungs->data = $request->lungs;
                $lungs->student()->associate($student);
                $lungs->save();

                $abdomen = new Abdomen();
                $abdomen->data = $request->abdomen;
                $abdomen->student()->associate($student);
                $abdomen->save();

                $mouth = new Mouth();
                $mouth->fissures = $request->fissures;
                $mouth->tongue = $request->tongue;
                $mouth->teeth_and_gum = $request->teeth_and_gum;
                $mouth->remark = $request->mouth_remark;
                $mouth->student()->associate($student);
                $mouth->save();

                $eye = new Eye();
                $eye->anaemia = $request->anaemia;
                $eye->jaundice = $request->jaundice;
                $eye->student()->associate($student);
                $eye->save();

                $ear = new Ear();
                $ear->position = $request->position;
                $ear->discharge = $request->discharge;
                $ear->student()->associate($student);
                $ear->save();

                $neck = new Neck();
                $neck->thyroid = $request->thyroid;
                $neck->lymph_node = $request->lymph_node;
                $neck->student()->associate($student);
                $neck->save();

                $musculoskeletal = new Musculoskeletal();
                $musculoskeletal->back = $request->back;
                $musculoskeletal->joints = $request->joints;
                $musculoskeletal->deformity = $request->deformity;
                $musculoskeletal->student()->associate($student);
                $musculoskeletal->save();

                $allergy = new Allergy();
                $allergy->drug = $request->drug;
                $allergy->allergen = $request->allergen;
                $allergy->student()->associate($student);
                $allergy->save();

                $immunization = new Immunization();
                $immunization->data = $request->immunization;
                $immunization->student()->associate($student);
                $immunization->save();

                $hygiene = new Hygiene();
                $hygiene->data = $request->hygiene;
                $hygiene->student()->associate($student);
                $hygiene->save();

                $sign = new Doctorsign();
                $sign->sign = $request->sign;
                $sign->student()->associate($student);
                $sign->save();

                QrCode::size(200)->color(17, 24, 39)->generate(env('APP_URL')."/healthrecords/student/"."{$student->stdId}?"."stdKey="."{$student->stdKey}", storage_path("/app/public/healthrecordqrcodes/{$student->stdId}.svg"));
                $healthrecordqrcode = new Healthrecordqrcode();
                $healthrecordqrcode->url = env('APP_URL')."/healthrecords/student/"."{$student->stdId}?"."stdKey="."{$student->stdKey}";
                $healthrecordqrcode->qrcode_path = "{$student->stdId}.svg";
                $healthrecordqrcode->student()->associate($student);
                $healthrecordqrcode->save();

                return redirect()->route('healthrecords.show',$student->id);
            }
            else
            {
                return back()->withInput()->withErrors(['student' => 'Student not found.']);
            }
        }catch (QueryException $e)
        {
            abort('404');
        }
    }

    public function show(Student $healthrecord)
    {

        $record = $healthrecord->load(['historytaking','bodystatus','heart','lungs','abdomen','mouth','eye','ear','neck','musculoskeletal','allergy','immunization','hygiene','doctorsign']);
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
            $record = Student::whereRaw('BINARY stdId = ?', ["$studentId"])->whereRaw('BINARY stdKey = ?', [request()->query()["stdKey"]])->with(['historytaking','bodystatus','heart','lungs','abdomen','mouth','eye','ear','neck','musculoskeletal','allergy','immunization','hygiene','doctorsign'])->first();

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
        $record = $healthrecord->load(['historytaking','bodystatus','heart','lungs','abdomen','mouth','eye','ear','neck','musculoskeletal','allergy','immunization','hygiene','doctorsign']);
        return view('healthrecords.edit',compact('record','doctorsigns'));
    }

    public function update(UpdateHealthrecordRequest $request, Student $healthrecord)
    {
        $healthrecord->historytaking->past_medical_history = $request->past_medical_history;
        $healthrecord->historytaking->family_history = $request->family_history;
        $healthrecord->historytaking->past_surgical_history = $request->past_surgical_history;
        $healthrecord->historytaking->current_medication = $request->current_medication;
        $healthrecord->historytaking->history_of_present_illness = $request->history_of_present_illness;
        $healthrecord->historytaking->save();

        $healthrecord->bodystatus->height = $request->height;
        $healthrecord->bodystatus->weight = $request->weight;
        $healthrecord->bodystatus->bmi = $request->bmi;
        $healthrecord->bodystatus->remark = $request->body_remark;
        $healthrecord->bodystatus->save();

        $healthrecord->heart->data = $request->heart;
        $healthrecord->heart->save();

        $healthrecord->lungs->data = $request->lungs;
        $healthrecord->lungs->save();

        $healthrecord->abdomen->data = $request->abdomen;
        $healthrecord->abdomen->save();

        $healthrecord->mouth->fissures = $request->fissures;
        $healthrecord->mouth->tongue = $request->tongue;
        $healthrecord->mouth->teeth_and_gum = $request->teeth_and_gum;
        $healthrecord->mouth->remark = $request->mouth_remark;
        $healthrecord->mouth->save();

        $healthrecord->eye->anaemia = $request->anaemia;
        $healthrecord->eye->jaundice = $request->jaundice;
        $healthrecord->eye->save();

        $healthrecord->ear->position = $request->position;
        $healthrecord->ear->discharge = $request->discharge;
        $healthrecord->ear->save();

        $healthrecord->neck->thyroid = $request->thyroid;
        $healthrecord->neck->lymph_node = $request->lymph_node;
        $healthrecord->neck->save();

        $healthrecord->musculoskeletal->back = $request->back;
        $healthrecord->musculoskeletal->joints = $request->joints;
        $healthrecord->musculoskeletal->deformity = $request->deformity;
        $healthrecord->musculoskeletal->save();

        $healthrecord->allergy->drug = $request->drug;
        $healthrecord->allergy->allergen = $request->allergen;
        $healthrecord->allergy->save();

        $healthrecord->immunization->data = $request->immunization;
        $healthrecord->immunization->save();

        $healthrecord->hygiene->data = $request->hygiene;
        $healthrecord->hygiene->save();

        $healthrecord->doctorsign->sign = $request->sign;
        $healthrecord->doctorsign->save();

        return redirect()->route('healthrecords.show',$healthrecord->id);
    }

    public function viewQr(Student $healthrecord)
    {
        $name = $healthrecord->name;
        $qrcode = $healthrecord->healthrecordqrcode;
        return view('healthrecords.viewqr',compact('qrcode','name'));
    }

    public function destroy(Healthrecord $healthrecord)
    {
        //
    }
}
