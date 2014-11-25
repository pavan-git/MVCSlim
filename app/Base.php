<?php

class App_Base {

	protected $values = array();

	public function get($key) {
		if ($this->has($key)) {
			return $this->values[$key];
		}
		return null;
	}

	public function has($key) {
		if (array_key_exists($key, $this->values)) {
			return true;
		}
		return false;
	}

	public function set($key, $value) {
		$this->values[$key] = $value;
	}

	public function getData() {
		return $this->values;
	}

	public function setData($data = array()) {
		$this->values = $data;
	}

}
