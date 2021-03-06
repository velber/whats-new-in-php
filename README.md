# whats-new-in-php
In this project describes new features and updates of php with examples, grouped by php versions.
### Run examples
` php -S localhost:8000` - launch php server.
Open http://localhost:8000/?version=70 in browser to open needed PHP 7.0 version example.

### [PHP 8.0](code_examples/V80/index.php)
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



### [PHP 7.4](code_examples/V74/index.php)
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

### [PHP 7.3](code_examples/V73/index.php)
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

### [PHP 7.2](code_examples/V72/index.php)
*30 November 2017*

https://www.php.net/manual/en/migration72.new-features.php
1. New object type
2. Allow a trailing comma for grouped namespaces
- - -
3. Abstract method overriding
4. Parameter type widening

### [PHP 7.1](code_examples/V71/index.php)
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

### [PHP 7.0](code_examples/V70/index.php)
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

### [PHP 5.6](code_examples/V56/index.php)
*28 August 2014*

https://www.php.net/manual/en/migration56.new-features.php#migration56.new-features.splat
1. Variadic functions via ...
2. Argument unpacking via ...





