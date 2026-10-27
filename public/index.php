<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__ . '/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
require __DIR__ . '/../vendor/autoload.php';

// Bootstrap Laravel and handle the request...
/** @var Application $app */
$app = require_once __DIR__ . '/../bootstrap/app.php';

//$app->handleRequest(Request::capture());


$request = Request::capture();

$kernel = $app->make(
    \Illuminate\Contracts\Http\Kernel::class
);

$response = $kernel->handle($request);

error_log(sprintf(
    'RESPONSE_DIAG uri=%s status=%s type=%s bytes=%s',
    $request->getRequestUri(),
    $response->getStatusCode(),
    $response->headers->get('Content-Type', 'none'),
    strlen($response->getContent() ?? '')
));

error_log(sprintf(
    'SEND_DIAG sapi=%s ob_level=%s headers_sent=%s content_length=%s',
    PHP_SAPI,
    ob_get_level(),
    headers_sent() ? 'yes' : 'no',
    strlen($response->getContent() ?? '')
));

$response->sendHeaders();
echo $response->getContent();

$kernel->terminate($request, $response);
