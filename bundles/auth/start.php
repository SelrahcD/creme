<?php 

Autoloader::map(array(
	'User' => Bundle::path('auth').'models/user.php',
	'Role' => Bundle::path('auth').'models/role.php'));