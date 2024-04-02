<?php
declare(strict_types=1);

use Simply\Parser\Parser;

require 'vendor/autoload.php';

$input = 'пн-ср с 09.20 до 20.00, перерыв с 12^00 до 13.00';
$entity = (new Parser())->process($input);
$entity->print();