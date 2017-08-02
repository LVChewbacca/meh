<?php

require 'vendor/autoload.php';

use Wiki_418\Application;

$app = new Application();
$response = $app->handle($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);

echo $response;