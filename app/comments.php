<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class comments extends Model  {

	

    protected $table = 'comments';



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','post_id','username','timedate','description','link','file_name','file','approved'];

        
        
    }

