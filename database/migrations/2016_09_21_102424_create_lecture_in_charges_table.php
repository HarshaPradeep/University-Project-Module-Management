<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLectureInChargesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lecture_in_charges', function(Blueprint $table)
		{
			$table->increments('lectureInCharge_id');
			$table->string('lectureInCharge_fullName');
			$table->integer('lectureInCharge_contactNumber');
			$table->string('lectureInCharge_email');
			$table->string('lectureInCharge_speciality');
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
		Schema::drop('lecture_in_charges');
	}

}
