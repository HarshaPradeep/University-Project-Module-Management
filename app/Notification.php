<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model {

	//

    //
    protected $table = 'notification';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ['id','sender_id', 'receiver_id'];

}
