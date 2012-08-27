<?php

/**********************************************
 * Auth routes
 *********************************************/
/* Register */
Route::get('register', 'auth::auth@register');
Route::post('register', 'auth::auth@register');

/* Login */
Route::get('login', 'auth::auth@login');
Route::post('login', 'auth::auth@login');

/* Logout */
Route::get('logout', 'auth::auth@logout');

/**********************************************
 * Account routes
 *********************************************/
Route::controller('auth::account');


/**********************************************
 * Add to menu
 *********************************************/
/* Add auth category to menu */
Menu::handler('nav')->add('auth', 'Auth', Menu::items('auth'));

$menu = Menu::handler('nav')->find('auth');

if(Auth::check()){
	$menu->add('account', 'Account')
		 ->add('logout', 'Logout');
}
else {
	$menu->add('login', 'Login')
		 ->add('register', 'Register');
}
