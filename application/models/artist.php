<?php

class Artist extends Aware {
	
	/**
    * Aware validation rules
    */
    public static $rules = array(
        'name' => 'required|min:1',
    );

    public static $timestamps = false;

    public function videos(){
        return $this->has_many('Video');
    }
}