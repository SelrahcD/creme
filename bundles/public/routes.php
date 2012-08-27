<?php

Route::any('/', 'public::page@index');
Route::any('about', 'public::page@about');

/**********************************************
 * Add to menu
 *********************************************/
/* Add auth category to menu */
Menu::handler('nav')->add('', 'Auth', Menu::items('public'));

$menu = Menu::handler('nav')->find('public');
$menu->add('/', 'Home Page')
	 ->add('about', 'About');
