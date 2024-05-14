<?php

namespace App\Http\Controllers;

use App\Models\Academicclass;
use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::select('id','name','email','phone')->get();
        return view('students.index',compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(StoreStudentRequest $request)
    {
        if($request->hasFile('studentphoto')){
            $image = $request->file('studentphoto');
            $newimagename = Str::of($request->email)->before("@")->lower().'.'.$image->getClientOriginalExtension();
            Storage::disk('public')->put('studentphotos/'.$newimagename,$image->get());
        }

        $student = Student::create([
            "name" => $request->name,
            "email" => $request->email,
            "phone" => $request->phone,
            "gender" => $request->gender,
            "image" => empty($newimagename) ? "" : $newimagename,
        ]);

        return redirect()->route('students.show',$student->id);
    }

    public function show(Student $student)
    {
        $classes = $student->academicClasses;
        $allClasses = Academicclass::select('id','name')->orderBy('name','asc')->get();
        return view('students.show',compact('student','classes','allClasses'));
    }

    public function edit(Student $student)
    {
        return view('students.edit',compact('student'));
    }

    public function update(UpdateStudentRequest $request, Student $student)
    {
        if($request->hasFile('studentphoto')){
            if(!empty($student->image)){
                Storage::disk('public')->delete('studentphotos/'.$student->image);
            }
            $image = $request->file('studentphoto');
            $newimagename = Str::of($request->email)->before("@")->lower().'.'.$image->getClientOriginalExtension();
            Storage::disk('public')->put('studentphotos/'.$newimagename,$image->get());
            $student->image = $newimagename;
        }

        if($request->email != $student->email)
        {
            if($student->image == null){
                $image = $request->file('studentphoto');
                $newimagename = Str::of($request->email)->before("@")->lower().'.'.$image->getClientOriginalExtension();
                Storage::disk('public')->put('studentphotos/'.$newimagename,$image->get());
            }else{
                Storage::disk('public')->move('studentphotos/'.$student->image, 'studentphotos/'.Str::of($request->email)->before("@")->lower().'.'.Str::of($student->image)->after('.'));
                $student->email = $request->email;
                $student->image = Str::of($request->email)->before("@")->lower().'.'.Str::of($student->image)->after('.');
            }
        }

        $student->name = $request->name;
        $student->phone = $request->phone;
        $student->gender = $request->gender;
        $student->save();

        return redirect()->route('students.show',$student->id);
    }

    public function destroy(Student $student)
    {
        Storage::disk('public')->delete('studentphotos/'.$student->image);
        $student->delete();
        return redirect()->route('students.index');
    }

    public function addAcademicClass(Request $request, Student $student)
    {
        if($student->academicClasses()->find($request->academicclass))
        {
            return redirect()->route('students.show',$student->id);
        }
        else{
            $student->academicClasses()->attach($request->academicclass);
            return redirect()->route('students.show',$student->id);
        }
    }

    public function removeAcademicClass(Student $student, $id)
    {
        $student->academicClasses()->detach($id);
        return redirect()->route('students.show',$student->id);
    }

    public function addResults(Student $student,Academicclass $class)
    {
        $class = $class->load('subjects','activities','behaviours');
        return view('students.addresults',compact('class','student'));
    }
}
