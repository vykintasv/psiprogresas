<?php

	/**
	 * 
	 *  Template singleton
	 * 
	 */

	require_once(PATH_LIBS . 'smarty/Smarty.class.php');

	class Template extends Smarty {
		
		private static $instance;
		
		public function Template($user = '', $password = '', $db = '', $host = 'localhost') {

			if (isset(Template::$instance)) {
				
				fatalError('Template already initialized');
				
				return -1;
				
			} else {
				
				if (!is_writeable(PATH_CACHE . 'smarty/') || !is_writable(PATH_CACHE . 'smarty/cache/')) {
					
					fatalError('Compilation directory is not writeable');
					
				}				

				$smarty = new Smarty();
				$smarty->template_dir = PATH_APP   . 'templates/';
				$smarty->cache_dir 	  = PATH_CACHE . 'smarty/cache/';
				$smarty->compile_dir  = PATH_CACHE . 'smarty/';
				
				self::$instance = $smarty;
				
				return $smarty;
				
			}
				
		}

		// grazinam singleton`a
		public static function getInstance() {
			
			if (!isset(self::$instance)) {
				
				$template_class = __CLASS__;
				
				new $template_class();
				
			}
			
			return self::$instance;
			
		}
		
	    public function __clone() {
	    	
	        fatalError('Template clone not allowed');
	        
	    }
		
	}