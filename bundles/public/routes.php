<?php

Route::any('/', 'public::page@index');
Route::any('about', 'public::page@about');

/**********************************************
 * Add to menu
 *********************************************/
/* Add public category to menu */
Menu::handler('nav')->add('public', 'Public', Menu::items('public'));

$menu = Menu::handler('nav')->find('public');
$menu->add('/', 'Home Page')
	 ->add('about', 'About');
