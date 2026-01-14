<?php

use Dom\HTMLDocument;
use BcMath\Number;

echo '<pre>';
echo '<h1>PHP 8.4</h1>';

/**
 * Property hooks.
 *
 * Object properties may now have additional logic associated with their get and set operations. Depending on the usage,
 * that may or may not make the property virtual, that is, it has no backing value at all.
 */
echo '<hr><h2>Property hooks</h2>';

class Localise
{
    public string $languageCode;

    public string $countryCode
        {
            set (string $countryCode) {
                $this->countryCode = strtoupper($countryCode);
            }
//            set {
//                $this->countryCode = strtoupper($value);
//            }
            // set => strtoupper($value);
        }

    public string $combinedCode
        {
            get => sprintf("%s_%s", $this->languageCode, $this->countryCode);
            set (string $value) {
                var_dump($value);
                [$this->languageCode, $this->countryCode] = explode('_', $value, 2);
            }
        }

    public function __construct(string $languageCode, string $countryCode)
    {
        $this->languageCode = $languageCode;
        $this->countryCode = $countryCode;
    }
}

$brazilianPortuguese = new Localise('pt', 'br');
var_dump($brazilianPortuguese->countryCode); // BR
var_dump($brazilianPortuguese->combinedCode); // pt_BR
$brazilianPortuguese->combinedCode = 'en_US';
echo HTML_EOL;

class Person
{
    // A "virtual" property.  It may not be set explicitly.
    public string $fullName {
        get => $this->firstName . ' ' . $this->lastName;
    }

    // All write operations go through this hook, and the result is what is written.
    // Read access happens normally.
    public string $firstName {
        set => ucfirst(strtolower($value));
    }

    // All write operations go through this hook, which has to write to the backing value itself.
    // Read access happens normally.
    public string $lastName {
        set {
            if (strlen($value) < 2) {
                throw new \InvalidArgumentException('Too short');
            }
            $this->lastName = $value;
        }
    }
}

$p = new Person();

$p->firstName = 'peter';
print $p->firstName; // Prints "Peter"
$p->lastName = 'Peterson';
print $p->fullName; // Prints "Peter Peterson"

/**
 * Asymmetric Visibility.
 *
 * Object properties may now have their set visibility controlled separately from the get visibility.
 * The first visibility modifier controls the get-visibility, and the second modifier
 * controls the set-visibility. The get-visibility must not be narrower than set-visibility.
 */
echo '<hr><h2>Asymmetric Visibility</h2>';

class PhpVersion
{
    public private(set) string $version = '8.4';
    public protected(set) string $versions = '8.4';
    protected private(set) string $versiona = '8.4';

    // Fatal error: Multiple access type modifiers are not allowed - no get
    // public protected(get) string $versions = '8.4';
    // public private string $version = '8.4';

    public function increment(): void
    {
        [$major, $minor] = explode('.', $this->version);
        $minor++;
        $this->version = "$major.$minor";
        $this->versions = "$major.$minor";
    }
}
$phpVersion = new PhpVersion();
$phpVersion->increment();
echo $phpVersion->version;
echo HTML_EOL . $phpVersion->versions;
// Fatal error:  Uncaught Error: Cannot modify private(set) property PhpVersion::$version from global scope
// $phpVersion->version = '8.5';

/**
 * #[\Deprecated] Attribute.
 *
 * The new #[\Deprecated] attribute makes PHP’s existing deprecation mechanism available to user-defined functions,
 * methods, and class constants.
 */
echo '<hr><h2>#[\Deprecated] Attribute</h2>';

class FooClass {
    #[\Deprecated(
        message: 'use FooClass::getVersion() instead',
        since: '8.4',
    )]
    public function getPhpVersion()
    {
        return $this->getVersion();
    }

    public function getVersion()
    {
        return '8.4';
    }
}
// Deprecated:  Method FooClass::getPhpVersion() is deprecated since 8.4, use FooClass::getVersion() instead
echo (new FooClass())->getPhpVersion();
echo HTML_EOL . (new FooClass())->getVersion();

/**
 * New ext-dom features and HTML5 support.
 */
echo '<hr><h2>New ext-dom features and HTML5 support</h2>';

$dom = HTMLDocument::createFromString(
    <<<'HTML'
        <main>
            <article>PHP 8.4 is a feature-rich release!</article>
            <article class="featured">PHP 8.4 adds new DOM classes that are spec-compliant, keeping the old ones for compatibility.</article>
        </main>
        HTML,
    LIBXML_NOERROR,
);

$node = $dom->querySelector('main > article:last-child');
var_dump($node->classList->contains("featured")); // bool(true)
var_dump($dom->saveHtml($node));
var_dump($node->ownerDocument->saveHTML($node));

