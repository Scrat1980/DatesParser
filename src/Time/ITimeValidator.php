<?php
declare(strict_types=1);

namespace Simply\Time;
interface ITimeValidator
{
    public function validate(int $minutes, int $hours): bool;
}