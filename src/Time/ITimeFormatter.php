<?php
declare(strict_types=1);

namespace Simply\Time;
interface ITimeFormatter
{
    public function format(int $hours, int $minutes): string;
}