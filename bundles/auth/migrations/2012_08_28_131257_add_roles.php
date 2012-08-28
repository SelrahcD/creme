<?php

class Auth_Add_Roles {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Bundle::start('auth');
		/* Add all roles specified on role model if not existing yet */
		foreach(Role::$roles as $roleName)
		{
			if(($role = Role::where_name($roleName)->first()) == null)
			{
				echo "\n". 'Create new role : ' . $roleName;
				$role = new Role;
				$role->name = $roleName;
				if($role->save()){
					echo "\n\t". 'Succeed';
				}
				else echo "\n\t". 'Failed';
			}
			else echo "\n" . 'Role ' . $roleName . ' already exists';
		}
		echo "\n";
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Bundle::start('auth');
		/* Remove all roles in role model */
		foreach(Role::$roles as $roleName)
		{
			if(($role = Role::where_name($roleName)->first()) != null)
			{
				echo "\n". 'Delete role : ' . $role->name;
				if($role->delete()){
					echo "\n\t" . 'Succeed';
				}
				else echo "\n\t" . 'Failed';
			}
		}
		echo "\n";
	}

}