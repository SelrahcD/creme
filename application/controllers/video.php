<?php

class Video_Controller extends Base_Controller{

	public $restful = true;

	public function __construct() {
		parent::__construct();
		/* User have to be logged in for every action */
		$this->filter('before', 'auth');
	}

	public function get_suggest(){
		$form = new Formly();
		$this->layout->content = View::make('video.suggest')->with('form', $form);
	}

	public function post_suggest(){
		$this->layout->content = 'suggest logic';
	}
}