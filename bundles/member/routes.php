<?php

Route::get('suggest', 'member::video@suggest');
Route::post('suggest', 'member::video@suggest');

/**********************************************
 * Account routes
 *********************************************/
Route::controller('member::account');

/**********************************************
 * Add to menu
 *********************************************/
/* Add member category to menu */
if(Auth::check()){
	/* Add member category */
	Menu::handler('nav')->add('member', 'Member', Menu::items('member'));
	$menu = Menu::handler('nav')->find('member');

	$menu->add('account', 'Account');

	/* Add video sub-category */
	$menu->add('#', 'Videos', Menu::items('video'));
	$video = Menu::handler('nav')->find('video');

	$video->add('suggest', 'Suggest new video');
	$video->add('myvideos', 'View my videos');
}