<?php

class Create_Artists_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		// Create artists table
		Schema::create('artists', function($table){
			$table->increments('id');
			$table->string('name');
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		// Delete artists table
		Schema::drop('artists');
	}

}