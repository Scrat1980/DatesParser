<?php
declare(strict_types=1);
class ParserValidator
{
    public array $validDays;

    public function __construct()
    {
        $this->validDays = (new WeekDays())->weekDays;
    }
    public function validate(
        string $timetable,
        string $break,
        string $dash,
        string $from,
        string $to
    ): bool
    {
        $days = '(' . implode('|', $this->validDays) . ')';
        $hour = '\d{1,2}\D\d{2}';
        $hours = '\D?' . $from . '\D+' . $hour . '\D+' . $to . '\D+' . $hour;
        $pattern = '/'
            . $days . $dash . '?' . $days . '?'
            . ' '
            . $hours . '\D+' . $break . $hours
            . '/u'
        ;

        try {
            if (! preg_match($pattern, $timetable)) {
                throw new Exception('Input data invalid');
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            die;
        }

        return true;
    }
}