<?php

use Random\Engine\Xoshiro256StarStar;
use Random\Randomizer;

echo '<pre>';
echo '<h1>PHP 8.2</h1>';


/**
 * Readonly classes.
 * Marking a class as readonly will add the readonly modifier to every declared property.
 */
echo '<hr><h2>Readonly classes</h2>';
enum Status
{
    case Draft;
    case Published;
    case Archived;
}

readonly class BlogData
{
    public string $title;

    public Status $status;

    public function __construct(string $title, Status $status)
    {
        $this->title = $title;
        $this->status = $status;
    }
}
echo 'readonly class BlogData';
$blog = new BlogData('Hello', Status::Draft);
// $blog->title = 'Name'; // will throw "Cannot modify readonly property ..."


/**
 * Disjunctive Normal Form (DNF) Types.
 * DNF types allow us to combine union and intersection types, following a strict rule: when combining union and intersection types, intersection types must be grouped with brackets.
 */
echo '<hr><h2>Disjunctive Normal Form (DNF) Types</h2>';
class Foo {
    public function bar((A&B)|null $entity) {
        return $entity;
    }
}
echo 'function bar((A&B)|null $entity) {...}';


/**
 * Allow null, false, and true as stand-alone types.
 */
echo '<hr><h2>Allow null, false, and true as stand-alone types</h2>';
class Falsy
{
    public function alwaysFalse(): false { }

    public function alwaysTrue(): true { }

    public function alwaysNull(): null { }
}
echo 'function alwaysTrue(): true { }';

/**
 * New "Random" extension.
 * The "random" extension provides a new object-oriented API to random number generation.
 */
echo '<hr><h2>New "Random" extension</h2>';
$blueprintRng = new Xoshiro256StarStar(
    hash('sha256', "Example seed that is converted to a 256 Bit string via SHA-256", true)
);

//...
// The randomizer will use a CSPRNG by default.
$randomizer = new Randomizer();
$fibers = []; // some array
// Even though the fibers execute in a random order, they will print the same value
// each time, because each has its own unique instance of the RNG.
$fibers = $randomizer->shuffleArray($fibers);
var_dump($blueprintRng);


/**
 * Constants in traits.
 * You cannot access the constant through the name of the trait, but, you can access the constant through the class that uses the trait.
 */
echo '<hr><h2>Constants in traits</h2>';
trait Fooo
{
    public const CONSTANT = 1;
}

class Bar
{
    use Fooo;
}

var_dump(Bar::CONSTANT); // 1
// var_dump(Fooo::CONSTANT); // Error


/**
 * Deprecate dynamic properties.
 * The creation of dynamic properties is deprecated to help avoid mistakes and typos, unless the class opts in by using the #[\AllowDynamicProperties] attribute. stdClass allows dynamic properties.
 * Usage of the __get/__set magic methods is not affected by this change.
 */
echo '<hr><h2>Deprecate dynamic properties.</h2>';
class User
{
    public $name;
}

$user = new User();
// $user->last_name = 'Doe'; // Deprecated notice
echo 'user->last_name = "Doe";';

$user = new stdClass();
$user->last_name = 'Doe'; // Still allowed
