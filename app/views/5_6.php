<?php

echo '<pre>';
echo '<h1>PHP 5.6</h1>';

/**
 * Variadic functions via ...
 *
 * Функции с переменным количеством аргументов, используя синтаксис ...
 */
echo '<hr><h2>Variadic functions via ...</h2>';
function f($req, $opt = null, ...$params) {
    // $params - массив, содержащий все остальные аргументы.
    printf('$req: %d; $opt: %d; количество параметров: %d'."\n",
        $req, $opt, count($params));
}
f(1);
f(1, 2);
f(1, 2, 3);
f(1, 2, 3, 4);
f(1, 2, 3, 4, 5);
f(1, 2, 3, 4, 5, 18, [33]);

/**
 * Argument unpacking via ...
 *
 * Распаковка аргументов с помощью ...
 */
echo '<hr><h2>Argument unpacking via ...</h2>';
function add($a, $b, $c) {
    return $a + $b + $c;
}
// will take first 2 arguments with no errors
$operators = [2, 'rr', 3, 'r'];
echo add(1, ...$operators);

// will throws ArgumentCountError if array is to short
$operators = [2, 3];
echo add(1, ...$operators);
echo '<br>';
var_dump(...$operators);

echo '</pre>';























