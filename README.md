# DatesParser
A simple functionality to parse dates in an object-oriented way


Задача:
необходимо написать скрипт php 7.2, преобразующий текстовое представление
даты-время в ассоциативные массивы.
Входные данные:
текстовое представление даты времени работы компании. Для упрощения все вариации
входных данных стандартизированы.
Стандарт входных данных:
деньнедели (-деньнедели) с времяначала до времязавершения, перерыв с времяначала
до времязавершения
деньнедели = пн,вт, ср, чт, пт, сб, вс
перерыв,с,до - всегда есть это слово
Примеры входных данных:
1) пн-ср с 9.00 до 20.00
2) вт с 10:00 до 20:00
3) пн-вс с 10.20 до 20.00, перерыв с 12:00 до 13.00
Пример результата:
массив 1
$wt["пн"]["begin"]="09:00"; //время обязательно 5 символов, всегда через :
$wt["пн"]["end"]="20:00";
массив 2
$ww["пн"]["begin"]="12:00";
$ww["пн"]["end"]="13:00";
