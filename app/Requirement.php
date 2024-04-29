<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
    use HasFactory;

    protected $fillable = [
        'pathway_id',
        'pathway_name',
        'course_1_id',
        'course_2_id',
        'course_3_id',
        'course_1_name',
        'course_2_name',
        'course_3_name',
    ];

    public function pathway()
    {
        return $this->belongsTo('App\Pathway');
    }
}
