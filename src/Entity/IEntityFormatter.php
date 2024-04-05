<?php
declare(strict_types=1);

namespace Simply\Entity;

use Simply\Day\Day;
use Simply\Time\Time;

interface IEntityFormatter
{
    public function format(
        Day  $startDay,
        Day  $endDay,
        Time $startTimeWork,
        Time $endTimeWork,
        Time $startTimeBreak,
        Time $endTimeBreak
    ): array;
}