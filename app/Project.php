<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;
class Project extends Model {

	//
    protected $table = 'projects';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable =['id','title','description','url','supervisorId','studentId','status','nbqsa'];

 

    public  static  function validate($data){

        return Validator::make($data,static::$rules);
    }
}
