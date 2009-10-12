<?php

	class Arguments {
		
		private static $args;
		private static $instance = false;
		
		public function Arguments() {
			
			if (Arguments::$instance == true) return;
			
			Arguments::$instance = true;
			
			if (DEVELOPMENT) {
				
				// SITA REIKIA PAKEISTI PAGAL KIEKVIENO KONFIGURACIJA
				// pvz. http://localhost/penen.eu/public_html/
				// TODO: padaryti kad automatiskai atsektu, kur URL`e yra subfolderis
				$working_uri = '/penen.eu/public_html/';
			
				Arguments::$args = explode('/', str_replace($working_uri, '', $_SERVER['REQUEST_URI']));				
				
			} else {
				
				Arguments::$args = explode('/', substr($_SERVER['REQUEST_URI'], 1));
				
			}
			
			
			//- keiciam argumentu pirmasias raides i didziasias
			//- kadangi musu urlas bus penen.eu/action, o veiksmo klase vadinsis Action
			foreach (Arguments::$args as $k => $i) {
				
				Arguments::$args[$k] = ucfirst($i);
				
			}
			
		}
		
		public function getAction() {
			
			if (self::$instance == false) {
				
				$a = new Arguments();
				
			}
			
			return Arguments::$args[0];
			
		}
		
		public function getArgs() {
			
			if (self::$instance == false) {
				
				$a = new Arguments();
				
			}
			
			return Arguments::$args;
			
		}
		
	}