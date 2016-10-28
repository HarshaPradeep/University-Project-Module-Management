<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewstopicTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('newstopic', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('post_id')->unsigned();
            $table->text('topic');
            $table->timestamps();
        });

        Schema::create('newstopic', function($table)
        {

            $table->foreign('post_id')->references('id')->on('newsposts')->onDelete('cascade');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('newstopic');
	}

}
