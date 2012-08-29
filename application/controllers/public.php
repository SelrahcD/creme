<?php

class Public_Controller extends Base_Controller {
	
	public function action_home(){
		$video = Video::where('activated', '=', 1)->order_by('created_at', 'desc')->first();
		/* create view */
		$this->layout->content = View::make('videos.watch');

		/* Add info to view */
		$this->layout->content->with(array(
				'artist' => $video->artist->name,
				'title' => $video->title,
				'url' => $video->url));
	}

	public function action_about(){
		$this->layout->content = 'about';
	}
}