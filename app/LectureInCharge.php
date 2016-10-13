<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class LectureInCharge extends Model {

    protected $table = 'lecture_in_charges';



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['lectureInCharge_fullName', 'lectureInCharge_contactNumber','lectureInCharge_email','lectureInCharge_speciality'];

}
