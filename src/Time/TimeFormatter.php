<?php
declare(strict_types=1);

namespace Simply\Time;

class TimeFormatter implements ITimeFormatter
{
    const SEPARATOR = ':';

    public function format(int $hours, int $minutes): string
    {
        $hours = $hours < 10 ? '0' . (string)$hours : $hours;
        $minutes = $minutes < 10 ? '0' . (string)$minutes : $minutes;

        return (string)$hours . self::SEPARATOR . (string)$minutes;

    }
}