<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class news_topic extends Model {

    //

    //
    protected $table = 'news_topic';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ['id','topic','email','views'];

}
