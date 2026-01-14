# whats-new-in-php
This is a simple handbook of new features and updates of php with examples, grouped by php versions.

## Run examples
### On Linux
`php -S localhost:8000` - launch php server.

### Using Docker
- Make sure you are in app source code directory, i.e. `/path/to/whats-new-in-php`.
- Run `docker build -t whats-new-in-php .` command to build a container.
- Then run the container via `docker run -dp 8000:8000 -w /app -v "$(pwd):/app" whats-new-in-php`.


## [PHP 8.5](app/php_versions/8_5.php)
*20 November 2025*

https://www.php.net/releases/8.5/uk.php

https://www.php.net/manual/en/migration85.php

1. URI Extension. The new always-available URI extension provides APIs to securely parse and modify URIs and URLs.
2. Pipe Operator. Instead nested function calls. `$result = "Hello World" |> strlen(...);`.
3. Clone With. The new clone with keyword allows you to clone an object and override some of its properties.
4. #[\NoDiscard] Attribute (Without throwing away). PHP checks whether the returned value is consumed and emit (throw) a warning if it is not.
5. `array_first()` and `array_last()` functions.
6. Casts in constant expressions. `const T1_V = (int) 1.0;`.
7. Closures and First-Class Callables in Constant Expressions.
8. Persistent `cURL` Share Handles.

## [PHP 8.4](app/php_versions/8_4.php)
*21 November 2024*

https://www.php.net/releases/8.4/en.php

https://www.php.net/manual/en/migration84.php

1. Property hooks. Object properties may now have additional logic associated with their get and set operations.
2. Asymmetric Visibility. Object properties may now have their set visibility controlled separately from the get visibility.
3. `#[\Deprecated]` Attribute.
4. New `array_*()` functions array_find(), array_find_key(), array_any(), and array_all() are available.
5. `new MyClass()->method()` without parenthesesPDO driver specific subclasses.
6. New ext-dom features and HTML5 support.
7. Object API for BCMath. New `Number` object enables object-oriented usage and standard mathematical operators.
8. PDO driver specific subclasses. Allows to create new MySQL functions (for select function...) for DB connection objects.
9. Lazy Objects. It is now possible to create objects whose initialization is deferred until they are accessed.
10. New `request_parse_body()` function. Not for __GET__ requests.

## [PHP 8.3](app/php_versions/8_3.php)
*23 November 2023*

https://www.php.net/releases/8.3/en.php

https://www.php.net/manual/en/migration83.php

1. Typed class constants.
2. Dynamic class constant fetch.
3. New `#[\Override]` attribute.
4. New `json_validate()` function.
5. New Randomizer methods `getBytesFromString(), getFloat(), nextFloat()`.
6. Deep-cloning of readonly properties.

## [PHP 8.2](app/php_versions/8_2.php)
*08 December 2022*

https://www.php.net/releases/8.2/en.php

https://www.php.net/manual/en/migration82.php

1. Readonly classes. Marking a class as readonly will add the readonly modifier to every declared property.
2. Disjunctive Normal Form (DNF) Types. DNF types allow us to combine union and intersection types, following a strict rule: when combining union and intersection types, intersection types must be grouped with brackets.
3. Allow null, false, and true as stand-alone types.
4. New "Random" extension. The "random" extension provides a new object-oriented API to random number generation.
5. Constants in traits. You cannot access the constant through the name of the trait, but, you can access the constant through the class that uses the trait.
6. Deprecate dynamic properties. The creation of dynamic properties is deprecated to help avoid mistakes and typos, unless the class opts in by using the `#[\AllowDynamicProperties]` attribute. `stdClass` allows dynamic properties. Usage of the `__get`/`__set` magic methods is not affected by this change.


## [PHP 8.1](app/php_versions/8_1.php)
*25 November 2021*

https://www.php.net/releases/8.1/en.php

https://www.php.net/manual/en/migration81.php

1. Enumerations. Use enum instead of a set of constants and get validation out of the box.
2. Readonly Properties. Readonly properties cannot be changed after initialization, i.e. after a value is assigned to them. They are a great way to model value objects and data-transfer objects.
3. First-class Callable Syntax. It is now possible to get a reference to any function – this is called first-class callable syntax.
4. New in initializers. Objects can now be used as default parameter values, static variables, and global constants, as well as in attribute arguments. This effectively makes it possible to use nested attributes.
5. Pure Intersection Types. Use intersection types when a value needs to satisfy multiple type constraints at the same time. It is not currently possible to mix intersection and union types together such as A&B|C.
6. Never return type. A function or method declared with the never type indicates that it will not return a value and will either throw an exception or end the script’s execution with a call of die(), exit(), trigger_error(), or something similar.
7. Final class constants. It is possible to declare final class constants, so that they cannot be overridden in child classes.
8. Explicit Octal numeral notation. It is now possible to write octal numbers with the explicit 0o prefix.
9. Fibers. Use instead ->request()->then()->then()...
10. Array unpacking support for string-keyed arrays. PHP supported unpacking inside arrays through the spread operator before, but only if the arrays had integer keys. Now it is possible to unpack arrays with string keys too.


