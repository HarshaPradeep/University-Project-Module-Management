<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class task_allocation extends Model {

	protected $table = 'task_allocation';

    protected $fillable = ['Student_no','group_id','Supervisor_id', 'date', 'task_allocation' ];

}
