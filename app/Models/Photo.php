<?php

namespace App\Models;

use Illuminate\Support\Facades\Vite;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'path',
        'project_id',
        'department_id',
    ];

    protected $hidden = ['created_at','updated_at','department_id'];

    private function checkImageAlignment(string $path): string {
        list($img_w, $img_h) = getimagesize(base_path($path));
        return $img_w < $img_h ? 'object-contain' : 'object-cover';
    }

    protected function alignment(): Attribute
    {
        return Attribute::make(
            get: fn (?string $value, array $attributes) => Photo::checkImageAlignment($attributes['path']),
        );
    }

    protected function path(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => Vite::asset($value),
        );
    }

}
