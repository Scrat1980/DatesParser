<?php

class TimeValidator implements ITimeValidator
{
    public function validate(int $minutes, int $hours): bool
    {
        return
            $minutes >= 0
            && $minutes <= 60
            && $hours >= 0
            && $hours <= 24
        ;
    }
}