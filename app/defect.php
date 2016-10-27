<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class defect extends Model {

    protected $table = 'defects';

    protected $fillable = [

        'defect',
        'description',
        'plantofinish',
        'state',
        'sdate',
        'edate',
        'hours'
    ];
}
