<?php

/** @var \Cicnavi\Oidc\Client $client */
$client = require dirname(__DIR__) . '/bootstrap.php';

// TODO In real app, check if the user is already authenticated locally.
// If so, prevent further processing, show warning message, redirect to another page, or similar.

try {
    $claims = $client->authenticate();
} catch (\Throwable $exception) {
    // TODO In real app, handle this state...
    var_dump('Oups...: ' . $exception->getMessage());
    throw $exception;
}

// TODO In real app, log in the user locally, show success message, or similar.
var_dump($claims);
