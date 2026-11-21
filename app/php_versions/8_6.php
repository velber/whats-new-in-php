<?php

echo '<pre>';
echo '<h1>PHP 8.6</h1>';

/**
 * Partial Function Application.
 *
 * Allows some of a function's arguments to be provided in advance, using ? and ... placeholders for the rest.
 * The result is a Closure, and the function is only called once the remaining arguments are passed to it.
 *
 * По суті дозволяє не викликати функцію відразу. А зробити замикання, і захардкодити потрібні аргументи. Для цього
 * викликаючи функцію потрібно добавити ? або ... замість якогось аргументу. І тоді підставляти лише його викликаючи
 * замикання. Чимось схоже на підготовлюючі запити MySQL з динамічними зміннами :d.
 * Переважно для використання замість arrow functions i pipe operator |>.
 */
echo '<hr><h2>Partial Function Application</h2>';
function volume(int $length, int $width, int $height): int
{
    return $length * $width * $height;
}
$versions = ['8.4', '8.5', '8.6', '8.7', '9.0'];

// php 8.5
$supportsPfa = array_filter(
    $versions,
    fn ($version) => version_compare($version, '8.6', '>='),
);
// php 8.6, instead of arrow function
$supportsPfa = array_filter(
    $versions,
    version_compare(?, '8.6', '>='),
);

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
echo HTML_EOL;

// With Named arguments, allows to change the order of arguments
// The parameters of the closure are $subject, then $search
$remove = str_replace(subject: ?, search: ?, replace: '');

var_dump($remove('a-b-c', '-')); // > abc

// with pipe operator |>
echo HTML_EOL;
echo ' Hello  World '
        |> trim(...)
        |> str_replace(' ', '', ?)
        |> strtoupper(...)
        |> str_pad(?, 15, '*', STR_PAD_BOTH);


