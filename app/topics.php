<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class topics extends Model {

    //

    //
    protected $table = 'topics';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ['id','topic','email','group_id','views'];

}
