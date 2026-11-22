<?php

/**
 * New clamp() Function.
 *
 * Ensures that a given value (numeric or otherwise) falls within a specified range.
 * Otherwise, the nearest boundary value is returned.
 * Гарантує, що задане значення (числове чи інше) потрапляє в заданий діапазон.
 * В іншому випадку повертається найближче граничне значення.
 *
 * clamp — Return the given value if in range, else return the nearest bound.
 * Return the given value if in range of min and max. Else if it's lower than min, return min. Else return max.
 * clamp() returns the parameter value if considered "between" min and max according to standard comparisons.
 */
echo '<hr><h2>New clamp() Function</h2>';
// php 8.5
var_dump(max(0, min(-10, 100))); // int(0)
var_dump(max(0, min(50, 100))); // int(50)
var_dump(max(0, min(110, 100))); // int(100)

// php 8.6
var_dump(clamp(-10, 0, 100)); // int(0)
var_dump(clamp(50, 0, 100)); // int(50)
var_dump(clamp(110, 0, 100)); // int(100)

echo HTML_EOL, clamp(-5, min: 0, max: 100), PHP_EOL;  // 0
echo clamp(55, min: 0, max: 100), PHP_EOL;  // 55
echo clamp(103, min: 0, max: 100), PHP_EOL;  // 100

echo clamp("J", min: "A", max: "F"), PHP_EOL, HTML_EOL;  // "F"

echo clamp(
    new \DateTimeImmutable('2025-08-01'),
    min: new \DateTimeImmutable('2025-08-15'),
    max: new \DateTimeImmutable('2025-09-15'),
)->format('Y-m-d'), PHP_EOL; // 2025-08-15