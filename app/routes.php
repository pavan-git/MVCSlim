<?php

require APP_DOCUMENT_ROOT . '/app/Loader.php';
$app->get('/', function() use($app) {
	$controller = new Module_Test_Controller($app);
	$controller->extecute();
});




