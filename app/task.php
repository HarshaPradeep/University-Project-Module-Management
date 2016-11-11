<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class task extends Model {

    protected $table = 'tasks';
    protected  $primaryKey = 'id';

    protected $fillable = [
            'studentId',
			'groupId',
            'task',
            'description',
            'plantofinish',
            'state',
            'sdate',
            'edate',
            'hours'
        ];
}
