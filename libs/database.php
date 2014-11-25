<?php

class database {
	protected $dbType = 'mysql';
	protected $dsn = null;
	protected $username = null;
	protected $password = null;
	protected $dbInstance = null;

	public function __construct() {
		$dbName = Config::get('db_name');
		$this->username = Config::get('db_username');
		$this->password = Config::get('db_password');
		$this->dsn = $this->dbType.':dbname='.config::get('db_name');
	}

	public static function getInstance() {
		$self = new self();
		if(!$self->dbInstance) {
			$pdo = new PDO($self->dsn,$self->username,$self->password);
			$self->dbInstance = new NotORM($pdo);	
		}

		return $self->dbInstance;
	}

}