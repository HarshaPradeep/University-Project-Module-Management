<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class newsfeed extends Model { 
    
    
    protected $table = 'newsfeed';



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','batch_id','group_id','username','datetime','topic','message'];



}


