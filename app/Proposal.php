<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;
class Proposal extends Model {

	
    public  static $rules=array(
        'projectTitle' => 'required',
        'projectDescription' => 'required',
        'supervisortype' => 'required',


    );

    public  static  function validate($data){

        return Validator::make($data,static::$rules);
    }

}
