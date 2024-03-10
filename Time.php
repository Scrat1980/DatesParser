<?php
declare(strict_types=1);
class Time
{
    private ITimeValidator $validator;
    private ITimeFormatter $formatter;
    private int $hours;
    private int $minutes;

    /**
     * @param int $hours
     * @param int $minutes
     * @throws Exception
     */
    public function __construct(int $hours, int $minutes)
    {
        $this->validator = new TimeValidator();
        if (! $this->validator->validate($minutes, $hours)) {
            throw new Exception('Trying to create a wrong time object');
        }
        $this->formatter = new TimeFormatter();
        $this->hours = $hours;
        $this->minutes = $minutes;
    }

    public function getFullTime(): string
    {
        return $this->formatter->format(
            $this->hours,
            $this->minutes
        );
    }
}