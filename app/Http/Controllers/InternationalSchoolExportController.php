<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadCSVISRequest;
use App\Models\Learninghour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use League\Csv\Reader;

class InternationalSchoolExportController extends Controller
{
    public function index()
    {
        return view('export.international-school.index');
    }

    public function academictranscript()
    {
        return view('export.international-school.academic-transcript');
    }

    public function academictranscriptexport(UploadCSVISRequest $request)
    {
        $learningHours = Learninghour::all();
        $reader = Reader::createFromPath($request->csv, 'r');
        $reader->setHeaderOffset(0);
        $records = $reader->getRecords();
        $students = [];
        foreach($records as $record)
        {
            $newRecord = $record;
            $MainSubjects = [];
            foreach($record as $column => $data)
            {
                if(Str::contains($column, '.'))
                {
                     $MainSubjects[Str::after($column, '.')] = $data;
                     unset($newRecord[$column]);
                }
            }
            $newRecord["MainSubjects"] = $MainSubjects;
            array_push($students,$newRecord);
        }
        return view('export.international-school.output', compact('students','learningHours'));
    }

    public function downloadExample($file)
    {
        return response()->download(public_path()."/examples/$file");
    }
}
