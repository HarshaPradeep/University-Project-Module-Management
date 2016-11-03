<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model {

	//

    //
    protected $table = 'message';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ['id','sender_id', 'receiver_id', 'message', 'parent','date'];

}
