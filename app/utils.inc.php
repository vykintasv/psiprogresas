<?php

	/**
	 * Automatinis klasiu uzkrovimas
	 * http://php.net/manual/en/language.oop5.autoload.php
	 * 
	 * @param String $class_name
	 */

	function __autoload($class_name) {
		
    	require_once(PATH_CLASSES . $class_name . '.php');
    	
	}
	
	/**
	 * Naudojamas nutraukti darbui ankstyvoj stadijoj
	 * Toks nutraukimas niekada neturetu ivykti kai vartotojas
	 * naudojasi produktu. Jis naudojamas pvz. kai del instaliaciniu klaidu
	 * nepavyksta ko nors paleisti.
	 *
	 * @param String $message
	 */

	function fatalError($message) {
		
		print '<b>ERROR:</b> '.$message;
		
		exit(0);
		
	}
	
	
	function redirect($url) {
		
		header('Location: ' . $url);
		
		ob_flush();
		exit(0);
		
	}