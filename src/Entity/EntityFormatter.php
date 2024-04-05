<?php
declare(strict_types=1);

namespace Simply\Entity;

use Simply\Day\Day;
use Simply\Time\Time;

class EntityFormatter implements IEntityFormatter
{
    public function format(
        Day  $startDay,
        Day  $endDay,
        Time $startTimeWork,
        Time $endTimeWork,
        Time $startTimeBreak,
        Time $endTimeBreak
    ): array
    {
        return [
            'wt' => [
                $startDay->name => [
                    'begin' => $startTimeWork->getFullTime(),
                    'end' => $endTimeWork->getFullTime()
                ],
            ],
            'ww' => [
                $startDay->name => [
                    'begin' => $startTimeBreak->getFullTime(),
                    'end' => $endTimeBreak->getFullTime(),
                ]
            ]

        ];
    }
}