<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comments', function(Blueprint $table)
		{
			            $table->increments('id');
                        $table->integer('post_id')->unsigned();
                        $table->string('username');
                        $table->datetime('timedate');
                        $table->text('description');
                        $table->binary('file');
                        $table->binary('link');
                        $table->string('file_name');
                        $table->boolean('approved');
                        $table->timestamps();
                });
                
                Schema::create('comments', function($table)
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
		Schema::drop('comments');
    //Schema::dropForeign(['post_id']);
}
        
      

}
