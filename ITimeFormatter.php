<?php
declare(strict_types=1);

interface ITimeFormatter
{
    public function format(int $hours, int $minutes): string;
}