<?php
declare(strict_types=1);

interface ITimeValidator
{
    public function validate(int $minutes, int $hours): bool;
}