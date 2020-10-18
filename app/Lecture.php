<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    protected $table = 'lecture';
    protected $casts = [
        'classes' => 'array',
        'use_nickname' => 'boolean',
        'use_classes' => 'boolean'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'lecture_goal_desc', 'lecture_start_date',
        'lecture_end_date', 'use_nickname', 'use_classes', 'classes'
    ];
}
