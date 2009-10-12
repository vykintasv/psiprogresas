<?php

	$pathinfo = pathinfo(__FILE__);
	
	// nustatom absoliucius kelius iki naudojamu katalogu
	
	define('PATH_APP',      $pathinfo['dirname'].'/');
	define('PATH_ROOT',     str_replace('app', '', $pathinfo['dirname']));
	define('PATH_CACHE',    PATH_ROOT . 'cache/');
	define('PATH_LIBS',     PATH_ROOT . 'libs/');
	define('PATH_CLASSES',  PATH_APP . 'classes/');
	define('PATH_ACTIONS',  PATH_APP . 'actions/');
	define('PATH_PUBLIC',   PATH_ROOT . 'public_html/');
	
	// visokiu nepriklausomu funkciju rinkinys
	
	require_once(PATH_APP . 'utils.inc.php');
	
	// db
	
	require_once(PATH_CLASSES . 'Database.php');
	
	$developers = array('root' => 'vilius@idea.lt');
	
	if (in_array($_SERVER['SERVER_ADMIN'], $developers)) {
		
		define('DEVELOPMENT', 1);
		
		$db = new Database('root', 'root', 'penen_eu');

	} else {
		
		define('DEVELOPMENT', 0);
		
		$db = new Database('root', 'root', 'penen_eu');
		
	}

	// pagrindine klase
	
	$app = new Application();
	
	