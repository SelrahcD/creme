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

    public function set_url($url){
         $this->set_attribute('url',  $this->convertURL($url));
    }

    /**
    * Action to perform before saving object on DB
    * *Convert video url for integration
    * @return boolean Validation of rules result
    */
    // public function onSave(){
    //     // if there's a new url convert it
    //     if($this->changed('url')){
    //         try {
    //           $this->url =  $this->convertURL($this->url);
    //         }
    //         catch(InvalidArgumentException $e){
    //             return false;
    //         }
    //     }
    //     return $this->valid($this->rules);
    // }

    private function convertURL($url){
        if(strpos($url, 'youtube')){

            if(strpos($url, 'embed')){
                return $url;
            }

            if($res = strstr($url, 'v=')){
            $res = substr($res, 2);
            if(strstr($res, '&'))
                $res = strstr($res, '&', true);
            return 'http://www.youtube.com/embed/' . $res;
            }
            throw new InvalidArgumentException('Invalid Youtube URL');
        }
        else if(strpos($url, 'dailymotion')){

            if(strpos($url, 'embed')){
                return $url;
            }

            $res = substr(strrchr($url, "/"),1);
            if($res = strstr($res, '_', true)){
                return 'http://www.dailymotion.com/embed/video/'.$res;
            }
            throw new InvalidArgumentException('Invalid Dailymotion URL');
        }

        throw new InvalidArgumentException('Invalid video provider. We only handle youtube and dailymotion');

    }

    public function slug(){
        $slug = preg_replace('/\W+/', '-', $this->artist->name.'-'.$this->title);
        $slug = strtolower(trim($slug, '-'));
        return $this->id . '-' . $slug;
    }
}