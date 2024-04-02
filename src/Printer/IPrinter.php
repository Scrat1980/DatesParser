<?php
declare(strict_types=1);

namespace Simply\Printer;
interface IPrinter
{
    public function print($content): void;
}