<?php
use App\App;

$config = dirname(__FILE__) . '/../protected/config.php';
$framework = dirname(__FILE__) . '/../framework/app.php';

// @todo[m]: remove this hardcoded part
define('BASE_PATH', '/def/web/');
/*
 * Run the application
 */
require_once($config);
require_once($framework);

session_start();

$app = new App($config);
$app->createWebApp($config);