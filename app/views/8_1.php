<?php

echo '<pre>';
echo '<h1>PHP 8.1</h1>';


/**
 * Enumerations.
 * Use enum instead of a set of constants and get validation out of the box.
 */
echo '<hr><h2>Enumerations</h2>';
$enum = <<<'ENUM'
enum Status
{
    case Draft;
    case Published;
    case Archived;
}
function acceptStatus(Status $status) {...}
<br>
ENUM;
echo $enum ;

enum Status
{
    case Draft;
    case Published;
    case Archived;
}
var_dump(Status::Archived);
var_dump(Status::Archived->name);


/**
 * Readonly properties cannot be changed after initialization, i.e. after a value is assigned to them.
 * They are a great way to model value objects and data-transfer objects.
 */
echo '<hr><h2>Readonly Properties</h2>';
class BlogData
{
    public readonly Status $status;
   
    public function __construct(Status $status) 
    {
        $this->status = $status;
    }
}

$blogData = new BlogData(Status::Draft);
var_dump($blogData->status->name);

// will throw an error "Cannot modify readonly property BlogData::$status..."
// var_dump($blogData->status = Status::Archived);


/**
 * First-class Callable Syntax.
 * It is now possible to get a reference to any function – this is called first-class callable syntax.
 */
echo '<hr><h2>First-class Callable Syntax</h2>';

//$foo = $this->foo(...);
$fn = strlen(...);

var_dump($fn);


/**
 * New in initializers.
 * Objects can now be used as default parameter values, static variables, and global constants, as well as in attribute arguments.
 * This effectively makes it possible to use nested attributes.
 */
echo '<hr><h2>New in initializers</h2>';
// PHP < 8.1
class Service 
{
    private Logger $logger;
 
    public function __construct(
        ?Logger $logger = null,
    ) {
        $this->logger = $logger ?? new NullLogger();
    }
}
// PHP 8.1
class ServiceNew 
{
    private Logger $logger;
    
    public function __construct(
        Logger $logger = new NullLogger(),
    ) {
        $this->logger = $logger;
    }
}
echo '__construct(
    Logger $logger = new NullLogger(),
)';


/**
 * Pure Intersection Types.
 * Use intersection types when a value needs to satisfy multiple type constraints at the same time.
 * It is not currently possible to mix intersection and union types together such as.
 */
echo '<hr><h2>Pure Intersection Types</h2>';
function count_and_iterate(Iterator&Countable $value) {
    foreach ($value as $val) {
        echo $val;
    }

    count($value);
}
echo 'Iterator&Countable $value';


/**
 * Never return type.
 * A function or method declared with the never type indicates that it will not return a value 
 * and will either throw an exception or end the script’s execution with a call of die(), exit(), 
 * trigger_error(), or something similar.
 */
echo '<hr><h2>Never return type</h2>';
function redirect(string $uri): never {
    header('Location: ' . $uri);
    exit();
}
 
function redirectToLoginPage(): never {
    redirect('/login');
    echo 'Hello'; // <- dead code detected by static analysis 
}
echo 'function redirectToLoginPage(): never {...}';


/**
 * Final class constants.
 * It is possible to declare final class constants, so that they cannot be overridden in child classes.
 * */
echo '<hr><h2>Final class constants</h2>';
class Foo
{
    final public const XX = "foo";
}

// class Bar extends Foo
// {
    // public const XX = "bar"; // Fatal error
// }


/**
 * Explicit Octal numeral notation.
 * It is now possible to write octal numbers with the explicit 0o prefix.
 * */
echo '<hr><h2>Explicit Octal numeral notation</h2>';
//PHP < 8.1
016 === 16; // false because `016` is octal for `14` and it's confusing
016 === 14; // true 
//PHP 8.1
0o16 === 16; // false — not confusing with explicit notation
0o16 === 14; // true

/**
 * Fibers.
 * Use instead ->request()->then()->then()...
 *  */
echo '<hr><h2>Fibers</h2>';
// $response = $httpClient->request('https://example.com/');
// print json_decode($response->getBody()->buffer())['code'];


/**
 * Array unpacking support for string-keyed arrays.
 * PHP supported unpacking inside arrays through the spread operator before,
 * but only if the arrays had integer keys. Now it is possible to unpack arrays with string keys too.
 *  */
echo '<hr><h2>Array unpacking support for string-keyed arrays</h2>';
$arrayA = ['a' => 1];
$arrayB = ['b' => 2];

$result = ['a' => 0, ...$arrayA, ...$arrayB];
var_dump($result);

// ['a' => 1, 'b' => 2]

