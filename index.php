<?php
define('APP_DOCUMENT_ROOT', dirname(__FILE__));
require_once APP_DOCUMENT_ROOT . '/config.php';
include_once APP_DOCUMENT_ROOT . '/libs/slim/autoload.php';
require_once APP_DOCUMENT_ROOT . '/libs/database.php';
require_once APP_DOCUMENT_ROOT . '/app/JsonResponse.php';
require_once APP_DOCUMENT_ROOT . '/app/Base.php';
require_once APP_DOCUMENT_ROOT . '/app/Model.php';
require_once APP_DOCUMENT_ROOT . '/app/Controller.php';

$app = new \Slim\Slim();
require_once 'app/routes.php';
$app->run();




