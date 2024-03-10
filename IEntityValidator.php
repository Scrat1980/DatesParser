<?php
declare(strict_types=1);

interface IEntityValidator
{
    public function validate(
        Day $startDay,
        Day $endDay,
        Time $startTimeWork,
        Time $endTimeWork,
        Time $startTimeBreak,
        Time $endTimeBreak
    ): bool;
}