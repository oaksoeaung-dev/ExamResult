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
        private function getColumnLetter($index): string
        {
            $index--;  // Adjust index to make 1 = A
            $column = '';
            while ($index >= 0) {
                $column = chr($index % 26 + 65) . $column;
                $index = intval($index / 26) - 1;
            }
            return $column;
        }

        private function getMergedCellCount($merged): int
        {
            $mergedCellCount = 0;

            list($startCell, $endCell) = explode(':', $merged);

            // Get the row and column numbers of the start and end cells
            $startCellCoordinates = Coordinate::coordinateFromString($startCell);
            $endCellCoordinates = Coordinate::coordinateFromString($endCell);

            $startColumn = Coordinate::columnIndexFromString($startCellCoordinates[0]);
            $startRow = $startCellCoordinates[1];
            $endColumn = Coordinate::columnIndexFromString($endCellCoordinates[0]);
            $endRow = $endCellCoordinates[1];

            // Calculate the number of cells in the merged range
            $cellCount = (($endColumn - $startColumn + 1) * ($endRow - $startRow + 1));
            $mergedCellCount += $cellCount;

            return $mergedCellCount;
        }

        private function getSortedMergedCells($mergedCells): array
        {
            $sortedMergedCells = [];
            foreach ($mergedCells as $range) {
                if (count(explode(":", $range)) == 2) {
                    list($startCell, $endCell) = explode(':', $range);
                    $startCoordinate = Coordinate::coordinateFromString($startCell);
                    $startColumnIndex = Coordinate::columnIndexFromString($startCoordinate[0]);

                    $sortedMergedCells[$startColumnIndex] = $range;
                } else {
                    $startCoordinate = Coordinate::coordinateFromString($range);
                    $startColumnIndex = Coordinate::columnIndexFromString($startCoordinate[0]);
                    $sortedMergedCells[$startColumnIndex] = $range;
                }
            }
            ksort($sortedMergedCells);
            return $sortedMergedCells;
        }

        private function isCellInMergedRange($mergedCells, $cell): bool
        {
            foreach ($mergedCells as $mergedCell) {
                if (Coordinate::coordinateIsInsideRange($mergedCell, $cell)) {
                    return true;
                }
            }
            return false;
        }

        private function getMergedCellsAndNonMergedCells($sheet, $fromRow)
        {

            $mergedCellsAndNonMergedCells = $sheet->getMergeCells();
            $highestColumn = $sheet->getHighestColumn();
            $highestColumnIndex = Coordinate::columnIndexFromString($highestColumn);

            //Add non-merged cell to merged-cell
            for ($col = 1; $col <= $highestColumnIndex; $col++) {
                if (!$this->isCellInMergedRange($mergedCellsAndNonMergedCells, $this->getColumnLetter($col) . $fromRow)) {
                    $mergedCellsAndNonMergedCells[$this->getColumnLetter($col) . "1"] = $this->getColumnLetter($col) . $fromRow;
                }

            }

            return $mergedCellsAndNonMergedCells;
        }

        public function index()
        {
            return view('export.internationalSchool.index');
        }

        public function academicTranscript()
        {
            return view('export.internationalSchool.academicTranscript.index');
        }

        public function academicTranscriptExport(UploadXLSXISRequest $request)
        {
            $grades = ["Kindergarten", "Primary 1", "Primary 2", "Primary 3", "Primary 4", "Primary 5", "Primary 6", "Secondary 1", "Secondary 2", "Secondary 3"];
            $programs = ["dual", "cpc", "cec"];
            $campuses = ["online", "oncampus"];
            $learningHours = Learninghour::all();

            /* Get and format data from Excel */
            $sheet = IOFactory::load($request->xlsx)->getActiveSheet();
            $highestRow = $sheet->getHighestRow();
            $sortedMergedCellsAndNonMergedCells = $this->getSortedMergedCells($this->getMergedCellsAndNonMergedCells($sheet, 1));
            $mainHeaders = [];
            $mappedMainAndSubHeaders = [];
            $students = [];
            foreach ($sortedMergedCellsAndNonMergedCells as $sortedMergedCellsAndNonMergedCell) {
                $mainHeaders[$sheet->getCell(explode(":", $sortedMergedCellsAndNonMergedCell)[0])->getValue()] = $sortedMergedCellsAndNonMergedCell;
            }
            $col = 1;
            foreach ($mainHeaders as $header => $columnCoordinate) {

                if (count(explode(":", $columnCoordinate)) == 2) {
                    for ($i = 1; $i <= $this->getMergedCellCount($columnCoordinate); $i++) {
                        $mappedMainAndSubHeaders[$header][] = $sheet->getCell($this->getColumnLetter($col) . "2")->getValue();
                        $col++;
                    }
                } else if (count(explode(":", $columnCoordinate)) == 1) {
                    $mappedMainAndSubHeaders[$header][] = $sheet->getCell($this->getColumnLetter($col) . "2")->getValue();
                    $col++;
                }
            }
            for ($row = 3; $row <= $highestRow; $row++) {
                $colStart = 1;
                $rowData = [];
                foreach ($mappedMainAndSubHeaders as $mainHeader => $subHeaders) {
                    if (strtolower($mainHeader) != "information" && strtolower($mainHeader) != "review" && strtolower($mainHeader) != "signs") {
                        foreach ($subHeaders as $subHeader) {
                            $cellValue = $sheet->getCell($this->getColumnLetter($colStart) . $row)->getValue();
                            $rowData["Subjects"][$mainHeader][$subHeader] = (Date::isDateTime($sheet->getCell($this->getColumnLetter($colStart) . $row))) ? Carbon::parse(Date::excelToDateTimeObject($cellValue))->format("d-M-Y") : trim($cellValue);
                            $colStart++;
                        }
                    } else {
                        foreach ($subHeaders as $subHeader) {
                            $cellValue = $sheet->getCell($this->getColumnLetter($colStart) . $row)->getValue();
                            $rowData[$mainHeader][$subHeader] = (Date::isDateTime($sheet->getCell($this->getColumnLetter($colStart) . $row))) ? Carbon::parse(Date::excelToDateTimeObject($cellValue))->format("d-M-Y") : trim($cellValue);
                            $colStart++;
                        }
                    }
                }
                $students[] = $rowData;
            }
            /* Get and format data from Excel */

            $errors = [];
            foreach ($students as $student) {
                if (isset($student["Information"])) {
                    if (isset($student["Information"]["Grade"])) {
                        if (!in_array($student["Information"]["Grade"], $grades)) {
                            $errors[] = "Values in the grade column are wrong. Click here to check the valid information for grade.";
                        }
                    } else {
                        $errors[] = "The grade column is missing.";
                    }

                    if (isset($student["Information"]["Program"])) {
                        if (!in_array($student["Information"]["Program"], $programs)) {
                            $errors[] = "Values in the program column are wrong. Click here to check the valid information for program.";
                        }
                    } else {
                        $errors[] = "The program column is missing.";
                    }

                    if (isset($student["Information"]["Campus"])) {
                        if (!in_array($student["Information"]["Campus"], $campuses)) {
                            $errors[] = "Values in the campus column are wrong. Click here to check the valid information for campus.";
                        }
                    } else {
                        $errors[] = "The campus column is missing.";
                    }
                } else {
                    $errors[] = "The information column is missing.";
                }


                if (!(count($student["Subjects"]) < 7 && isset($student["Subjects"]) && count($student["Subjects"]) != 1)) {
                    $errors[] = "Too many subjects";
                }
            }

            if (!empty($errors)) {
                return back()->withErrors($errors)->withInput();
            } else {
                return view('export.internationalSchool.academicTranscript.output', compact('students', 'learningHours'));
            }
        }

        public function cambridgeReportCard()
        {
            return view('export.internationalSchool.reportCard.cambridge.index');
        }

        public function cambridgeReportCardExport(UploadXLSXISRequest $request)
        {
            /* Get and format data from Excel */
            $spreadsheet = IOFactory::load($request->xlsx);
            $sheet = $spreadsheet->getActiveSheet();
            $highestRow = $sheet->getHighestRow();
            $sortedMergedCellsAndNonMergedCells = $this->getSortedMergedCells($this->getMergedCellsAndNonMergedCells($sheet, 1));
            $mainHeaders = [];
            $mappedMainAndSubHeaders = [];
            $students = [];
            foreach ($sortedMergedCellsAndNonMergedCells as $sortedMergedCellsAndNonMergedCell) {
                $mainHeaders[$sheet->getCell(explode(":", $sortedMergedCellsAndNonMergedCell)[0])->getValue()] = $sortedMergedCellsAndNonMergedCell;
            }
            $col = 1;
            foreach ($mainHeaders as $header => $columnCoordinate) {

                if (count(explode(":", $columnCoordinate)) == 2) {
                    for ($i = 1; $i <= $this->getMergedCellCount($columnCoordinate); $i++) {
                        $mappedMainAndSubHeaders[$header][] = $sheet->getCell($this->getColumnLetter($col) . "2")->getValue();
                        $col++;
                    }
                } else if (count(explode(":", $columnCoordinate)) == 1) {
                    $mappedMainAndSubHeaders[$header][] = $sheet->getCell($this->getColumnLetter($col) . "2")->getValue();
                    $col++;
                }
            }
            for ($row = 3; $row <= $highestRow; $row++) {
                $colStart = 1;
                $rowData = [];
                foreach ($mappedMainAndSubHeaders as $mainHeader => $subHeaders) {
                    if (strtolower($mainHeader) != "information" && strtolower($mainHeader) != "attendance" && strtolower($mainHeader) != "activity" && strtolower($mainHeader) != "behaviour" && strtolower($mainHeader) != "review" && strtolower($mainHeader) != "signs") {
                        foreach ($subHeaders as $subHeader) {
                            $cellValue = $sheet->getCell($this->getColumnLetter($colStart) . $row)->getValue();
                            $rowData["Subjects"][$mainHeader][$subHeader] = (Date::isDateTime($sheet->getCell($this->getColumnLetter($colStart) . $row))) ? Carbon::parse(Date::excelToDateTimeObject($cellValue))->format("d-M-Y") : trim($cellValue);
                            $colStart++;
                        }
                    } else {
                        foreach ($subHeaders as $subHeader) {
                            $cellValue = $sheet->getCell($this->getColumnLetter($colStart) . $row)->getValue();
                            $rowData[$mainHeader][$subHeader] = (Date::isDateTime($sheet->getCell($this->getColumnLetter($colStart) . $row))) ? Carbon::parse(Date::excelToDateTimeObject($cellValue))->format("d-M-Y") : trim($cellValue);
                            $colStart++;
                        }
                    }
                }
                $students[] = $rowData;
            }
            /* Get and format data from Excel */


            $errors = [];
            foreach ($students as $student) {
                if (array_key_exists("Information", $student)) {
                    $information = count($student["Information"]);
                    if ($information != 6) {
                        $errors[] = (6 - $information) == 1 ? "1 column missing in information." : 6 - $information . " columns missing in information.";
                    }
                } else {
                    $errors[] = "The information column is not set. If it is set, check the spelling.";
                }

                if(!array_key_exists("Attendance", $student)) {
                    $errors[] = "The attendance column is not set. If it is set, check the spelling.";
                }

                if(array_key_exists("Subjects", $student)) {
                    $subjects = count($student["Subjects"]);
                    if($subjects >= 8) {
                        $errors[] = "Too many subjects";
                    }
                }
                else{
                    $errors[] = "Subjects are missing.";
                }
            }
            if (!empty($errors)) {
                return back()->withErrors($errors)->withInput();
            } else {
                return view('export.internationalSchool.reportCard.cambridge.output', compact('students'));
            }
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
