<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::all();
        return view('teachers.index', compact('teachers'));
    }

    public function create()
    {
        return view('teachers.create');
    }

    public function store(StoreTeacherRequest $request)
    {
        if($request->hasFile('sign')){
            $sign = $request->file('sign');
            $newsignname = Str::of($request->email)->before("@")->lower().'.'.$sign->getClientOriginalExtension();
            Storage::disk('public')->put('signs/'.$newsignname,$sign->get());
        }

        $teacher = Teacher::create([
            "name" => $request->name,
            "email" => $request->email,
            "slug" => Str::of($request->email)->before("@")->lower(),
            "sign" => empty($newsignname) ? "" : $newsignname,
        ]);
        return redirect()->route('teachers.index');
    }

    public function show(Teacher $teacher)
    {
        return view('teachers.show', compact('teacher'));
    }

    public function edit(Teacher $teacher)
    {
        return view('teachers.edit', compact('teacher'));
    }

    public function update(UpdateTeacherRequest $request, Teacher $teacher)
    {

        if($request->hasFile('sign')){
            if(!empty($teacher->sign)){
                Storage::disk('public')->delete('signs/'.$teacher->sign);
            }
            $sign = $request->file('sign');
            $newsignname = Str::of($request->email)->before("@")->lower().'.'.$sign->getClientOriginalExtension();
            Storage::disk('public')->put('signs/'.$newsignname,$sign->get());
            $teacher->sign = $newsignname;
        }

        if($request->email != $teacher->email)
        {
            Storage::disk('public')->move('signs/'.$teacher->sign, 'signs/'.Str::of($request->email)->before("@")->lower().'.'.Str::of($teacher->sign)->after('.'));
            $teacher->email = $request->email;
            $teacher->slug = Str::of($request->email)->before("@")->lower();
            $teacher->sign = Str::of($request->email)->before("@")->lower().'.'.Str::of($teacher->sign)->after('.');
        }

        $teacher->name = $request->name;
        $teacher->save();
        return redirect()->route('teachers.show',$teacher->id);
    }

    public function destroy(Teacher $teacher)
    {
        Storage::disk('public')->delete('signs/'.$teacher->sign);
        $teacher->delete();
        return redirect()->route('teachers.index');
    }
}
