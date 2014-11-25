<?php

class App_Controller extends App_Base {

	protected $app = null;
	protected $response = null;

	public function __construct(\Slim\Slim $app) {
		$this->app = $app;
		$this->response = App_JsonResponse::getInstance($app);
	}

	public function getResponseObj() {
		return $this->response;
	}

}
