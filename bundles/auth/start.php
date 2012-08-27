<?php 

Autoloader::map(array(
	'Auth_Base_Controller' => Bundle::path('auth'). 'controllers/base.php',
	'User' => Bundle::path('auth').'models/user.php'));