<?php

namespace App\Libraries;

use CodeIgniter\Language\Language;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class LanguageExcelLibrary
{
    public const HEADER_ROW   = 1;
    public const HEADER_COL   = 1;
    public const FILL_HEADER  = 'FF7EBDFF';
    public const FILL_FILEROW = 'FF79C5C0';
    public const FILL_LANGCOL = 'FFB6EDE8';

    public function outputExcel(array $langMap)
    {
        $spreadsheet = new Spreadsheet();

        // delete the default active sheet
        $spreadsheet->removeSheetByIndex(0);

        // Create "Language Strings" tab as the first worksheet.
        $worksheet = new Worksheet($spreadsheet, 'Language Strings');
        $spreadsheet->addSheet($worksheet, 0);
        $spreadsheet->setActiveSheetIndex(0);
        $activeSheet = $spreadsheet->getActiveSheet();

        // Number of keys in langMap plus header-col
        $numCols = count($langMap) + 1;

        // First two columns
        $activeSheet->setCellValue([self::HEADER_COL, self::HEADER_ROW], 'Language');
        $activeSheet->setCellValue([self::HEADER_COL + 1, self::HEADER_ROW], 'en');
        $this->styleHeaderRow($spreadsheet, $numCols, self::HEADER_ROW);

        $rowStartIndex = 3;
        // Print header col and english col
        $this->printBaseLang($spreadsheet, $langMap, $numCols, $rowStartIndex);
        unset($langMap['en']);

        // Print the remaining columns
        $colStartIndex  = self::HEADER_COL + 2;
        $rowLastIndex   = $worksheet->getHighestDataRow('A');
        $headerColArray = [];

        for ($row = $rowStartIndex; $row <= $rowLastIndex; $row++) {
            $headerColArray[$row] = $worksheet->getCell('A' . $row)->getValue();
        }

        $this->printAdditionalLangs($spreadsheet, $langMap, $headerColArray, $colStartIndex);

        // Global Styles
        $spreadsheet->getDefaultStyle()->getAlignment()->setVertical(Alignment::VERTICAL_TOP);

        // Set width
        foreach ($activeSheet->getColumnIterator() as $column) {
            if ($column->getColumnIndex() === 'A') {
                $worksheet->getColumnDimension($column->getColumnIndex())->setWidth(40);
            } else {
                $worksheet->getColumnDimension($column->getColumnIndex())->setWidth(75);
            }
        }

        // Output
        $filename = 'AC_Leaflet-Language_Strings.xlsx';

        ob_end_clean();

        // Redirect output to a client's web browser (Xlsx)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename);
        header('Cache-Control: max-age=0');

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');

        exit;
    }

    protected function printBaseLang(Spreadsheet $spreadsheet, array $langMap, $numCols, $rowStartIndex)
    {
        helper('array');
        $activeSheet = $spreadsheet->getActiveSheet();
        $_rowIndex   = $rowStartIndex;

        foreach ($langMap['en'] as $file) {
            // Write filename
            $activeSheet->setCellValue([self::HEADER_COL, $_rowIndex], '// ' . basename($file, '.php'));
            $this->styleFileRow($spreadsheet, $numCols, $_rowIndex);
            $_rowIndex++;
            $array     = $this->requireFile($file);
            $langArray = array_flatten_with_dots($array, basename($file, 'php'));

            foreach ($langArray as $key => $value) {
                $activeSheet->setCellValue([self::HEADER_COL, $_rowIndex], trim($key));
                $activeSheet->setCellValue([self::HEADER_COL + 1, $_rowIndex], trim($value));

                $this->styleLangRow($spreadsheet, $numCols, $_rowIndex);
                $_rowIndex++;
            }
        }
    }

    protected function printAdditionalLangs(
        Spreadsheet $spreadsheet,
        array $langMap,
        array $headerColArray,
        int $colStartIndex,
    ) {
        helper('array');
        $activeSheet = $spreadsheet->getActiveSheet();
        $_colIndex   = $colStartIndex;

        foreach ($langMap as $langName => $array) {
            $activeSheet->setCellValue([$colStartIndex, self::HEADER_ROW], $langName);

            foreach ($array as $file) {
                $array     = $this->requireFile($file);
                $langArray = array_flatten_with_dots($array, basename($file, 'php'));

                foreach ($langArray as $key => $value) {
                    $foundRowIndex = array_search($key, $headerColArray, true);
                    if ($foundRowIndex) {
                        $activeSheet->setCellValue([$_colIndex, $foundRowIndex], trim($value));
                    }
                }
            }
            // Next language
            $_colIndex++;
        }
    }

    protected function styleHeaderRow(Spreadsheet $spreadsheet, int $numCols, int $rowIndex)
    {
        $styleArray = [
            'font' => [
                'bold' => true,
                'size' => 16,
            ],
            'borders' => [
                'bottom' => [
                    'borderStyle' => Border::BORDER_THICK,
                ],
            ],
            'fill' => [
                'fillType'   => Fill::FILL_SOLID,
                'startColor' => [
                    'argb' => self::FILL_HEADER,
                ],
                'endColor' => [
                    'argb' => self::FILL_HEADER,
                ],
            ],
        ];
        $spreadsheet->getActiveSheet()->getStyle([1, $rowIndex, $numCols, $rowIndex])->applyFromArray($styleArray);
    }

    protected function styleFileRow(Spreadsheet $spreadsheet, int $numCols, int $rowIndex)
    {
        $styleArray = [
            'font' => [
                'bold' => true,
            ],
            'borders' => [
                'bottom' => [
                    'borderStyle' => Border::BORDER_THIN,
                ],
            ],
            'fill' => [
                'fillType'   => Fill::FILL_SOLID,
                'startColor' => [
                    'argb' => self::FILL_FILEROW,
                ],
                'endColor' => [
                    'argb' => self::FILL_FILEROW,
                ],
            ],
        ];
        $spreadsheet->getActiveSheet()->getStyle([1, $rowIndex, $numCols, $rowIndex])->applyFromArray($styleArray);
    }

    protected function styleLangRow(Spreadsheet $spreadsheet, int $numCols, int $rowIndex)
    {
        $styleArray = [
            'alignment' => [
                'wrapText' => true,
            ],
        ];
        $spreadsheet->getActiveSheet()->getStyle([2, $rowIndex, $numCols, $rowIndex])->applyFromArray($styleArray);
        $styleArray = [
            'fill' => [
                'fillType'   => Fill::FILL_SOLID,
                'startColor' => [
                    'argb' => self::FILL_LANGCOL,
                ],
                'endColor' => [
                    'argb' => self::FILL_LANGCOL,
                ],
            ],
        ];
        $spreadsheet->getActiveSheet()->getStyle([1, $rowIndex])->applyFromArray($styleArray);
    }

    /**
     * A simple method for including files that can be
     * overridden during testing.
     */
    protected function requireFile(string $path): array
    {
        $strings[] = require $path;

        if (isset($strings[0])) {
            $strings = $strings[0];
        }

        return $strings;
    }
}
