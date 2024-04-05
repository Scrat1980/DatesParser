<?php
declare(strict_types=1);

namespace Simply\Day;

use Exception;

class Day
{
    private $validator;
    public string $name;

    /**
     * @param string $name
     * @throws Exception
     */
    public function __construct(string $name)
    {
        $this->validator = new DayValidator();
        if (!$this->validator->validate($name)) {
            throw new Exception('Trying to create a day with wrong name');
        }
        $this->name = $name;
    }

}