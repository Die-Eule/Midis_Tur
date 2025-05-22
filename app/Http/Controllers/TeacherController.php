<?php

namespace App\Http\Controllers;
use App\Models\Teacher;
use App\Models\Department;
use App\Traits\Common;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    use Common;
    
    public function index(string $id)
    {
        $staff = Teacher::where('department_id', $id)->get();
        $department = Department::where('id', $id)->first();
        return view('dashboard4', compact('department', 'staff'));
    }

    public function update(Request $req)
    {
        $teacher = Teacher::where('id', $req->input('teacher_id'))->first();
        $teacher->surname    = $req->input('surname');
        $teacher->name       = $req->input('name');
        $teacher->middlename = $req->input('middlename');
        $teacher->position   = $req->input('position');
        if ($req->hasFile('new_photo')) {
            $path = 'storage/app/private/'.$req->file('new_photo')->store('dep/'.$teacher->department_id);
            $this->deleteFile($teacher->pic);
            $teacher->pic = $path;
        }

        $teacher->save();
        return redirect()->back();
    }

    public function add(Request $req, string $id)
    {
        $teacher['surname']    = $req->input('surname');
        $teacher['name']       = $req->input('name');
        $teacher['middlename'] = $req->input('middlename');
        $teacher['position']   = $req->input('position');
        $teacher['department_id'] = $id;
        if ($req->hasFile('new_photo')) {
            $teacher['pic'] = 'storage/app/private/'.$req->file('new_photo')->store('dep/'.$id);
        } else {
            $teacher['pic'] = 'resources/images/dep/placeholder.webp';
        }
        
        Teacher::create($teacher);
        return redirect()->back();
    }

    public function remove(Request $req)
    {
        $teacher = Teacher::where('id', $req->input('teacher_id'))->first();
        if ($teacher) {
            $this->deleteFile($teacher->pic);
            $teacher->delete();
        }

        return redirect()->back();
    }
}
