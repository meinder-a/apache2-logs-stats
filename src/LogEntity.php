<?php

declare(strict_types=1);

namespace MeinderA\Apache2LogsStats\App;

use Entities\Entity;

class LogEntity extends Entity
{
    public $endpoint;
    public $method;
    public $status;
    public $userAgent;
}