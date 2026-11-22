<?php

/**
 * New SortDirection Enum.
 *
 * The SortDirection enum provides a shared, type-safe way to express sort order with its Ascending and Descending cases.
 * Previously, every library had to define its own way of representing sort direction,
 * resulting in a mix of incompatible integers, strings, booleans, and custom enums.
 * Since SortDirection is built into PHP, libraries can accept it in their public APIs without needing adapter code.
 *
 * Готовий з Pure (not Backend) Enum двома значеннями - Ascending та Descending.
 */
echo '<hr><h2>New SortDirection Enum</h2>';

var_dump(SortDirection::cases()); // array(2) {...
echo HTML_EOL;

var_dump(SortDirection::Ascending); // enum(SortDirection::Ascending)
var_dump(SortDirection::Ascending->name); // string(9) "Ascending"

echo HTML_EOL;
var_dump(SortDirection::Descending); // enum(SortDirection::Descending)
var_dump(SortDirection::Descending->name); // string(10) "Descending"