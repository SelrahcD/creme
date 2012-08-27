<?php

class Video extends Aware {
	
	/**
    * Aware validation rules
    */
    public static $rules = array(
        'user_id'   => 'required|exists:users,id',
        'title'     => 'required|min:1',
        'artist_id' => 'required|integer|exists:artists,id',
        'url'       => 'required|url|unique:videos',
        'activated' => 'required|integer|in:0,1',
    );
    
    /**
    * Attribute accessible for mass assignment
    * @var array
    */
    public static $accessible = array('title');

	public function artist(){
        return $this->belongs_to('Artist');
    }

    public function sender(){
        return $this->belongs_to('User');
    }
}