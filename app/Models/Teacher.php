<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'surname',
        'name',
        'middlename',
        'position',
        'pic',
        'department_id',
    ];

    protected $hidden = ['created_at','updated_at','pic'];

    protected function url(): Attribute
    {
        return Attribute::make(
            get: fn (?string $value, array $attributes) => asset('storage/'.($attributes['pic'] ? $attributes['pic'] : 'images/dep/placeholder.webp')),
        );
    }
}
