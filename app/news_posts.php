<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class news_posts extends Model {


    protected $table = 'news_posts';



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','topic_id','email','datetime','topic','link','file_name','message','views','file'];



}


