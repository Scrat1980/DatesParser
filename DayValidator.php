<?php
declare(strict_types=1);
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