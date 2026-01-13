<?php

use Random\Randomizer;
use Random\IntervalBoundary;

echo '<pre>';
echo '<h1>PHP 8.3</h1>';

/**
 * Typed class constants.
 */
echo '<hr><h2>Typed class constants</h2>';

interface I {
    const string VERSION = '8.3';
    const array VERSIONS = [];
    // Fatal error: Cannot use array as value for class constant I::VERSIONS of type string
    // const string VERSIONS = [];
}

class Foo implements I {
    const string VERSION = 'Foo 8.3';
    // Fatal error: Type of Foo::VERSION must be compatible with I::VERSION of type string
    // const array VERSION = [];
}

echo I::VERSION . HTML_EOL;
echo Foo::VERSION . HTML_EOL;
var_dump(Foo::VERSIONS);


/**
 * Dynamic class constant fetch.
 */
echo '<hr><h2>Dynamic class constant fetch</h2>';

class FooDynamic {
    const PHP = 'PHP 8.3';
}

$searchableConstant = 'PHP';

var_dump(FooDynamic::{$searchableConstant});



/**
 * New #[\Override] attribute.
 *
 * By adding the #[\Override] attribute to a method,
 *   PHP will ensure that a method with the same name exists in a parent class or in an implemented interface.
 */
echo '<hr><h2>New #[\Override] attribute</h2>';
final class MyDateTime extends DateTime {
    protected $logFile;

    protected function setUp(): void {
        $this->logFile = fopen('/tmp/logfile', 'w');
    }

    // Fatal error: MyDateTime::taerDown() has #[\Override] attribute, but no matching parent method exists
    // #[\Override]
    protected function taerDown(): void {
        fclose($this->logFile);
        unlink('/tmp/logfile');
    }

    /**
     * Retrieves the timezone associated with the current object.
     *
     * @return \DateTimeZone|false
     */
     #[\Override]
    public function getTimezone(): DateTimeZone|false
    {
        echo parent::getTimezone()->getName();

        return parent::getTimezone();
    }
}

new MyDateTime()->getTimezone();


/**
 * Deep-cloning of readonly properties.
 *
 * Readonly properties may now be modified once within the magic __clone method
 *   to enable deep-cloning of readonly properties.
 */
echo '<hr><h2>Deep-cloning of readonly properties</h2>';
class PHP {
    public string $version = '8.2';
}

readonly class FooA {
    public function __construct(
        public PHP $php
    ) {}

    public function __clone(): void {
        $this->php = clone $this->php;
    }
}

$instance = new FooA(new PHP());
// in 8.2 - Fatal error: Cannot modify readonly property Foo::$php
$cloned = clone $instance;

$cloned->php->version = '8.3';
echo $instance->php->version;


/**
 * New json_validate() function.
 *
 * json_validate() allows to check if a string is syntactically valid JSON, while being more efficient than json_decode()
 */
echo '<hr><h2>New json_validate() function</h2>';

var_dump(json_validate('{ "test": { "foo": "bar" } }')); // true
var_dump(json_validate('{ "test": { "foo": "bar"  }')); // false

/**
 * New Randomizer::getBytesFromString() method.
 *
 * The Random Extension that was added in PHP 8.2 was extended by a new method to generate random strings consisting of
 *   specific bytes only. This method allows the developer to easily generate random identifiers,
 *   such as domain names, and numeric strings of arbitrary length.
 */
echo '<hr><h2>New Randomizer::getBytesFromString() method</h2>';

// A \Random\Engine may be passed for seeding, the default is the secure engine.
$randomizer = new Randomizer();

$randomDomain = sprintf(
    "%s.example.com",
    $randomizer->getBytesFromString(
        'abcdefghijklmnopqrstuvwxyz0123456789',
        16,
    ),
);

echo $randomDomain;

/**
 * New Randomizer::getFloat() and Randomizer::nextFloat() methods.
 */
echo '<hr><h2>New Randomizer::getFloat() and Randomizer::nextFloat() methods</h2>';

$randomizer = new Randomizer();

$temperature = $randomizer->getFloat(
    -89.2,
    56.7,
    IntervalBoundary::ClosedClosed,
);
var_dump($temperature);

$chanceForTrue = 0.1;
// Randomizer::nextFloat() is equivalent to
// Randomizer::getFloat(0, 1, IntervalBoundary::ClosedOpen).
// The upper bound, i.e. 1, will not be returned.
$myBoolean = $randomizer->nextFloat() < $chanceForTrue;
var_dump($myBoolean);