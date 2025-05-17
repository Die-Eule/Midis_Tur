<?php

namespace App\Http\Controllers;
use App\Models\Department;
use App\Models\Subscription;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $subscription = false;
        if (Auth::user()) {
            $subscription = Department::count() === Subscription::where('user_id', Auth::user()->id)->count();
        }
        return view('dashboard', compact('subscription'));
    }

}
