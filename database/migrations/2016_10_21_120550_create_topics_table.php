<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('topics', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('post_id')->unsigned();
            $table->text('topic');
            $table->timestamps();
    });

    Schema::create('topics', function($table)
    {

        $table->foreign('post_id')->references('id')->on('newsfeed')->onDelete('cascade');
    });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('topics');

	}

}
