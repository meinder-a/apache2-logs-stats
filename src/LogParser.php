<?php

declare(strict_types=1);

namespace MeinderA\Apache2LogsStats\App;

use Exception;

class LogParser
{
    public string $pattern = '(.*?)\ (.*?)\ (.*?)\ \[(.*?)\]\ \"(.*?)\ (.*?)\ (.*?)\"\ (.*?)\ (.*?)\ \"(.*?)\" \"(.*?)\"';
    
    public function parse(string $filePath): LogEntityList
    {
        if (! is_file($filePath)) {
            throw new Exception("File $filePath not found!");
        }

        $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        $data = [];
        foreach ($lines as $line) {
            preg_match('/' . $this->pattern . '/s', $line, $matches);
            array_splice($matches, 0, 1);

            $data[] = new LogEntity([
                'endpoint' => $matches[5],
                'method' => $matches[4],
                'status' => $matches[7],
                'userAgent' => $matches[10]
            ]);
        }

        return new LogEntityList($data);
    }
}