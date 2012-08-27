<?php

class Public_Controller extends Base_Controller {
	
	public function action_home(){
		$this->layout->content = 'index';
	}

	public function action_about(){
		$this->layout->content = 'about';
	}
}