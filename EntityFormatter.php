<?php

class EntityFormatter implements IEntityFormatter
{
    public function format(
        Day $startDay,
        Day $endDay,
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