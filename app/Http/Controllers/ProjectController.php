<?php

namespace App\Http\Controllers;
use App\Models\Project;
use App\Models\Photo;
use App\Models\Department;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(string $id)
    {
        $projects = Project::where('department_id', $id)->get();
        $gallery = Photo::where('department_id', $id)->where('project_id', '<>', 0)->get()->groupBy('project_id');
        $department = Department::where('id', $id)->first();
        return view('dashboard5', compact('department', 'projects', 'gallery'));
    }
}
