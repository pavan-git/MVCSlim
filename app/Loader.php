<?php

class App_Loader {

	protected static $includeCache = array();

	public static function includeOnce($filePath, $muteWarning = false, $fileExtension = 'php') {
		if (isset(self::$includeCache[$filePath])) {
			return true;
		}

		$allowedExtensions = array('php');

		$file = '';
		if (!in_array($fileExtension, $allowedExtensions)) {
			return $file;
		}

		$file = str_replace('.', DIRECTORY_SEPARATOR, $filePath) . ".$fileExtension";
		if (!file_exists($file)) {
			return false;
		}

		$status = -1;

		if ($muteWarning) {
			$status = @include_once $file;
		} else {
			$status = include_once $file;
		}

		$success = ($status === 0) ? false : true;

		if ($success) {
			self::$includeCache[$filePath] = $file;
		}
		return $success;
	}

	public static function autoLoad($className) {
		$parts = explode('_', $className);
		$noOfParts = count($parts);
		if ($noOfParts > 2) {
			$filePath = 'app.';
			// Append modules and sub modules names to the path
			for ($i = 0; $i < ($noOfParts - 2); ++$i) {
				$filePath .= $parts[$i] . '.';
			}
			$fileName = $parts[$noOfParts - 2];
			$fileComponentName = strtolower($parts[$noOfParts - 1]) . 's';
			$filePath .= $fileComponentName . '.' . $fileName;
			return App_Loader::includeOnce($filePath);
		}

		return false;
	}

}

spl_autoload_register('App_Loader::autoLoad');
