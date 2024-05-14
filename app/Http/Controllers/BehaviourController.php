<?php

namespace App\Http\Controllers;

use App\Models\Behaviour;
use App\Http\Requests\StoreBehaviourRequest;
use App\Http\Requests\UpdateBehaviourRequest;
use Illuminate\Support\Str;

class BehaviourController extends Controller
{
    public function index()
    {
        $behaviours = Behaviour::all();
        return view('behaviours.index',compact('behaviours'));
    }

    public function create()
    {
        return view('behaviours.create');
    }

    public function store(StoreBehaviourRequest $request)
    {
        Behaviour::create([
            "name" => $request->name,
            "slug" => Str::slug($request->name),
        ]);

        return redirect()->route('behaviours.index');
    }

    public function edit(Behaviour $behaviour)
    {
        return view('behaviours.edit',compact('behaviour'));
    }

    public function update(UpdateBehaviourRequest $request, Behaviour $behaviour)
    {
        $behaviour->update([
            "name" => $request->name,
            "slug" => Str::slug($request->name),
        ]);

        return redirect()->route('behaviours.index');
    }

    public function destroy(Behaviour $behaviour)
    {
        $behaviour->delete();
        return redirect()->route('behaviours.index');
    }
}
