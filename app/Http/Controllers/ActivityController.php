<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Http\Requests\StoreActivityRequest;
use App\Http\Requests\UpdateActivityRequest;
use Illuminate\Support\Str;

class ActivityController extends Controller
{
    public function index()
    {
        $activities = Activity::all();
        return view('activity.index',compact('activities'));
    }
    public function create()
    {
        return view('activity.create');
    }
    public function store(StoreActivityRequest $request)
    {
        Activity::create([
            "name" => $request->name,
            "slug" => Str::slug($request->name),
        ]);

        return redirect()->route('activities.index');
    }

    public function edit(Activity $activity)
    {
        return view('activity.edit',compact('activity'));
    }

    public function update(UpdateActivityRequest $request, Activity $activity)
    {
        $activity->update([
            "name" => $request->name,
            "slug" => Str::slug($request->name),
        ]);

        return redirect()->route('activities.index');
    }

    public function destroy(Activity $activity)
    {
        $activity->delete();
        return redirect()->route('activities.index');
    }
}
