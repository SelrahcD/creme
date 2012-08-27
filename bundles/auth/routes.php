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
//Route::controller('auth::account');
