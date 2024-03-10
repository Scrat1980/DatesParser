<?php
declare(strict_types=1);
class EntityValidator implements IEntityValidator
{
    private array $orderedDays;
    public function __construct()
    {
        $this->orderedDays = (new WeekDays())->weekDays;
    }

    /**
     * @param Day $startDay
     * @param Day $endDay
     * @param Time $startTimeWork
     * @param Time $endTimeWork
     * @param Time $startTimeBreak
     * @param Time $endTimeBreak
     * @return bool
     * @throws Exception
     */
    public function validate(Day $startDay, Day $endDay, Time $startTimeWork, Time $endTimeWork, Time $startTimeBreak, Time $endTimeBreak): bool
    {
        if (
            array_search($startDay->name, $this->orderedDays) >
            array_search($endDay->name, $this->orderedDays)
        ) {
            throw new Exception('Trying to create entity with end day earlier than start day');
        }

        //todo: validate if days and hours go in right order (e.g.
        // 10:00 - 20:00, not 20:00 - 10:00)

        return true;
    }
}