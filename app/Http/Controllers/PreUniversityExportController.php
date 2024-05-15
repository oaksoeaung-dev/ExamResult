<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadCSVPreUniRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use League\Csv\Reader;

class PreUniversityExportController extends Controller
{
    public function index()
    {
        return view('export.pre-university.index');
    }

    public function reportcard()
    {
        return view('export.pre-university.reportcard');
    }

    public function reportcardExport(UploadCSVPreUniRequest $request)
    {
        $reader = Reader::createFromPath($request->csv, 'r');
        $reader->setHeaderOffset(0);
        $records = $reader->getRecords();
        $students = [];
        $marks = $request->marks;

        foreach($records as $record)
        {
            $newRecord = $record;
            $subjects = [];
            $months = [];
            $behaviour = [];
            foreach($record as $column => $data)
            {
                if(Str::contains($column, '.'))
                {
                    if(Str::before($column,'.') == "Subject")
                    {
                        $subjects[Str::after($column, '.')] = $data;
                    }
                    elseif(Str::before($column, '.') == "Month")
                    {
                        $months[Str::after($column, '.')] = $data;
                    }
                    elseif(Str::before($column, '.') == "Behaviour")
                    {
                        $behaviour[Str::after($column, '.')] = $data;
                    }
                    unset($newRecord[$column]);
                }
            }
            $newRecord["subjects"] = $subjects;
            $newRecord["months"] = $months;
            $newRecord["behaviour"] = $behaviour;
            array_push($students,$newRecord);
        }

        return view('export.pre-university.output',compact('students','marks'));
    }
}
