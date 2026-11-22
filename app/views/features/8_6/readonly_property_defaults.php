<?php

/**
 * Readonly Property Defaults.
 *
 * Instance readonly properties, including those in readonly classes, can now declare a default value.
 * This makes it simple to implement get-only interface properties with fixed values,
 * which previously required assigning them in a constructor. The default counts as the property's initialization,
 * so the constructor cannot overwrite it.
 */
echo '<hr><h2>Readonly Property Defaults</h2>';

interface Rule
{
    public string $parser { get; }
}

// php 8.5
final readonly class SlugRuleBefore implements Rule
{
    public string $parser;

    public function __construct()
    {
        $this->parser = 'SlugParser';
    }
}

// php 8.6
final readonly class SlugRuleAfter implements Rule
{
    public string $parser = 'SlugParser';
}
final readonly class SlugRuleAfterWithConstructor implements Rule
{
    public function __construct(public string $parser = 'SlugParser') {}
}
final readonly class SlugRuleAfterWrong implements Rule
{
    public string $parser;
}

var_dump(new SlugRuleBefore()->parser); // string(10) "SlugParser"
var_dump(new SlugRuleAfter()->parser); // string(10) "SlugParser"
var_dump(new SlugRuleAfterWithConstructor()->parser); // string(10) "SlugParser"
var_dump(new SlugRuleAfterWrong()->parser); // Fatal error:  Uncaught Error: Typed property SlugRuleAfter2::$parser must not be accessed before initialization