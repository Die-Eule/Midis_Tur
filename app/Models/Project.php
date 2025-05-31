<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'author',
        'grade',
        'year',
        'department_id',
    ];

    protected $hidden = ['created_at','updated_at','department_id','url'];
}
