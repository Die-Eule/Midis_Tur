<?php

namespace App\Http\Controllers;
use App\Models\Teacher;
use App\Models\Department;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index(string $id)
    {
        $staff = Teacher::where('department_id', $id)->get();
        $department = Department::where('id', $id)->first();
        return view('dashboard4', compact('department', 'staff'));
    }
}
