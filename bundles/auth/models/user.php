<?php

class User extends Aware {

    /**
    * Aware validation rules
    */
    public static $rules = array(
        'name' => 'required|min:2|unique:users',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6'
    );

    /**
    * Attribute accessible for mass assignment
    * @var array
    */
    public static $accessible = array( 'name', 'email' );

    /**
    * Action to perform before saving object on DB
    * *Hash password
    * @return boolean True
    */
    public function onSave()
    {
        /* if there's a new password, hash it */
        if($this->changed('password'))
        {
            $this->password = Hash::make($this->password);
        }

        return true;
    }

    public static $timestamps = true;

    public function roles()
    {
        return $this->has_many_and_belongs_to('Role', 'role_user');
    }

    public function has_role($key)
    {
        foreach($this->roles as $role)
        {
            if($role->name == $key)
            {
                return true;
            }
        }

        return false;
    }

    public function has_any_role($keys)
    {
        if( ! is_array($keys))
        {
            $keys = func_get_args();
        }

        foreach($this->roles as $role)
        {
            if(in_array($role->name, $keys))
            {
                return true;
            }
        }

        return false;
    }
}
