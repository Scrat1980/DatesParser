<?php
declare(strict_types=1);
class Entity
{
    private IEntityValidator $entityValidator;
    private IEntityFormatter $entityFormatter;
    private IPrinter $entityPrinter;
    public Day $startDay;
    public Day $endDay;
    public Time $startTimeWork;
    public Time $endTimeWork;
    public Time $startTimeBreak;
    public Time $endTimeBreak;

    /**
     * @param Day $startDay
     * @param Day $endDay
     * @param Time $startTimeWork
     * @param Time $endTimeWork
     * @param Time $startTimeBreak
     * @param Time $endTimeBreak
     * @throws Exception
     */
    public function __construct(
        IEntityValidator $entityValidator,
        IEntityFormatter $entityFormatter,
        IPrinter $printer,
        Day $startDay,
        Day $endDay,
        Time $startTimeWork,
        Time $endTimeWork,
        Time $startTimeBreak,
        Time $endTimeBreak
    )
    {
        $this->entityValidator = $entityValidator;
        $this->entityValidator->validate($startDay, $endDay, $startTimeWork, $endTimeWork, $startTimeBreak, $endTimeBreak);

        $this->startDay = $startDay;
        $this->endDay = $endDay;
        $this->startTimeWork = $startTimeWork;
        $this->endTimeWork = $endTimeWork;
        $this->startTimeBreak = $startTimeBreak;
        $this->endTimeBreak = $endTimeBreak;

        $this->entityFormatter = $entityFormatter;
        $this->entityPrinter = $printer;
    }

    public function format(): array
    {
        return $this->entityFormatter->format(
            $this->startDay,
            $this->endDay,
            $this->startTimeWork,
            $this->endTimeWork,
            $this->startTimeBreak,
            $this->endTimeBreak
        );
    }

    public function print(): void
    {
        $this->entityPrinter->print($this->format());
    }
}