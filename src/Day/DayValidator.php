<?php
declare(strict_types=1);

namespace Simply\Day;

use Simply\Parser\WeekDays;

class DayValidator
{
    private array $validNames;

    public function __construct()
    {
        $this->validNames = (new WeekDays())->weekDays;
    }

    public function validate(string $name): bool
    {
        return in_array($name, $this->validNames);
    }
}