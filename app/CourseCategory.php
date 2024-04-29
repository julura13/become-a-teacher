<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseCategory extends Model
{
    use HasFactory;

    protected $with = [
        'courses'
    ];

    protected $fillable = [
        'name',
    ];

    public static function search($search)
    {
        return empty($search) ? static::query()
            : static::query()->where('id', 'like', '%'.$search.'%')
            ->orWhere('name', 'like', '%'.$search.'%');
    }

    public function courses()
    {
        return $this->hasMany('App\Course');
    }
}
