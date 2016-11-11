<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class defect extends Model {

    protected $table = 'defects';
    protected  $primaryKey = 'id';

    protected $fillable = [
		'studentId',
		'groupId',
        'defect',
        'description',
        'plantofinish',
        'state',
        'sdate',
        'edate',
        'hours'
    ];
}
