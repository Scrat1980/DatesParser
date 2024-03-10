<?php
declare(strict_types=1);

interface IEntityFormatter
{
    public function format(
        Day $startDay,
        Day $endDay,
        Time $startTimeWork,
        Time $endTimeWork,
        Time $startTimeBreak,
        Time $endTimeBreak
    ): array;
}