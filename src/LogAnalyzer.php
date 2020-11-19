<?php

declare(strict_types=1);

namespace MeinderA\Apache2LogsStats\App;

class LogAnalyzer
{
    protected LogEntityList $logEntityList;

    public function __construct(LogEntityList $logEntityList)
    {
        $this->logEntityList = $logEntityList;
    }

    public function getMostUsedEndpoints(): array
    {
        return $this->logEntityList->sortByMostUsed('endpoint');
    }
}