/**
 * Object API for BCMath.
 *
 * New BcMath\Number object enables object-oriented usage and standard mathematical operators when working with arbitrary precision numbers.
 * These objects are immutable and implement the Stringable interface, so they can be used in string contexts like echo $num
 */
echo '<hr><h2>Object API for BCMath</h2>';

$number1 = new Number('0.1234');
$number2 = new Number('2');
var_dump($number1);
var_dump($number1->value, $number1->scale);
echo $number1 . HTML_EOL;
$result = $number1 + $number2;
$result1 = $number1->add($number2);
var_dump($result, $result1);
var_dump($number2->div(2));
var_dump($number2->div(2.5)); // Deprecated: Implicit conversion from float 2.5 to int loses precision
var_dump($number2->div('3.5', 2)); // 0.57

/**
 * New array_*() functions.
 *
 * New functions array_find(), array_find_key(), array_any(), and array_all() are available.
 */
echo '<hr><h2>New array_*() functions</h2>';
$haystack = ['dog', 'cat', 'cow', 'duck', 'goose', 'cat'];

// find first value that satisfies the callback
$animal = array_find(
    $haystack,
    static fn(string $value): bool => str_starts_with($value, 'c'),
);
var_dump($animal); // string(3) "cat"

// find first key that satisfies the callback
$animalKey = array_find_key(
    $haystack,
    static fn(string $value): bool => str_starts_with($value, 'c'),
);
var_dump($animalKey); // int(1)

// check if array contains at least one value that satisfies the callback
// like in array but with callback,
// or array_filter but returns boolean
var_dump(array_any($haystack, static fn(string $value): bool => str_starts_with($value, 'c'))); // bool(true)

// checks if all array elements satisfy a callback function
var_dump(array_all($haystack, static fn(string $value): bool => strlen($value) > 2)); // bool(true)

// find first key that equals to the given value
$animalKey = array_search('cat', $haystack);
var_dump(array_search('cat', $haystack)); // int(1)

// find all keys that equals to the given value
var_dump(array_keys($haystack, 'cat')); // array(2) {[0]=>int(1) [1]=>int(5)}

/**
 * PDO driver specific subclasses.
 *
 * New subclasses Pdo\Dblib, Pdo\Firebird, Pdo\MySql, Pdo\Odbc, Pdo\Pgsql, and Pdo\Sqlite of PDO are available.
 */
echo '<hr><h2>PDO driver specific subclasses.</h2>';
//$connection = PDO::connect(
//    'sqlite:foo.db',
//    $username,
//    $password,
//); // object(Pdo\Sqlite)
//
//$connection->createFunction(
//    'prepend_php',
//    static fn($string) => "PHP {$string}",
//); // Does not exist on a mismatching driver.
//
//$connection->query('SELECT prepend_php(version) FROM php');

/**
 * new MyClass()->method() without parentheses.
 *
 * Properties and methods of a newly instantiated object can now be accessed without wrapping the new expression in parentheses.
 */
echo '<hr><h2>new MyClass()->method() without parentheses.</h2>';
class NewPhpVersion
{
    public function getVersion(): string
    {
        return 'PHP 8.4';
    }
}

var_dump(new NewPhpVersion()->getVersion());

/**
 * Lazy Objects.
 *
 * It is now possible to create objects whose initialization is deferred until they are accessed.
 * Libraries and frameworks can leverage these lazy objects to defer fetching data or dependencies required for initialization.
 */
echo '<hr><h2>Lazy Objects.</h2>';
class Example
{
    public function __construct(private int $data)
    {
        echo '__construct' . HTML_EOL;
    }

    public function getNumber(): int
    {
        return $this->data;
    }

    public function sayHello(): void
    {
        echo "Hello" . HTML_EOL;
    }
}

$initializer = static function (Example $ghost): void {
    // Fetch data or dependencies
    // $data = getData();
    var_dump('Initialize');
    // Initialize
    $ghost->__construct(12);
};

$reflector = new ReflectionClass(Example::class);
$object = $reflector->newLazyGhost($initializer);

// no Initialize yet, because it is not accessed to object properties
$object->sayHello(); // Hello

var_dump($object); // lazy ghost object(Example)#15 (0)

// Initialized, because it is accessed to object properties
var_dump($object->getNumber()); // string(10) "Initialize", __construct, int(12)
$object->__construct(11); // __construct
var_dump($object->getNumber());  // int(11)


/**
 * New request_parse_body() function.
 */
echo '<hr><h2>New request_parse_body() function.</h2>';
// for Post request, Content-Type application/x-www-form-urlencoded or multipart/form-data
// for get request - Fatal error: Uncaught RequestParseBodyException: Request does not provide a content type
// var_dump(request_parse_body());