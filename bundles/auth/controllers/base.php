<?php 

class Auth_Base_Controller extends Controller {

		public $restful = true;
		public $layout = true;

		public function layout(){

			$this->layout = View::make('layouts.default');

			return $this->layout;
		}

	}