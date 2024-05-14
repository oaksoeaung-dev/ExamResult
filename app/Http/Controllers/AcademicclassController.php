<?php

namespace App\Http\Controllers;

use App\Models\Academicclass;
use App\Http\Requests\StoreAcademicclassRequest;
use App\Http\Requests\UpdateAcademicclassRequest;
use App\Models\Activity;
use App\Models\Behaviour;
use App\Models\Subject;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AcademicclassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes = Academicclass::all();
        return view('classes.index',compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $subjects = Subject::select('name','id')->get();
        $activities = Activity::select('name','id')->get();
        $behaviours = Behaviour::select('name','id')->get();
        return view('classes.create',compact('activities','subjects','behaviours'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAcademicclassRequest $request)
    {
        if(!empty($request->subjects))
        {

            $class = Academicclass::create([
                "name" => $request->name,
                "slug" => Str::slug($request->name),
                "startdate" => Carbon::parse($request->start),
                "enddate" => Carbon::parse($request->end),
            ]);

            $class->subjects()->attach($request->subjects);
            $class->activities()->attach($request->activities);
            $class->behaviours()->attach($request->behaviours);
        }
        else
        {
            return back()->withInput();
        }

        return redirect()->route('classes.show',$class->id);
    }

    public function show(Academicclass $class)
    {
        $class = $class->load('subjects','activities','behaviours');
        return view('classes.show',compact('class'));
    }

    public function edit(Academicclass $class)
    {
        $class = $class->load('subjects','activities');
        $subjects = Subject::select('name','id')->get();
        $activities = Activity::select('name','id')->get();
        $behaviours = Behaviour::select('name','id')->get();
        return view('classes.edit',compact('class','subjects','activities','behaviours'));
    }

    public function update(UpdateAcademicclassRequest $request, Academicclass $class)
    {
        if(!empty($request->subjects))
        {

            $class->update([
                "name" => $request->name,
                "slug" => Str::slug($request->name),
                "startdate" => Carbon::parse($request->start),
                "enddate" => Carbon::parse($request->end),
            ]);

            $class->subjects()->sync($request->subjects);
            $class->activities()->sync($request->activities);
            $class->behaviours()->sync($request->behaviours);
        }
        else
        {
            return back()->withInput();
        }

        return redirect()->route('classes.show',$class->id);
    }

    public function destroy(Academicclass $class)
    {
        $class->delete();
        return redirect()->route('classes.index');
    }
}
