<?php

/*
use Foo\Bar\{
    Foo,
    Bar,
    Baz,
};
*/

echo '<pre>';
echo '<h1>PHP 7.2</h1>';

/**
 * New object type
 */
echo "<hr><h2>New object type</h2>";
function test(object $obj) : object
{
    return new SplQueue();
}

$test = test(new StdClass());
var_dump($test);


/**
 * Allow a trailing comma for grouped namespaces
 *
 * A trailing comma can now be added to the group-use syntax introduced in PHP 7.0.
 */
echo "<hr><h2>Allow a trailing comma for grouped namespaces</h2>";

/**
 * Abstract method overriding
 */
echo "<hr><h2>Abstract method overriding</h2>";
abstract class A
{
    abstract function test(string $s);
}
abstract class B extends A
{
    // переопределён - всё ещё сохраняя контравариантность для параметров и ковариантность для возвращаемых значений
    abstract function test($s) : int;
}

/**
 * Parameter type widening
 */
echo "<hr><h2>Parameter type widening</h2>";

interface AA
{
    public function Test(array $input);
}

class BB implements AA
{
    public function Test($input){} // type omitted for $input
}

echo '</pre>';






















