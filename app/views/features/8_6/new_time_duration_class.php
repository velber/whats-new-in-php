<?php

use \Time\Duration;

/**
 * New \Time\Duration Class.
 *
 * The Duration class represents elapsed time as measured by a stopwatch.
 * Its representation is independent of any time and timezone and can represent a range of more than 250 years with nanosecond precision.
 * This makes it well-suited to represent timeouts or benchmark timings in an expressive way.
 *
 * Те саме що DateInterval, але в секундах, із точністю до наносекунди. \Time\Duration не привязаний до календарного часу.
 * Найбільша одиниця - година. Використовується для однозначних вимірювань часу.
 */
echo '<hr><h2>New \Time\Duration Class</h2>';
var_dump(4 * 100_000_000); // int(400000000), не стосується фічі, просто побачив, що великі числа можна записувати у такому вигляді для кращої читабельності
echo HTML_EOL;

$timeout = Duration::fromMinutes(1)
    ->add(Duration::fromMilliseconds(1500));

var_dump($timeout);
printf("%d.%09d seconds\n", $timeout->seconds, $timeout->nanoseconds); // 61.500000000 seconds
var_dump($timeout->seconds / 60); // float(1.0166666666666666)
printf("%d hours\n", $timeout->seconds / 60); // 1 hours