<?php

namespace App\Http\Controllers;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index(string $id)
    {
        $department = Department::where('id', $id)->first();
        return view('dashboard3', compact('department'));
    }
}
