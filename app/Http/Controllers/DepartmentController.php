<?php

namespace App\Http\Controllers;
use App\Models\Department;
use App\Models\Subscription;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index(string $id)
    {
        $department = Department::where('id', $id)->first();
        $subscription = null;
        if (Auth::user()) {
            $subscription = Subscription::where('user_id', Auth::user()->id)->where('department_id', $id)->first();
        }
        return view('dashboard3', compact('department','subscription'));
    }
}
