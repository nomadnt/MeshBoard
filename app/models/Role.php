<?php

class Role extends Eloquent {

	public $timestamps = FALSE;

    public function users(){
        return $this->belongsToMany('User', 'users_roles');
    }

}