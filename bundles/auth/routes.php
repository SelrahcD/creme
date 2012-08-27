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
 * Add to menu
 *********************************************/
/* Add auth category to menu */
Menu::handler('nav')->add('auth', 'Auth', Menu::items('auth'));

$menu = Menu::handler('nav')->find('auth');

if(Auth::check()){
	$menu->add('logout', 'Logout');
}
else {
	$menu->add('login', 'Login')
		 ->add('register', 'Register');
}