## [PHP 8.0](app/php_versions/8_0.php)
*26 November 2020*

https://www.php.net/releases/8.0/en.php

https://www.php.net/manual/en/migration80.new-features.php

1. Named arguments
   * Specify only required parameters, skipping optional ones.
   * Arguments are order-independent and self-documented.
2. Attributes - Instead of PHPDoc annotations, you can now use structured metadata with PHP's native syntax.   
3. Constructor property promotion - Less boilerplate code to define and initialize properties.  
4. Union types - Instead of PHPDoc annotations for a combination of types, you can use native union type declarations 
   that are validated at runtime.
5. Match expression - The new match is similar to switch and has the following features
   * Match is an expression, meaning its result can be stored in a variable or returned.
   * Match branches only support single-line expressions and do not need a break; statement.
   * Match does strict comparisons.
6. Nullsafe operator - Instead of null check conditions, you can now use a chain of calls with the new nullsafe operator.
   When the evaluation of one element in the chain fails, the execution of the entire chain aborts and the entire chain 
   evaluates to null.   
7. Saner string to number comparisons - When comparing to a numeric string, PHP 8 uses a number comparison. Otherwise, 
   it converts the number to a string and uses a string comparison.
8 Consistent type errors for internal functions - Most of the internal functions now throw an Error exception if the
   validation of the parameters fails.  
9. Just-In-Time (JIT) compilation 
- - -
10. Type system and error handling improvements
11. Other syntax tweaks and improvements
12. New Classes, Interfaces, and Functions
- - -
13. New mixed pseudo type https://php.watch/versions/8.0/mixed-type



## [PHP 7.4](app/php_versions/7_4.php)
*28 November 2019*

https://www.php.net/manual/en/migration74.new-features.php
1. Arrow functions notation fn `$b = array_map(fn($n) => $n * $n * $n, $a);`
2. Typed properties
3. Improvements to Arrays
  - null ??= `$this->request->data['comments']['user_id'] ??= ‘value’;`
  - ... `function test(...$args) { var_dump($args); }
test(1, 2, 3);`
- - -
4. Allow exceptions from __toString() method.
5. serialize objects
6. Covariant Returns and Contravariant Parameters
7. Weak References
8. Preloading

## [PHP 7.3](app/php_versions/7_3.php)
*6 December 2018*

https://www.php.net/manual/en/migration73.new-features.php
1. More Flexible Heredoc and Nowdoc Syntax
2. Trailing Commas are allowed in Calls
3. Array Destructuring supports Reference Assignments
4. JSON_THROW_ON_ERROR
5. is_countable Function
6. array_key_first(), array_key_last()
7. Argon2id Support
8. Deprecations
  - Deprecate image2wbmp() function
  - Deprecate case-insensitive constants
  - Deprecate FILTER_FLAG_SCHEME_REQUIRED and FILTER_FLAG_HOST_REQUIRED flags used with FILTER_VALIDATE_URL

## [PHP 7.2](app/php_versions/7_2.php)
*30 November 2017*

https://www.php.net/manual/en/migration72.new-features.php
1. New object type
2. Allow a trailing comma for grouped namespaces
- - -
3. Abstract method overriding
4. Parameter type widening

## [PHP 7.1](app/php_versions/7_1.php)
*1 December 2016*

https://www.php.net/manual/en/migration71.new-features.php
1. Nullable types
2. Void functions
3. Symmetric array destructuring
4. Class constant visibility
- - -
5. iterable pseudo-type
6. Multi catch exception handling
7. Support for keys in list()
8. Support for negative string offsets

## [PHP 7.0](app/php_versions/7_0.php)
*3 December 2015*

https://www.php.net/manual/en/migration70.new-features.php#migration70.new-features.scalar-type-declarations
1. Scalar type declarations 
2. Return type declarations
3. Null coalescing operator
4. Spaceship operator
5. Group use declarations
---
6. Anonymous classes
7. Integer division with intdiv()
8. Constant arrays using define()
9. IntlChar

## [PHP 5.6](app/php_versions/5_6.php)
*28 August 2014*

https://www.php.net/manual/en/migration56.new-features.php#migration56.new-features.splat
1. Variadic functions via ...
2. Argument unpacking via ...