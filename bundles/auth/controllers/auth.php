<?php

class Auth_Auth_Controller extends Base_Controller {

	public $restful = true;

	public function get_register(){
		$form = new Formly();
		$form->display_inline_errors = true;
		$this->layout->content = View::make('auth::auth.register')->with('form', $form);
	}

	public function post_register(){
		/* Get rules from user model */
		$rules = User::$rules;

		/* Add confirmation to password's rules */
		$rules['password'] .= '|confirmed';

		/* Validate */
		$validator = Validator::make(Input::get(), $rules);
		if($validator->fails()){
			return Redirect::back()->with_input()->with_errors($validator);
		}

		/* Create new user */
		$user = new User;
		$user->fill(Input::all());
		$user->password = Input::get('password');

		/* Store it on DB*/
		if($user->save()){
			return Redirect::home();
		}
		else return Redirect::back()->with_input()->with_errors($user->errors);
	}

	public function get_login(){
		$form = new Formly();
		$form->display_inline_errors = true;
		$this->layout->content = View::make('auth::auth.login')->with('form', $form);
	}

	public function post_login(){
		$credentials = array(
			'username' => Input::get('email'),
			'password' => Input::get('password')
			);

		if ( Auth::attempt($credentials) ){
			return Redirect::home();
		}
		else return Redirect::back()->with_input()->with('login_errors', true);
	}

	public function get_logout(){
		Auth::logout();
		return Redirect::home();
	}

}