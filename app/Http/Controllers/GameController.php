<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Game;
use App\Transaction;
use Gate;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::orderBy('id')->paginate(6);
        return view('games.index', compact('games'));
    }

    public function gallery()
    {
        $games = Game::orderBy('id')->paginate(6);
        return view('store.games', compact('games'));
    }
    public function packages(Game $game)
    {
        $points = $game->packages;
        $trans = Transaction::where('id',1)->first();
        return view('store.packs', compact('points','trans'));
    }
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'image' => 'required',
        ]);

        $game = Game::create([
            'name' => $request->name,
            'image' => $request->image->store('images', 'public'),

        ]);
        toast('Your Game was Added successfully !', 'success');
        return redirect(route('games.index'));
    }

    public function show(Game $game)
    {
        $points = $game->packages;
        return view('games.show', compact('game' , 'points'));
    }

    public function destroy( Game $game)
    {
        $game->delete();
        toast('Your game was Deleted !', 'warning');
        return redirect(route('games.index'));
    }
}
