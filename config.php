<?php

$appConfig = array(
	'mode' => 'development',
	'debug' => true,
	'db_username' => 'root',
	'db_password' => '',
	'db_name' => 'ondemand',
	'log.enable' => false,
	'api_prefix' => '/api/v1',
);

class config {

	protected static $config = array();

	public function __construct($appConfig){
		self::$config = $appConfig;
	}

	public static function get($key) {
		if(self::has($key)) {
			return self::$config[$key];
		}

		return null;
	}

	public static function has($key) {
		if(array_key_exists($key, self::$config)) {
			return true;
		}
		return false;
	}

	public static function run($config=array()){
		return new self($config);
	}
}

Config::run($appConfig);

