<?php

namespace Mpr\Logs;

use CodeIgniter\Files\Exceptions\FileNotFoundException;
use CodeIgniter\Files\File;
use CodeIgniter\Files\FileCollection;
use CodeIgniter\I18n\Time;
use Config\Logger;
use InvalidArgumentException;
use Mpr\Logs\Class\LogData;
use SplFileObject;

class ErrorLogs
{
    protected $dateFormat   = 'Y-m-d H:i:s';
    private array $keywords = [
        'CRITICAL',
        'ALERT',
        'EMERGENCY',
        'DEBUG',
        'ERROR',
        'INFO',
        'NOTICE',
        'WARNING',
    ];
    private array $entries;

    public function __construct()
    {
        $array = config(Logger::class)->handlers['CodeIgniter\Log\Handlers\FileHandler']['handles'];

        foreach ($array as $index => $keyword) {
            $array[$index] = strtoupper($keyword);
        }
        $this->keywords = $array;
        $this->entries  = [];
    }

    protected function setEntries(array $logEntries)
    {
        $this->entries = $logEntries;
    }

    public function getLogDatesArray(?string $order = 'desc'): array
    {
        $fileCollection = new FileCollection();
        $fileCollection->addDirectory(WRITEPATH . 'logs')->retainPattern('#log-[0-9\-]+\.log#');

        $fileArray = $fileCollection->get();
        // Sorting
        if ($order === 'asc') {
            sort($fileArray, SORT_STRING);
        } elseif ($order === 'desc') {
            rsort($fileArray, SORT_STRING);
        }

        foreach ($fileArray as $index => $filePath) {
            $fileArray[$index] = str_replace(['log-', '.log'], '', basename($filePath));
        }

        return $fileArray;
    }

    /**
     * Get all log entries from specified date.
     *
     * @param string $dateString Gets Time::parse()'ed. Possibilities: 'today', 'first day of december'.
     * @param ?array $typeArray  Array of types in uppercase, like 'CRITICAL', 'WARNING', etc or all if omitted.
     *
     * @return ErrorLogs|null
     *
     * @throws InvalidArgumentException
     * @see https://www.php.net/manual/en/datetime.formats.php
     */
    public function getLogByDate(string $dateString, ?array $typeArray = null)
    {
        /* TIMINGS:
        - Single file processing duration: 0.89ms
        - 7 files processing duration:     1,384.75ms
        - All files processing duration:   Fatal error (exhausted memory)
        ===> Process a single file at a time. */
        if ($typeArray !== null) {
            if (! empty(array_diff($typeArray, $this->keywords))) {
                throw new InvalidArgumentException('$typeArray argument contains invalid keywords');
            }
        }

        $dateObject = Time::parse($dateString);
        $date       = $dateObject->toDateString();

        try {
            $file = new File(WRITEPATH . 'logs/log-' . $date . '.log', true);
            if ($file->isReadable()) {
                $currentFile = $file->openFile('r');

                $logEntries = $this->getFileContent($currentFile);

                if ($typeArray !== null) {
                    // Remove entries not present in $typeArray
                    foreach ($logEntries as $index => $logData) {
                        if (! in_array($logData->type, $typeArray, true)) {
                            unset($logEntries[$index]);
                        }
                    }
                }

                $this->setEntries($logEntries);

                return $this;
            }

            return $this;
        } catch (FileNotFoundException $ex) {
            log_message('critical', '[CRITICAL] {exception}', ['exception' => $ex]);

            return $this;
        }
    }

    private function getFileContent(SplFileObject $file): array
    {
        // If no keyword was provided, take the whole array
        $keywords         = $this->keywords;
        $logObjects       = [];
        $currentLogObject = null;

        while (! $file->eof()) {
            $line  = $file->fgets();
            $words = explode(' ', $line);
            // @phpstan-ignore nullCoalesce.offset
            $firstWord = $words[0] ?? '';
            $timeWord  = trim(($words[2] ?? '') . ' ' . ($words[3] ?? ''), ' ');

            // See if we found a special word
            if (in_array($firstWord, $keywords, true)) {
                // If we have an existing object, store it
                if ($currentLogObject) {
                    $logObjects[] = $currentLogObject;
                }

                // Create a new object
                $currentLogObject = new LogData($firstWord, $timeWord);
            } elseif ($currentLogObject === null) {
                // We didn't find a special word, so we make sure somthing exists to stash the line.
                $currentLogObject = LogData::createMissingParentHolder();
            }

            // No matter what happens above, stash the line, except it's empty.
            if (! empty($line)) {
                $currentLogObject->lines[] = $line;
            }
        }
        // At the end of the loop, make sure to store the last object.
        if ($currentLogObject) {
            $logObjects[] = $currentLogObject;
        }

        return $logObjects;
    }

    public function sort(string $property, ?string $order = 'desc'): ?array
    {
        $logEntries = $this->entries;

        if (empty($logEntries)) {
            return null;
        }

        usort($logEntries, static function ($a, $b) use ($order, $property) {
            if ($order === 'desc') {
                return $b->{$property} <=> $a->{$property};
            }
            if ($order === 'asc') {
                return $a->{$property} <=> $b->{$property};
            }

            return 0;
        });

        return $logEntries;
    }
}
