<?php

	/**
	 * 
	 *  Database singleton
	 * 
	 */

	require_once(PATH_LIBS . 'ez_sql.php');

	class Database extends db {
		
		private static $instance;
		
		//- db lenteles
		public $TABLE_USERS;
		
		// lenteliu prefeksas
		private $conf_table_prefix = 'penen_';

		public function Database($user = '', $password = '', $db = '', $host = 'localhost') {

			// jeigu jau buvo sukurtas toks objektas, tai reikia naudoti Database::getInstance();
			if (isset(Database::$instance)) {
				
				fatalError('Database already initialized');
				
				return -1;
				
				
			} else {
				
				if (!parent::db($user, $password, $db, $host)) {
					
					fatalError('Database error');
					
				}
				
				self::$instance = 1;
				
				$this->TABLE_USERS = $this->conf_table_prefix . 'users';
				
				return 1;
				
			}
				
		}

		// grazinam singleton`a
		public static function getInstance($user = '', $password = '', $db = '', $host = 'localhost') {
			
			if (!isset(self::$instance)) {
				
				$database_class = __CLASS__;
				self::$instance = new $database_class($user, $password, $db, $host);
				
			}
			
			return self::$instance;
			
		}
		
	    public function __clone() {
	    	
	        fatalError('Database clone not allowed');
	        
	    }
		
	}