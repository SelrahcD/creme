<?php

class Public_Page_Controller extends Base_Controller {
	
	public function action_index(){
		$this->layout->content = 'index';
	}

	public function action_about(){
		$this->layout->content = 'about';
	}
}