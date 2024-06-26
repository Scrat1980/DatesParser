<?php
declare(strict_types=1);

namespace Simply\Printer;

class Printer implements IPrinter
{
    public function print($content): void
    {
        echo '<pre>';
        print_r($content);
        echo '</pre>';

    }
}