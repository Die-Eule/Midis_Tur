<?php

namespace App\Http\Controllers;
use App\Models\Project;
use App\Models\Photo;
use App\Models\Department;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    
    public function index(string $id)
    {
        $projects = Project::where('department_id', $id)->get();
        $gallery = Photo::where('department_id', $id)->where('project_id', '<>', 0)->orderBy('id', 'asc')->get()->append(['alignment', 'url'])->groupBy('project_id');
        $department = Department::where('id', $id)->first();
        return view('dashboard5', compact('department', 'projects', 'gallery'));
    }

    public function add(Request $req, string $id)
    {
        if ($req->input('project_id') == 'new') { // Добавление карточки новой работы студента
            $project = new Project;
            $project->author = $req->input('author');
            $project->grade = $req->input('grade');
            $project->year = $req->input('year');
            $project->department_id = $id;
            $project->save();

            if ($req->hasFile('title')) {
                $photo = new Photo;
                $photo->path = $req->file('title')->store('images/dep/'.$id, 'public');
                $photo->project_id = $project->id;
                $photo->department_id = $id;
                $photo->save();
            }

            foreach ($req->file() as $key => $file) {
                if (substr($key, 0, 9) != 'dop_photo') continue;
                $photo = new Photo;
                $photo->path = $file->store('images/dep/'.$id, 'public');
                $photo->project_id = $project->id;
                $photo->department_id = $id;
                $photo->save();
            }
        } else {    // Обновление существующей карточки
            $project = Project::where('id', $req->input('project_id'))->first();
            $project->author = $req->input('author');
            $project->grade = $req->input('grade');
            $project->year = $req->input('year');
            $project->department_id = $id;
            $project->save();
            
            $gallery = Photo::where('project_id', $project->id)->orderBy('id', 'asc')->get();
            foreach ($req->input() as $key => $value) {
                if (substr($key, 0, 9) != 'del_photo') continue;
                $photo = $gallery->find($value);
                if ($photo) {
                    Storage::disk('public')->delete($photo->path);
                    $photo->delete();
                }
            }

            foreach ($req->file() as $key => $file) {
                if (substr($key, 0, 9) == 'dop_photo') {
                    $photo = new Photo;
                    $photo->path = $file->store('images/dep/'.$id, 'public');
                    $photo->project_id = $project->id;
                    $photo->department_id = $id;
                    $photo->save();
                } else if ($key == 'title') {
                    $photo = $gallery->first();
                    if ($photo) {
                        $path = $file->store('images/dep/'.$id, 'public');
                        Storage::disk('public')->delete($photo->path);
                        $photo->path = $path;
                        $photo->save();
                    }
                }
            }
        }

        return redirect()->back();
    }

    public function remove(Request $req)
    {
        $project = Project::where('id', $req->input('project_id'))->first();
        $gallery = Photo::where('project_id', $project->id)->get();

        $gallery->each( function($photo) {
            if ($photo) {
                Storage::disk('public')->delete($photo->path);
                $photo->delete();
            }
        });
        
        $project->delete();
        return redirect()->back();
    }
}
