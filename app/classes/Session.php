<?php

	/**
	 * Vartotojo sesijos mechanizmas
	 *
	 */

	class Session {
		
		public $current_user;
		
		public function Session() {
			
			// patikrinam ar yra kas nors prisijunges
			
			if (isset($_SESSION['current_user'])) {
				
				//TODO: reikalingas tolimesnis patikrinimas
				
				$this->current_user = $_SESSION['current_user'];
				
			} else {
				
				$this->current_user = false;
				
			}
			
		}
		
		public function isLoggedIn() {
			
			return false;
			
		}
		
	}