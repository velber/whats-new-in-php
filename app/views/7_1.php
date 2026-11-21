<?php

// if declared strict mode it will not converts types and throw fatal TypeError for type parameters
// declare(strict_types=1);

echo '<pre>';
echo '<h1>PHP 7.1</h1>';

/**
 * Nullable types
 *
 * Return or argument may be null type if '?'
 */
echo "<hr><h2>Nullable types</h2>";
function testReturn(): ?string
{
    return 'elePHPant';
}
var_dump(testReturn());

function testReturn1(): ?string
{
    return null;
}
var_dump(testReturn1());

// throws error
function testReturn2(): ?string {}
try {
    var_dump(testReturn2());
} catch (Throwable $exception) {
    echo $exception->getMessage();
}

function test(?string $name)
{
    var_dump($name);
}

test('elePHPant');
test(null);

// throws error
try {
    test();
} catch (Throwable $exception) {
    echo $exception->getMessage();
}

/**
 * Void functions
 *
 * Must either omit their return statement altogether,
 * or use an empty return statement. NULL is not a valid return value for a void function.
 * Функции с таким заданным типом возвращаемого значения не должны ничего возвращать.
 * То есть либо вообще не содержать ни одного оператора return, либо использовать его без параметра.
 * Trying to user function result value simply evaluates to NULL
 */
echo "<hr><h2>Void functions</h2>";
function swap(&$left, &$right): void
{
    if ($left === $right) {

        // allow
        return;
    }

    $tmp = $left;
    $left = $right;
    $right = $tmp;

    // throws error
    // turn 4;
}

$a = 1;
$b = 2;
var_dump(swap($a, $b), $a, $b);

/**
 * Symmetric array destructuring
 *
 * May use as alternative to the list(), including within foreach.
 */
echo "<hr><h2>Symmetric array destructuring</h2>";
$data = [
    [1, 'Tom', 'Smith'],
    [2, 'Fred'],
];

// list() style
list($id1, $name1) = $data[0];

// [] style
[$id1, $name1] = $data[0];

// list() style
foreach ($data as list($id, $name)) {
    // logic here with $id and $name
}

// [] style
foreach ($data as [$id, $name, $last]) {
    var_dump($last);
    // logic here with $id and $name
}

/**
 * Class constant visibility
 *
 * May use as alternative to the list(), including within foreach.
 */
echo "<hr><h2>Class constant visibility</h2>";
class ConstDemo
{
    const PUBLIC_CONST_A = 1;
    public const PUBLIC_CONST_B = 2;
    protected const PROTECTED_CONST = 3;
    private const PRIVATE_CONST = 4;
}
echo ConstDemo::PUBLIC_CONST_A;
// throws error
try {
    echo ConstDemo::PROTECTED_CONST;
} catch (Throwable $exception) {
    echo '<br>' . $exception->getMessage();
}

/**
 * iterable pseudo-type
 */
echo "<hr><h2>iterable pseudo-type</h2>";
function iterator(iterable $iter)
{
    foreach ($iter as $val) {
        //
    }
}

/**
 * Multi catch exception handling
 *
 * Multiple exceptions per catch block may now be specified using the pipe character (|).
 * This is useful for when different exceptions from different class hierarchies are handled the same
 */
echo "<hr><h2>Multi catch exception handling</h2>";
try {
    // some code
} catch (Exception | Throwable $e) {
    // handle first and second exceptions
}

/**
 * Support for keys in list()
 *
 * Теперь вы можете указывать ключи в операторе list() или в его новом коротком синтаксисе [].
 * Это позволяет деструктурировать массивы с нечисловыми или непоследовательными ключами.
 */
echo "<hr><h2>Support for keys in list()</h2>";
$data = [
    ["id" => 1, "name" => 'Tom'],
    ["id" => 2, "name" => 'Fred'],
];

// стиль list()
list("id" => $id1, "name" => $name1) = $data[0];

// стиль []
["id" => $id1, "name" => $name1] = $data[0];

// стиль list()
foreach ($data as list("id" => $id, "name" => $name)) {
    // logic here with $id and $name
}

// стиль []
foreach ($data as ["id" => $id, "name" => $name]) {
    // logic here with $id and $name
}

/**
 * Support for negative string offsets
 */
echo "<hr><h2>Support for negative string offsets</h2>";
var_dump("abcdef"[-2]);
var_dump(strpos("aabbcc", "b", -3));
$string = 'bar';
echo "The last character of '$string' is '$string[-1]'.\n";

echo '</pre>';






















