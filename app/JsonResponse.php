<?php

class App_JsonResponse {

	protected $app = null;

	public function __construct(\Slim\Slim $app) {
		$this->app = $app;
	}

	public function emit($data) {
		$this->app->response()->header("Content-Type", "application/json");
		echo json_encode($data);
	}
	
	public static function getInstance(\Slim\Slim $app){
		return new self($app);
	}

}
