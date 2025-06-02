<?php

namespace App\Http\Controllers;
use App\Models\Teacher;
use App\Models\Department;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    
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
            $path = $req->file('new_photo')->store('images/dep/'.$teacher->department_id, 'public');
            Storage::disk('public')->delete($teacher->pic);
            $teacher->pic = $path;
        }

        $teacher->save();
        return redirect()->back();
    }

    public function add(Request $req, string $id)
    {
        $teacher = new Teacher;
        $teacher->surname    = $req->input('surname');
        $teacher->name       = $req->input('name');
        $teacher->middlename = $req->input('middlename');
        $teacher->position   = $req->input('position');
        $teacher->department_id = $id;
        if ($req->hasFile('new_photo')) {
            $teacher->pic = $req->file('new_photo')->store('images/dep/'.$id, 'public');
        } else {
            $teacher->pic = '';
        }
        
        $teacher->save();
        return redirect()->back();
    }

    public function remove(Request $req)
    {
        $teacher = Teacher::where('id', $req->input('teacher_id'))->first();
        if ($teacher) {
            Storage::disk('public')->delete($teacher->pic);
            $teacher->delete();
        }

        return redirect()->back();
    }
}
