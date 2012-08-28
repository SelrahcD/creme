<?php

class Videos_Controller extends Base_Controller{

	public $restful = true;

	public function __construct() {
		parent::__construct();
		/* User have to be logged in for every action */
		$this->filter('before', 'auth')->except(array('index', 'list', 'watch'));
		/* Only user with moderate right on video can activate video */
		$this->filter('before', 'authority:video:moderate')->only(array('waiting', 'activate'));
	}

	public function get_index(){
		$this->get_list();
	}

	public function get_suggest(){
		$form = new Formly();
		$this->layout->content = View::make('videos.suggest')->with('form', $form);
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

	public function get_waiting(){
		$videosList = Video::with('artist')->where('activated', '=', '0')->get();
		$this->layout->content = View::make('videos.waiting_list')->with('videosList', $videosList);
	}

	public function get_activate($id){
		/* Retrieving video*/
		if(!($video = Video::find($id))){
			return Redirect::to('videos/waiting');
		}

		/* Activating video */
		$video->activated = 1;
		if(!$video->save()){
			throw new Exception('Error occured when activating video');
		}
		return Redirect::to('videos/waiting');
	}

	public function get_watch($slug){

		/* Get id from slug */
		$id = strstr($slug, '-', true);

		/* try to fetch video by id */
		if(($video = Video::with('artist')->find($id)) == null || $slug != $video->slug())
			return Response::error('404');

		/* create view */
		$this->layout->content = View::make('videos.watch');

		/* Add info to view */
		$this->layout->content->with(array(
				'artist' => $video->artist->name,
				'title' => $video->title,
				'url' => $video->url));
	}

	/**
	 * Display video list
	 */
	public function get_list($sortMode = 'artist'){
		/* create view */
		$this->layout->content = View::make('videos.list');

		/* sort videos by add date */
		if($sortMode == 'date'){
			$this->layout->content->sortMode = 'date';
			$this->layout->content->videos   = Video::with('artist')->order_by('created_at', 'desc')->get();
		}
		/* sort video by artist name */
		else {
			$this->layout->content->sortMode = 'artist';
			$this->layout->content->artists  = Artist::with('videos')->order_by('name','asc')->get();
		}
		

	}
}