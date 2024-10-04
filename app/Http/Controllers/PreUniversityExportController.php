<?php

    namespace App\Http\Controllers;

    use App\Http\Requests\UploadCSVISRequest;
    use App\Http\Requests\UploadCSVPreUniRequest;
    use App\Http\Requests\UploadXLSXPreUniRequest;
    use Carbon\Carbon;
    use Illuminate\Http\Request;
    use Illuminate\Support\Str;
    use League\Csv\Reader;
    use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
    use PhpOffice\PhpSpreadsheet\IOFactory;
    use PhpOffice\PhpSpreadsheet\Shared\Date;

    class PreUniversityExportController extends Controller
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
            for ($col = 1; $col < $highestColumnIndex; $col++) {
                if (!$this->isCellInMergedRange($mergedCellsAndNonMergedCells, $this->getColumnLetter($col) . $fromRow)) {
                    $mergedCellsAndNonMergedCells[$this->getColumnLetter($col) . "1"] = $this->getColumnLetter($col) . $fromRow;
                }

            }
            return $mergedCellsAndNonMergedCells;
        }

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
            foreach ($records as $record) {
                $newRecord = [];

                foreach ($record as $header => $data) {
                    if (Str::contains($header, '.')) {
                        $explodedHeader = Str::of($header)->explode(".");
                        if (count($explodedHeader) == 3) {
                            $newRecord[$explodedHeader[0]][$explodedHeader[1]][$explodedHeader[2]] = $data;
                        } elseif (count($explodedHeader) == 2) {
                            $newRecord[Str::before($header, '.')][Str::after($header, '.')] = $data;
                        }
                    } else {
                        abort("500");
                    }
                }
                array_push($students, $newRecord);
            }
            return view('export.preUniversity.reportCard.output', compact('students'));
        }

        public function certificate()
        {
            return view('export.preUniversity.certificate.index');
        }

        public function certificateExport(UploadXLSXPreUniRequest $request)
        {
            /*$reader = Reader::createFromPath($request->csv, 'r');
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
            return view('export.preUniversity.certificate.output', compact('students'));*/

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

                    foreach ($subHeaders as $subHeader) {
                        $cellValue = $sheet->getCell($this->getColumnLetter($colStart) . $row)->getValue();
                        $rowData[$mainHeader][$subHeader] = (Date::isDateTime($sheet->getCell($this->getColumnLetter($colStart) . $row))) ? Carbon::parse(Date::excelToDateTimeObject($cellValue))->format("d-M-Y") : trim($cellValue);
                        $colStart++;
                    }

                }
                $students[] = $rowData;
            }
            /* Get and format data from Excel */
            return view('export.preUniversity.certificate.output', compact('students'));
        }

        public function downloadExample($file)
        {
            return response()->download(public_path() . "/examples/$file");
        }
    }
