<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadCSVISRequest;
use App\Models\Learninghour;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use League\Csv\Reader;
use League\Csv\Statement;

class InternationalSchoolExportController extends Controller
{
    public function index()
    {
        return view('export.international-school.index');
    }

    public function academictranscript()
    {
        return view('export.international-school.academic-transcript.index');
    }

    public function academictranscriptexport(UploadCSVISRequest $request)
    {
        $learningHours = Learninghour::all();
        $reader = Reader::createFromPath($request->csv, 'r');
        $reader->setHeaderOffset(0);
        $records = $reader->getRecords();
        $students = [];
        foreach ($records as $record) {
            $newRecord = $record;
            $MainSubjects = [];
            foreach ($record as $column => $data) {
                if (Str::contains($column, '.')) {
                    $MainSubjects[Str::after($column, '.')] = $data;
                    unset($newRecord[$column]);
                }
            }
            $newRecord["MainSubjects"] = $MainSubjects;
            array_push($students, $newRecord);
        }
        return view('export.international-school.academic-transcript.output', compact('students', 'learningHours'));
    }

    public function reportcard()
    {
        return view('export.international-school.report-card.index');
    }
    public function reportcardExport(UploadCSVISRequest $request)
    {

        $reader = Reader::createFromPath($request->csv, 'r');
        $reader->setHeaderOffset(0);
        $records = $reader->getRecords();
        $students = [];

        foreach ($records as $record) {
            $newRecord = [];
            foreach ($record as $header => $data) {
                if (Str::contains($header, '.')) {
                    if (count(Str::of($header)->explode(".")) == 3) {
                        $newRecord[Str::of($header)->explode(".")[0]][Str::of($header)->explode(".")[1]][Str::of($header)->explode(".")[2]] = $data;
                    } elseif (count(Str::of($header)->explode(".")) == 2) {
                        $newRecord[Str::before($header, '.')][Str::after($header, '.')] = $data;
                    }
                } else {
                    abort("500");
                }
            }
            array_push($students, $newRecord);
        }
        return view('export.international-school.report-card.output', compact('students'));
    }

    public function downloadExample($file)
    {
        return response()->download(public_path() . "/examples/$file");
    }
}
