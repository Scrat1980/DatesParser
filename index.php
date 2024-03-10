<?php
declare(strict_types=1);

require('IPrinter.php');
require('Printer.php');
require('ParserValidator.php');
require('Parser.php');
require('WeekDays.php');
require('ITimeValidator.php');
require('TimeValidator.php');
require('ITimeFormatter.php');
require('TimeFormatter.php');
require('Time.php');
require('DayValidator.php');
require('Day.php');
require('IEntityValidator.php');
require('EntityValidator.php');
require('IEntityFormatter.php');
require('EntityFormatter.php');
require('Entity.php');

$input = 'пн-ср с 09.20 до 20.00, перерыв с 12^00 до 13.00';
$entity = (new Parser())->process($input);
$entity->print();