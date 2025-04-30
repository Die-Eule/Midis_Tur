<?php

namespace App\Http\Controllers;
use App\Models\Direction;
use App\Models\Specialty;
use Illuminate\Http\Request;

class DirectionController extends Controller
{
    public function index()
    {
        $directions = Direction::all()->groupBy('level_id');
        $specialties = Specialty::all()->groupBy('direction_id');
        return view('dashboard2', compact('directions', 'specialties'));
    }
}
