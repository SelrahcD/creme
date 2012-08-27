<?php

class Create_Videos_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		// Create table
		 Schema::create('videos', function($table)
		{
			$table->increments('id');
			$table->integer('user_id');
			$table->string('title');
			$table->integer('artist_id');
			$table->string('url');
			$table->boolean('activated');
			$table->timestamps();
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		// Delete video tables
		Schema::drop('videos');
	}

}