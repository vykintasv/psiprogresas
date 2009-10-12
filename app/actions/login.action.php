<?php

	class Login extends ActionController {
		
		public function Login() {
			
			
			
		}
		
		public function index() {
			
			$tpl = &Template::getInstance();

			$tpl->display('login/index.htm');
			
		}
		
	}