<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class EvaluationMarks extends Model {

    protected $table = 'evaluation_mark';
    
    protected $fillable = [
            
            'stuid',
            'stuemail',
            'stugrpid',
            'proposalpresent',
            'proposalreport',
            'srsreport',
            'protopresent',
            'midpresent',
            'midreport',
            'finalprsent',
            'finalreport',
            'viva',
            'researchbook',
            'researchpaper',
            'website',
            'status',
            'total'
        ];
}
