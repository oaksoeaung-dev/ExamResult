<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Http\Requests\StoreSubjectRequest;
use App\Http\Requests\UpdateSubjectRequest;
use Illuminate\Support\Str;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::all();
        return view('subject.index',compact('subjects'));
    }
    public function create()
    {
        return view('subject.create');
    }
    public function store(StoreSubjectRequest $request)
    {
        Subject::create([
            "name" => $request->name,
            "slug" => Str::slug($request->name),
            "skill1" => $request->skill1,
            "skill2" => $request->skill2,
            "skill3" => $request->skill3,
            "skill4" => $request->skill4,
            "skill5" => $request->skill5,
            "skill6" => $request->skill6,
        ]);

        return redirect()->route('subjects.index');
    }
    public function show(Subject $subject)
    {
        return view('subject.show',compact('subject'));
    }
    public function edit(Subject $subject)
    {
        return view('subject.edit',compact('subject'));
    }
    public function update(UpdateSubjectRequest $request, Subject $subject)
    {
        $subject->update([
            "name" => $request->name,
            "slug" => Str::slug($request->name),
            "skill1" => $request->skill1,
            "skill2" => $request->skill2,
            "skill3" => $request->skill3,
            "skill4" => $request->skill4,
            "skill5" => $request->skill5,
            "skill6" => $request->skill6,
        ]);

        return redirect()->route('subjects.index');
    }
    public function destroy(Subject $subject)
    {
        $subject->delete();
        return redirect()->route('subjects.index');
    }
}
