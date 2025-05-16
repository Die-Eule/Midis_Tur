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

    public function update(Request $req)
    {
        $input = $req->collect();
        $direction = Direction::where('id', $input['direction'])->first();
        $specialties = Specialty::where('direction_id', $input['direction'])->get();
        $upd_specs = $input->filter(
            function($item, $key) {
                return is_numeric($key) && $item;
            }
        );

        $new_specs = $input->filter(
            function($item, $key) {
                return substr($key, 0, 4) === "new_" && $item;
            }
        )->values();

        $direction->name = substr($input['title'], 0, 255);
        $direction->save();

        $specialties->each(
            function($item, $key) use($upd_specs){
                if ($upd_specs->has($item->id)) {
                    $item->name = substr($upd_specs[$item->id], 0, 255);
                    $item->save();
                } else {
                    $item->delete();
                }
            }
        );

        $new_specs->each(
            function($item, $key) use($direction) {
                $data['name'] = substr($item, 0, 255);
                $data['direction_id'] = $direction->id;
                Specialty::create($data);
            }
        );

        return redirect()->back();
    }
}
