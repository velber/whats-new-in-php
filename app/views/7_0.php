<?php

// if declared strict mode it will not converts types and throw fatal TypeError for type parameters
// declare(strict_types=1);

echo '<pre>';
echo '<h1>PHP 7.0</h1>';

/**
 * Scalar type declarations
 *
 * Available types:
 *   - Class/Interface name, self 5.0
 *   - array 5.1
 *   - callable 5.4
 *   - bool, float, string, int 7.0
 *   - iterable 7.1
 *   - object 7.2
 */
echo "<hr><h2>Scalar type declarations</h2>";
function sumOfInts(int ...$ints)
{
    return array_sum($ints);
}
var_dump(sumOfInts(2, '3', 4.1));

function echoTypes(int $int, string $sthing, array $ar, bool $bool)
{
    var_dump(func_get_args());
}
echoTypes(1, 1, [1], 1);

/**
 * Return type declarations
 *
 * The same types are available as are in argument types
 * Put colon wright after bracket and then space and type.
 */
echo '<hr><h2>Return type declarations</h2>';

function arraysSum(array ...$arrays): array
{
    return array_map(function(array $array): int {
        return array_sum($array);
    }, $arrays);
}
print_r(arraysSum([1,2,3], [4,5,6], [7,8,9]));

function sum($a, $b): float {
    return $a + $b;
}
var_dump(sum(1, 2));

/**
 * Null coalescing operator ??
 *
 * Combine ternary in conjunction with isset()
 */
echo '<hr><h2>Null coalescing operator</h2>';

// Извлекаем значение $_GET['user'], а если оно не задано,
// то возвращаем 'nobody'
$username = $_GET['user'] ?? 'nobody';
// Это идентично следующему коду:
$username = isset($_GET['user']) ? $_GET['user'] : 'nobody';

// Данный оператор можно использовать в цепочке.
// В этом примере мы сперва проверяем, задан ли $_GET['user'], если нет,
// то проверяем $_POST['user'], и если он тоже не задан, то присваеваем 'nobody'.
$username = $_GET['user'] ?? $_POST['user'] ?? 'nobody';

/**
 * Spaceship operator
 */
echo '<hr><h2>Spaceship operator</h2>';
// Integers
echo 1 <=> 1; // 0
echo 1 <=> 2; // -1
echo 2 <=> 1; // 1
echo '<br>';

// Floats
echo 1.5 <=> 1.5; // 0
echo 1.5 <=> 2.5; // -1
echo 2.5 <=> 1.5; // 1
echo '<br>';

// Strings
echo "a" <=> "a"; // 0
echo "a" <=> "b"; // -1
echo "b" <=> "a"; // 1

/**
 * Integer division with intdiv()
 */
echo '<hr><h2>Integer division with intdiv()</h2>';
var_dump(intdiv(10, 3));

echo '</pre>';






















