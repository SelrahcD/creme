<?php

class Member_Account_Controller extends Base_Controller {

	public $restful = true;

	public function __construct() {
		parent::__construct();
		/* User have to be logged in for every action */
		$this->filter('before', 'auth');
	}

	public function get_index(){
		$user = Auth::user();
		$this->layout->content = View::make('member::account.view')->with('user', $user);
	}

	public function get_edit(){
		$user = Auth::user();
		$form = Formly::make($user);
		$this->layout->content = View::make('member::account.edit')->with('form', $form);
	}

	public function post_edit(){
		$user = Auth::user();

		/* Is current password valid */
		if(!Hash::check(Input::get('current_password'), $user->password)){
			$messages = new Laravel\Messages();
			$messages->add('current_password', 'Le mot de passe actuel est incorrect.');
			return Redirect::back()->with_input()->with_errors($messages);
		}
		
		/* Trying to change pwd */
		if(Input::has('password')){
			$rules['password'] = User::$rules['password'].'|confirmed';
			$validator = Validator::make(Input::get(), $rules);
			if($validator->fails()){
				return Redirect::back()->with_input()->with_errors($validator);
			}
			$user->password = Input::get('password');
		}

		/* Trying to change name */
		if(Input::has('name')){
			$user->name = Input::get('name');
		}

		/* Trying to change email address */
		if(Input::has('email')){
			$user->email = Input::get('email');
		}

		/* Store it on DB */
		if($user->save()){
			return Redirect::to('account');
		}
		else return Redirect::back()->with_input()->with_errors($user->errors);
	}

}