<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class newsfeed extends Model { 
    
    
    protected $table = 'newsfeed';



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','topic_id','batch_id','group_id','email','datetime','topic','link','file_name','message','views','file'];



}


