<?php

namespace App\Http\Controllers;
use App\Models\Photo;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    
    public function index(string $id)
    {
        $gallery = Photo::where('department_id', $id)->where('project_id', 0)->orderBy('updated_at', 'desc')->get()->append('url');
        $department = Department::where('id', $id)->first();
        return view('dashboard6', compact('department', 'gallery'));
    }

    public function add(Request $req, string $id)
    {
        if ($req->hasFile('new_photo')) {
            $path = 'images/dep/'.$id;
            $data['path'] = $req->file('new_photo')->store($path, 'public');
            $data['project_id'] = 0;
            $data['department_id'] = $id;
            Photo::create($data);
        }
        return redirect()->back();
    }

    public function remove(Request $req)
    {
        $photo = Photo::where('id', $req->input('photo_id'))->first();
        if ($photo) {
            Storage::disk('public')->delete($photo->path);
            $photo->delete();
        }

        return redirect()->back();
    }
}
