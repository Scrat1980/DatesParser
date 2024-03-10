<?php
declare(strict_types=1);
class Parser
{
    const BREAK = 'перерыв';
    const DASH = '-';
    const FROM = 'с';
    const TO = 'до';
    private $validator;

    public function __construct()
    {
        $this->validator = new ParserValidator();
    }
    public function process($inputEntityTimetable): Entity
    {
        $this->validator->validate(
            $inputEntityTimetable,
            self::BREAK,
            self::DASH,
            self::FROM,
            self::TO
        );

        list($workDayTime, $lunchTime) = preg_split(
            '/' . self::BREAK . '/',
            $inputEntityTimetable
        );
        list($workDays, $workTime) = preg_split(
            '/' . ' ' . self::FROM . '/',
            $workDayTime
        );
        $workDayTo = null;
        preg_match('/' . self::DASH . '/', $workDays)
            ? list($workDayFrom, $workDayTo) = preg_split('/' . self::DASH . '/', $workDays)
            : $workDayFrom = $workDays
        ;
        list($workTimeFrom, $workTimeTo) = preg_split(
            '/' . self::TO . '/',
            $workTime
        );
        list(
            $workTimeFromHours,
            $workTimeFromMinutes
        ) = $this->splitTime($workTimeFrom);
        list(
            $workTimeToHours,
            $workTimeToMinutes
        ) = $this->splitTime($workTimeTo);

        list($lunchTimeFrom, $lunchTimeTo) = preg_split(
            '/' . self::TO . '/',
            $lunchTime
        );
        list(
            $lunchTimeFromHours,
            $lunchTimeFromMinutes
        ) = $this->splitTime($lunchTimeFrom);

        list(
            $lunchTimeToHours,
            $lunchTimeToMinutes
        ) = $this->splitTime($lunchTimeTo);

        try {
            $entity = new Entity(
                new EntityValidator(),
                new EntityFormatter(),
                new Printer(),
                new Day($workDayFrom),
                new Day($workDayTo),
                new Time($workTimeFromHours, $workTimeFromMinutes),
                new Time($workTimeToHours, $workTimeToMinutes),
                new Time($lunchTimeFromHours, $lunchTimeFromMinutes),
                new Time($lunchTimeToHours, $lunchTimeToMinutes)
            );
        } catch (Exception $e) {
            echo $e->getMessage();
            die;
        }


        return $entity;

    }

    /**
     * @param string $time
     * @return int[]
     */
    protected function splitTime(string $time): array
    {
        $twoDigitsFirst = preg_match(
            '/\d{2}\D\d{1,2}/',
            $time
        );

        if ($twoDigitsFirst) {
            preg_match_all(
                '/\d{2}/',
                $time,
                $timeArray
            );
            $minutes = (int) $timeArray[0][1];
        } else {
            preg_match_all(
                '/\d/',
                $time,
                $timeArray
            );
            $minutes = (int) ($timeArray[0][1] . $timeArray[0][2]);
        }
        $hours = (int) $timeArray[0][0];

        return [$hours, $minutes];
    }
}