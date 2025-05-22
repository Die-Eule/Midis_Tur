<?php

namespace App\Http\Controllers;
use App\Models\Photo;
use App\Models\Department;
use App\Traits\Common;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    use Common;
    
    public function index(string $id)
    {
        $gallery = Photo::where('department_id', $id)->where('project_id', 0)->get();
        $department = Department::where('id', $id)->first();
        return view('dashboard6', compact('department', 'gallery'));
    }

    public function add(Request $req, string $id)
    {
        if ($req->hasFile('new_photo')) {
            $path = 'dep/'.$id;
            $data['path'] = 'storage/app/private/'.$req->file('new_photo')->store($path);
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
            $this->deleteFile($photo->path);
            $photo->delete();
        }

        return redirect()->back();
    }
}
