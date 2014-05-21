<?php

use Illuminate\Database\Migrations\Migration;

class Clicks extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('clicks', function($table) {
            $table->integer('post_id');
            $table->timestamps();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('clicks');
	}

}