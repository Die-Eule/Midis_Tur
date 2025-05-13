<?php

namespace App\Http\Controllers;
use App\Models\Photo;
use App\Models\Department;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function index(string $id)
    {
        $gallery = Photo::where('department_id', $id)->where('project_id', 0)->get();
        $department = Department::where('id', $id)->first();
        return view('dashboard6', compact('department', 'gallery'));
    }
}
