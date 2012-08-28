<?php

class Admin_Users_Controller extends Admin_Base_Controller {
	
	public $restful = true;

	public function __construct(){
		parent::__construct();
		/* User must be logged in */
		$this->filter('before', 'auth');

		/* User must be allowed to moderate user */
		$this->filter('before', 'authority:user:moderate');
	}

	public function get_index(){
		$usersList = User::all();
		$this->layout->content = View::make('admin::users.list')->with('usersList', $usersList);
	}

	public function get_edit($id){

		/* Search user */
		if(!($user = User::find($id))){
			return Redirect::to('admin/users');
		}

		$form = Formly::make($user);
		$this->layout->content = View::make('admin::users.edit')
			->with('form', $form)
			->with('user', $user);
	}

	public function post_edit(){

		/* Search user */
		if(!($user = User::find(Input::get('id')))){
			return Redirect::to('admin/users');
		}

		/***********
		 * NAME & MAIL 
		 ***********/
		$user->name  = Input::get('name');
		$user->email = Input::get('email');

		if(!$user->save()){
			return Redirect::back()->with_input()->with_errors($user->errors);
		}

		/***********
		 * ROLES
		 ***********/
		/* For each role check if user already have it or not */
		foreach(Role::$roles as $roleName){

			/* User have a new role, add it*/
			if(Input::has('roles_'.$roleName) && !$user->has_role($roleName)){
				$role = Role::where_name($roleName)->first();
				if(!$role){
					throw new UnexpectedValueException('Unknown role ' . $roleName . '. You have to add it to your database.');
				}
				$user->roles()->attach($role->id);
			}
			/* User loose a role, remove it*/
			elseif(!Input::has('roles_'.$roleName) && $user->has_role($roleName)){
				/* Admin is a special case, Current user can't remove his admin role */
				if($roleName != 'admin' || Authority::can('unset_admin_role', 'User', $user)){
					$role = Role::where_name($roleName)->first();
					$user->roles()->detach($role->id);
				}
			}
		}
		return Redirect::to('admin/users');
	}
}