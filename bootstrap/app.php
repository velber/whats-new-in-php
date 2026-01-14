<?php 

// generate navigation links
$links = [];
foreach (array_reverse(PHP_VERSIOINS) as $phpVersion) {
    $links[] = sprintf("<a href='?v=%s'>%s</a>", $phpVersion, $phpVersion);
}

echo implode(' | ', $links) . '<br>';

// stop script if nothing requested
if (! isset($_GET['v'])) {
    exit;
}

$versionKey = array_search($_GET['v'], PHP_VERSIOINS);
// exit if version doesn't supported
if (false === $versionKey) {
    http_response_code(404);
    exit('404 Not Found');
}

// show examples of specified PHP version
require 'app/php_versions' . DIRECTORY_SEPARATOR . str_replace('.', '_', PHP_VERSIOINS[$versionKey]) . '.php';

// TODO
//  - show info from readme at home page
//  - add group new features by type and meaning, not only by version
