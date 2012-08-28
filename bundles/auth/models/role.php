<?php

class Role extends Eloquent {

	/**
	 * List of possibles roles
	 * @var array
	 */
	public static $roles = array('admin', 'video_moderater');

    public function users()
    {
        return $this->has_many_and_belongs_to('User');
    }

}