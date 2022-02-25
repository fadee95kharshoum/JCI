<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Point;
use App\Transaction;
use Gate;

class PointController extends Controller
{
    public function index()
    {
        $points = Point::orderBy('id')->paginate(16);
        return view('points.index', compact('points'));
    }

    public function storep()
    {
        $points = Point::orderBy('id')->paginate(12);
        $trans = Transaction::where('id',1)->first();
        return view('points.storep', compact('points','trans'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|min:3',
            'price' => 'required',
            'game_id' => 'required',
        ]);

        $point = Point::create([
            'name' => $request->name,
            'price' => $request->price,
            'game_id' => $request->game_id,
        ]);
        toast('Your Point was Added successfully !', 'success');
        return redirect()->route('games.show',$request->game_id);
    }

   
    public function show(Point $point)
    {
        return view('points.show', compact('point'));
    }


    public function destroy( Point $point)
    {
        $point->delete();
        toast('Your point was Deleted !', 'warning');
        return redirect(route('points.index'));
    }
}
