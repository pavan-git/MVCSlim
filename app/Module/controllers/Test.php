<?php

class Module_Test_Controller extends App_Controller {

	public function extecute() {
		$testData = Module_Test_Model::getTestData();
		$this->response->emit($testData);
	}

}
