<?php

class App_Model extends App_Base {

	protected $db = null;

	public function __construct() {
		$this->db = database::getInstance();
	}

}
