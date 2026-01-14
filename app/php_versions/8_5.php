<?php

use Uri\Rfc3986\Uri;

echo '<pre>';
echo '<h1>PHP 8.5</h1>';

/**
 * URI Extension.
 *
 * The new always-available URI extension provides APIs to securely parse and modify URIs and URLs.
 */
echo '<hr><h2>URI Extension</h2>';


$uri = new Uri('https://php.net/releases/8.5/en.php');

var_dump($uri->getHost()); // string(7) "php.net"
var_dump($uri->getPath()); // string(20) "/releases/8.5/en.php"
var_dump($uri->getScheme()); // string(5) "https"
var_dump($uri->toString()); // string(35) "https://php.net/releases/8.5/en.php"
var_dump($uri->toRawString()); //string(35) "https://php.net/releases/8.5/en.php"
var_dump($uri->getQuery()); // NULL
var_dump($uri->getRawQuery()); // NULL


/**
 * Pipe Operator.
 *
 * The pipe operator allows chaining function calls together without dealing with intermediary variables.
 * This enables replacing many "nested calls" with a chain that can be read forwards, rather than inside-out.
 */
echo '<hr><h2>Pipe Operator</h2>';
$title = ' PHP 8.5 Released ';

$slug = $title
        |> trim(...)
        |> (fn($str) => str_replace(' ', '-', $str))
        |> (fn($str) => str_replace('.', '', $str))
        |> strtolower(...);

var_dump($slug); // string(15) "php-85-released"

$slug = ' PHP 8.5 Released '
        |> (fn($str) => str_replace(' ', '-', $str))
        |> (fn($str) => str_replace('.', '', $str));
        // Fatal error:  Uncaught TypeError: trim(): Argument #1 ($string) must be of type string
        // |> trim(strtolower(...));

/**
 * Clone With.
 *
 * It is now possible to update properties during object cloning by passing an associative array to the clone() function.
 * This enables straightforward support of the "with-er" pattern for readonly classes.
 */
echo '<hr><h2>Clone With</h2>';

readonly class Color
{
    public function __construct(
        public int $red,
        public int $green,
        public int $blue,
        public int $alpha = 255,
    ) {}

    public function withAlpha(int $alpha): self
    {
        return clone($this, [
            'alpha' => $alpha,
        ]);
    }
}

$blue = new Color(79, 91, 147);
$transparentBlue = $blue->withAlpha(128);
var_dump($transparentBlue->alpha); // int(128)

/**
 * #[\NoDiscard] Attribute.
 *
 * By adding the #[\NoDiscard] attribute to a function, PHP will check whether the returned value is consumed and emit a warning if it is not.
 * This allows improving the safety of APIs where the returned value is important, but it's easy to forget using the return value by accident.
 * The associated (void) cast can be used to indicate that a value is intentionally unused.
 */
echo '<hr><h2>#[\NoDiscard] Attribute</h2>';
#[\NoDiscard]
function getPhpVersion(): string
{
    return 'PHP 8.5';
}

// Warning: The return value of function getPhpVersion() should
// either be used or intentionally ignored by casting it as (void)
//getPhpVersion();

// no warning
(void) getPhpVersion();
var_dump(getPhpVersion());
$a = getPhpVersion();


/**
 * Closures and First-Class Callables in Constant Expressions.
 *
 * Static closures and first-class callables can now be used in constant expressions.
 * This includes attribute parameters, default values of properties and parameters, and constants.
 */
echo '<hr><h2>Closures and First-Class Callables in Constant Expressions</h2>';
// PHP 8.4 and older
final class PostsController
{
    #[AccessControl(
        new Expression('request.user === post.getAuthor()'),
    )]
    public function update(
        Request $request,
        Post $post,
    ): Response {
        // ...
    }
}

// PHP 8.5
final class PostsControllerNew
{
    #[AccessControl(static function (
        Request $request,
        Post $post,
    ): bool {
        return $request->user === $post->getAuthor();
    })]
    public function update(
        Request $request,
        Post $post,
    ): Response {
        // ...
    }
}

/**
 * Persistent cURL Share Handles.
 *
 * Unlike curl_share_init(), handles created by curl_share_init_persistent() will not be destroyed at the end of the PHP request.
 * If a persistent share handle with the same set of share options is found, it will be reused,
 * avoiding the cost of initializing cURL handles each time.
 */
echo '<hr><h2>Persistent cURL Share Handles</h2>';

// PHP 8.4 and older
$sh = curl_share_init();
curl_share_setopt($sh, CURLSHOPT_SHARE, CURL_LOCK_DATA_DNS);
curl_share_setopt($sh, CURLSHOPT_SHARE, CURL_LOCK_DATA_CONNECT);

$ch = curl_init('https://php.net/');
curl_setopt($ch, CURLOPT_SHARE, $sh);

//curl_exec($ch);

// PHP 8.5
$sh = curl_share_init_persistent([
    CURL_LOCK_DATA_DNS,
    CURL_LOCK_DATA_CONNECT,
]);

$ch = curl_init('https://php.net/');
curl_setopt($ch, CURLOPT_SHARE, $sh);

// This may now reuse the connection from an earlier SAPI request
// curl_exec($ch);


/**
 * array_first() and array_last() functions.
 *
 * The array_first() and array_last() functions return the first or last value of an array, respectively.
 * If the array is empty, null is returned (making it easy to compose with the ?? operator)..
 */
echo '<hr><h2>array_first() and array_last() functions</h2>';
$events = ['PHP 8.5 Released', 'PHP 8.6 Released'];
$emptyEvents = [];

var_dump(array_first($events));
var_dump(array_last($events));

var_dump(array_first($emptyEvents) ?? 'No events first');
var_dump(array_last($emptyEvents) ?? 'No events last');

/**
 * Casts in constant expressions.
 *
 * Added support for casts in constant expressions.
 * Note that the const expression can't be used in inside a block scope except class.
 * define() can be used everywhere.
 */
echo '<hr><h2>Casts in constant expressions</h2>';

const T1_V = (int) 1.0;
const T2_V = 2.0;
var_dump(T1_V);
var_dump(T2_V);
