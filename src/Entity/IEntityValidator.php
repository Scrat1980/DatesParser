<?php
declare(strict_types=1);

namespace Simply\Entity;

use Simply\Day\Day;
use Simply\Time\Time;

interface IEntityValidator
{
    public function validate(
        Day  $startDay,
        Day  $endDay,
        Time $startTimeWork,
        Time $endTimeWork,
        Time $startTimeBreak,
        Time $endTimeBreak
    ): bool;
}