<?php

use App\Helpers\MyClass;

echo '<pre>';
echo '<h1>PHP 7.4</h1>';

/**
 * Arrow functions notation
 */
echo '<hr><h2>Arrow functions notation</h2>';
$variable = 10;

// PHP <= 7.3
$myFunction = array_map(function($value) use ($variable) {
    return $value * $variable;
}, [1, 2, 3, 4]);

// PHP >= 7.4
$myFunction = array_map(fn($value) => $value * $variable, [1, 2, 3, 4]);
var_dump($myFunction);

/**
 * Typed properties
 */
echo '<hr><h2>Typed properties</h2>';
$myClass1 = new MyClass();
echo $myClass1->string;
echo '<br>';
echo $myClass1->number;

/**
 * Improvements to Arrays
 *   - Null coalescing assignment operator
 *   - Unpacking inside arrays (...) or Spread syntax (JS). In other words three dots means explode array to variables.
 */
echo '<hr><h2>Improvements to Arrays</h2>';
$array = [
    'name' => 'John',
    'title' => 'Teacher',
];

// PHP <= 7.3
//if (! isset($array['email'])) {
//    $array['email'] = 'old@email';
//}

// PHP >= 7.4
$array['email'] ??= 'new@test';
var_dump($array);

$fruits = ['apple', 'bananas'];

// old
$allFruits = array_merge(['oranges'], $fruits);

// new
// but do not work with string keys if keys repeat
// with number keys it will change keys
$allFruits = ['lemon', ...$fruits];
var_dump($allFruits);

function test(...$args) { var_dump($args); }
test(1, 2, 3);

/**
 * Allow exceptions from __toString() method
 */
echo '<hr><h2>Allow exceptions from __toString() method</h2>';
$myClass = new MyClass();
try {
    echo $myClass;
} catch (Throwable $exception) {
    echo $exception->getMessage();
}

/**
 * __serialize & __unserialize() methods
 */
echo '<hr><h2>__serialize & __unserialize() methods</h2>';
$myClass2 = new MyClass();
$s = serialize($myClass2);
echo $s;
$un = unserialize($s);
var_dump($un);

echo '</pre>';
