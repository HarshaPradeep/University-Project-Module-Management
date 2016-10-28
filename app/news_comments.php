<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class news_comments extends Model  {



    protected $table = 'news_comments';



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','post_id','email','timedate','description','link','file_name','file','approved'];



}

