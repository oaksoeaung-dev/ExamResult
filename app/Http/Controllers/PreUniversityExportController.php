<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadCSVISRequest;
use App\Http\Requests\UploadCSVPreUniRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use League\Csv\Reader;

class PreUniversityExportController extends Controller
{
    public function index()
    {
        return view('export.preUniversity.index');
    }

    public function reportCard()
    {
        return view('export.preUniversity.reportCard.index');
    }

    public function reportCardExport(UploadCSVPreUniRequest $request)
    {
        $reader = Reader::createFromPath($request->csv, 'r');
        $reader->setHeaderOffset(0);
        $records = $reader->getRecords();
        $students = [];
        $marks = $request->marks;
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

        return view('export.preUniversity.reportCard.output', compact('students', 'marks'));
    }

    public function certificate()
    {
        return view('export.preUniversity.certificate.index');
    }

    public function certificateExport(UploadCSVISRequest $request)
    {
        $reader = Reader::createFromPath($request->csv, 'r');
        $reader->setHeaderOffset(0);
        $records = $reader->getRecords();
        $students = [];
        foreach ($records as $record) {
            $newRecord = [];

            foreach ($record as $header => $data) {
                $newRecord[$header] = $data;
            }
            array_push($students, $newRecord);
        }
        return view('export.preUniversity.certificate.output', compact('students'));
    }

    public function downloadExample($file)
    {
        return response()->download(public_path() . "/examples/$file");
    }
}
