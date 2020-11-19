<?php

declare(strict_types=1);

namespace MeinderA\Apache2LogsStats\App;

use Entities\EntityList;

class LogEntityList extends EntityList
{
    protected string $expectedType = LogEntity::class;

    public function sortByMostUsed(string $property): array
    {
        $data = [];
        foreach ($this->entities as $entity) {
            if (isset($data[$entity->$property])) {
                $data[$entity->$property]['amount'] += 1;
            } else {
                $data[$entity->$property]['amount'] = 1;
            }

            $data[$entity->$property][] = $entity;
        }

        usort($data, function($a, $b) {
            return $a['amount'] <=> $b['amount'];
        });

        return array_reverse($data);
    }
}