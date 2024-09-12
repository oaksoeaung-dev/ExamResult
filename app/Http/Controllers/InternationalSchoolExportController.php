<?php

    namespace App\Http\Controllers;

    use App\Http\Requests\UploadCSVISRequest;
    use App\Http\Requests\UploadXLSXISRequest;
    use App\Models\Learninghour;
    use Carbon\Carbon;
    use Illuminate\Http\Request;
    use Illuminate\Support\Arr;
    use Illuminate\Support\Facades\File;
    use Illuminate\Support\Facades\Storage;
    use Illuminate\Support\Str;
    use League\Csv\Reader;
    use League\Csv\Statement;
    use PhpOffice\PhpSpreadsheet\IOFactory;
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Style\Alignment;
    use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
    use PhpOffice\PhpSpreadsheet\Shared\Date;

    class InternationalSchoolExportController extends Controller
    {
        private function getColumnLetter($index)
        {
            $column = '';
            while ($index >= 0) {
                $column = chr($index % 26 + 65) . $column;
                $index = intval($index / 26) - 1;
            }
            return $column;
        }

        public function index()
        {
            return view('export.internationalSchool.index');
        }

        public function academicTranscript()
        {
            return view('export.internationalSchool.academicTranscript.index');
        }

        public function academicTranscriptExport(UploadCSVISRequest $request)
        {
            $learningHours = Learninghour::all();
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
            // dd($students);
            return view('export.internationalSchool.academicTranscript.output', compact('students', 'learningHours'));
        }

        public function cambridgeReportCard()
        {
            return view('export.internationalSchool.reportCard.cambridge.index');
        }

        public function cambridgeReportCardExport(UploadXLSXISRequest $request)
        {
            $spreadsheet = IOFactory::load($request->xlsx);
            $worksheet = $spreadsheet->getActiveSheet();

            // Get merged cells from the first row
            $mergedCells = $worksheet->getMergeCells();


            $sortedRanges = [];

            // Iterate over merged cells and map the starting column to its range
            foreach ($mergedCells as $range) {
                list($startCell, $endCell) = explode(':', $range);
                $startCoordinate = Coordinate::coordinateFromString($startCell);
                $startColumnIndex = Coordinate::columnIndexFromString($startCoordinate[0]);

                // Store the range by its starting column index
                $sortedRanges[$startColumnIndex] = $range;
            }

            // Sort the merged ranges by their starting column index
            ksort($sortedRanges);


            // Get the headers from the second row
            $secondRow = 2;
            //$highestColumn = $worksheet->getHighestColumn();
            $highestColumnIndex = Coordinate::columnIndexFromString($worksheet->getHighestColumn());
            $headers = [];
            for ($i = 0; $i < $highestColumnIndex; $i++) {
                $headers[$this->getColumnLetter($i)] = $worksheet->getCell($this->getColumnLetter($i) . $secondRow)->getValue();
            }

            $mergedHeaderMapping = [];

            $columnIndex = 1;
            foreach ($sortedRanges as $range) {

                list($startCell, $endCell) = explode(':', $range);

                $startCoordinate = Coordinate::coordinateFromString($startCell);
                $endCoordinate = Coordinate::coordinateFromString($endCell);

                $startColumnIndex = Coordinate::columnIndexFromString($startCoordinate[0]);
                $endColumnIndex = Coordinate::columnIndexFromString($endCoordinate[0]);

                $startRow = $startCoordinate[1];
                $endRow = $endCoordinate[1];

                $numColumns = $endColumnIndex - $startColumnIndex + 1;
                $numRows = $endRow - $startRow + 1;
                $totalMergedCells = $numColumns * $numRows;

                // Get merged header value (from the top-left corner of the range)
                $mergedHeaderValue = $worksheet->getCell($startCell)->getValue();
                // Collect headers in the second row that fall within the merged range
                $mergedHeaderMapping[$mergedHeaderValue] = [];

                //$colIndex = $startCoordinate[0]; $colIndex <= $endCoordinate[0]; $colIndex++
                for ($count = 0; $count < $totalMergedCells; $count++) {

                    $colLetter = Coordinate::stringFromColumnIndex($columnIndex);
                    if (isset($headers[$colLetter])) {
                        $mergedHeaderMapping[$mergedHeaderValue][] = $headers[$colLetter];
                    }
                    $columnIndex++;
                }
            }

            $highestRow = $worksheet->getHighestRow();
            $students = [];

            // Start from the first data row (after headers)
            $dataStartRow = $secondRow + 1;

            for ($row = $dataStartRow; $row <= $highestRow; $row++) {
                $col = 0;
                $rowData = [];
                foreach ($mergedHeaderMapping as $mergedHeader => $columns) {
                    if(strtolower($mergedHeader) != "information" && strtolower($mergedHeader) != "attendance" && strtolower($mergedHeader) != "activity" && strtolower($mergedHeader) != "behaviour" && strtolower($mergedHeader) != "review")
                    {
                        foreach ($columns as $column) {
                            $cellValue = $worksheet->getCell($this->getColumnLetter($col) . $row)->getValue();
                            $rowData["Subjects"][$mergedHeader][$column] = (Date::isDateTime($worksheet->getCell($this->getColumnLetter($col) . $row))) ? Carbon::parse(Date::excelToDateTimeObject($cellValue))->format("d-M-Y") : trim($cellValue);
                            $col++;
                        }
                    }
                    else{
                        foreach ($columns as $column) {
                            $cellValue = $worksheet->getCell($this->getColumnLetter($col) . $row)->getValue();
                            $rowData[$mergedHeader][$column] = (Date::isDateTime($worksheet->getCell($this->getColumnLetter($col) . $row))) ? Carbon::parse(Date::excelToDateTimeObject($cellValue))->format("d-M-Y") : trim($cellValue);
                            $col++;
                        }
                    }
                }
                $students[] = $rowData;
            }

            //$data[0]["Informations"]["Date"]

            //$reader = Reader::createFromPath($request->csv, 'r');
            //$reader->setHeaderOffset(0);
            //$records = $reader->getRecords();
            //$students = [];
            //
            //foreach ($records as $record) {
            //    dd($record);
            //    $newRecord = [];
            //    foreach ($record as $header => $data) {
            //        if (Str::contains($header, '.')) {
            //            if (count(Str::of($header)->explode(".")) == 3) {
            //                $newRecord[Str::of($header)->explode(".")[0]][Str::of($header)->explode(".")[1]][Str::of($header)->explode(".")[2]] = $data;
            //            } elseif (count(Str::of($header)->explode(".")) == 2) {
            //                $newRecord[Str::before($header, '.')][Str::after($header, '.')] = $data;
            //            }
            //        } else {
            //            abort("500");
            //        }
            //    }
            //    array_push($students, $newRecord);
            //}
            return view('export.internationalSchool.reportCard.cambridge.output', compact('students'));
        }

        public function governmentReportcard()
        {
            return view('export.internationalSchool.reportCard.government.index');
        }

        public function governmentReportCardExport(UploadCSVISRequest $request)
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
            return view('export.internationalSchool.reportCard.government.output', compact('students'));
        }

        public function downloadExample($file)
        {
            return response()->download(public_path() . "/examples/$file");
        }
    }
