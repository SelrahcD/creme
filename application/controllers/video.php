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

		/* Trying to retrieve artist */
		$artist = Artist::where('name', '=', Input::get('artist'))->first();

		/* If artist isn't found create a new one */
		if(!$artist){
			$artist = new Artist();
			$artist->name = Input::get('artist');
			if(!$artist->save()){
				$errors = $artist->errors;
				$errors->messages['artist'] = $errors->messages['name'];
				return Redirect::back()->with_input()->with_errors( $errors );
			}
		}

		/* Create a new video */
		$video = new Video();
		$video->title = Input::get('title');
		$video->url = Input::get('url');
		$video->artist_id = $artist->id;
		$video->user_id = Auth::user()->id;
		$video->activated = 0;


		if($video->save())	
			return Redirect::home();
		else {
			return Redirect::back()->with_input()->with_errors( $video->errors );
		}
	}
}