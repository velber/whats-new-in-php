<?php

echo '<pre>';
echo '<h1>PHP 7.3</h1>';

/**
 * More Flexible Heredoc and Nowdoc Syntax
 *
 * May use in arrays.
 * It’s important to make sure that none of the lines of the string have less whitespace in front of them than in front
 * of the closing identifier; if this is the case a syntax error will be thrown by PHP.
 *
 * Nowdocs are to single-quoted strings what heredocs are to double-quoted strings.
 * A nowdoc is specified similarly to a heredoc, but no parsing is done inside a nowdoc.
 * The construct is ideal for embedding PHP code or other large blocks of text without the need for escaping
 */
echo "<hr><h2>More Flexible Heredoc and Nowdoc Syntax</h2>";
$test = <<<DOC
   Here is doc
   with multiple 
   strings
   DOC;

var_dump($test);

$test2 = ['enimals', <<<"DOC"
   Here is doc $test
   with multiple 
   strings
   DOC, 'horse', 'ssss'];
var_dump($test2);

// heredoc vs nowdoc
// nowdoc is single-quoted string and do not parse strings (variables); may 'DOC'
// while heredoc is double-quoted string may "DOC" and DOC
$test3 = <<<'DOC'
   Here is doc
   $test
   with multiple 
   strings
   DOC;

var_dump($test3);


/**
 * Trailing Commas are allowed in Calls
 *
 * Trailing commas in function and method calls are now allowed.
 */
echo "<hr><h2>Trailing Commas are allowed in Calls</h2>";

$a = 1;
$b = 2;
$c = [];

var_dump(
    $a,
    $b,
    $c,
);
$array = [1, 2];

/**
 * Array Destructuring supports Reference Assignments
 */
echo "<hr><h2>Array Destructuring supports Reference Assignments</h2>";

$array = [1, 2];
list($a, &$b) = $array;
$array[1] = 55;
var_dump($b);

// the same
$array = [1, 2];
$a = $array[0];
$b =& $array[1];

/**
 * JSON_THROW_ON_ERROR
 *
 * If pass 4th parameter to json_decode, it will throw an exception on error
 */
echo "<hr><h2>JSON_THROW_ON_ERROR<h2>";

try {
    json_decode("{", false, 512, JSON_THROW_ON_ERROR);
}
catch (\JsonException $exception) {
    echo $exception->getMessage(); // echoes "Syntax error"
}

/**
 * is_countable Function
 *
 * This RFC proposes the function is_countable(),
 * which returns true if the given variable is an array or it is a countable variable, false otherwise
 */
echo "<hr><h2>is_countable Function<h2>";
var_dump(is_countable([1, 2, 3])); // bool(true)
var_dump(is_countable(new ArrayIterator(['foo', 'bar', 'baz']))); // bool(true)
var_dump(is_countable(new ArrayIterator())); // bool(true)
var_dump(is_countable(new stdClass())); // bool(false)

$foo = new stdClass();
echo count($foo); // 1

if (is_array($foo) || $foo instanceof Countable) {
    // $foo is countable
}

// the same
if (is_countable($foo)) {
    // $foo is countable
}

/**
 * array_key_first(), array_key_last()
 *
 * As of PHP 7.3, array_key_first() and array_key_last() allow to retrieve the first and the last key of a given array
 * ithout affecting the internal array pointer.
 */
echo "<hr><h2>array_key_first(), array_key_last()<h2>";

$a = [
    'first' => 1,
    'sec' => 1,
    'third and last' => 3,
];
var_dump(array_key_first($a));
var_dump(array_key_last($a));

/**
 * Argon2id Support
 * Argon2 is a hashing algorithm implemented in PHP 7.2 as an alternative to the Bcrypt algorithm.
 * PHP 7.2 introduced the PASSWORD_ARGON2I constant, available to be used in password_* functions.
 */
echo "<hr><h2>Argon2id Support<h2>";
var_dump(password_hash('password', PASSWORD_BCRYPT));
var_dump(password_hash('password', PASSWORD_ARGON2I));

echo '</pre>';























