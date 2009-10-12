<?php

	class Application {
		
		public $session;
		
		public function Application() {
			
			$this->session = new Session();
			
			if (Arguments::getAction() == 'Login') {
				
				$this->dispatch('Login');
				
			}
			
			if (!$this->session->isLoggedIn()) {
				
			//	redirect('/login');
				
			}
			
		}
		
		public function dispatch($action) {
			
			if (file_exists(PATH_ACTIONS . $action.'.action.php')) {
				
				require_once(PATH_ACTIONS . $action.'.action.php');
				
			} else {
				
				fatalError('Action not found');
				
			}
			
			$a = new $action;
			
			$a->index();
			
		}
		
	}