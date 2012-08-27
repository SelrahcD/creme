<?php

class Role extends Model {

    public function users()
    {
        return $this->has_many_and_belongs_to('User');
    }

}