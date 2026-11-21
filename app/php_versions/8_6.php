<?php

echo '<pre>';
echo '<h1>PHP 8.6</h1>';

/**
 * Partial Function Application.
 *
 * Allows some of a function's arguments to be provided in advance, using ? and ... placeholders for the rest. The result is a Closure, and the function is only called once the remaining arguments are passed to it.
 */
function volume(int $length, int $width, int $height): int
{
    return $length * $width * $height;
}

// "?" stands for exactly one argument
$closure = volume(2, ?, 4);
// equivalent to: static fn(int $width): int => volume(2, $width, 4)
var_dump($closure(3));

$closure = volume(?, 3, ?);
// equivalent to: static fn(int $length, int $height): int => volume($length, 3, $height)
var_dump($closure(2, 4));

// "..." stands for all remaining arguments
$closure = volume(2, ...);
// equivalent to: static fn(int $width, int $height): int => volume(2, $width, $height)
var_dump($closure(3, 4));

// With every argument provided, "..." merely delays the call
$closure = volume(2, 3, 4, ...);
// equivalent to: static fn(): int => volume(2, 3, 4)
var_dump($closure());


