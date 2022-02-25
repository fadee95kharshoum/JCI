<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Card;
use App\Type;
use Gate;

class CardController extends Controller
{
    public function index()
    {
        $cards = Card::orderBy('id')->paginate(6);
        return view('cards.index', compact('cards'));
    }

    public function gallery()
    {
        // $cards = Card::orderBy('id')->paginate(12);
        $types = Type::orderBy('id','desc')->get();
        return view('store.cards', compact('types'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|min:3',
            'price' => 'required',
            'image' => 'required',
            'country_id' => 'required',
        ]);

        $card = Card::create([
            'name' => $request->name,
            'price' => $request->price,
            'image' => $request->image->store('images', 'public'),
            'country_id'=>$request->country_id,
        ]);
        toast('Your Card was Added successfully !', 'success');
        // return redirect(route('cards.index'));
        return redirect()->route('countries.show',$request->country_id);
    }

    public function create()
    {
        return view('cards.create');
    }

    public function show(Card $card)
    {
        return view('cards.show', compact('card'));
    }

    public function edit(Card $card)
    {
        return view('cards.edit', compact('card'));
    }


    public function update(Request $request, Card $card)
    {
        $vali = $request->validate([
            'name' => 'required|min:3',
            'price' => 'required',
        ]);

        $data = $request->only(['name','price']);
        $card->update($data);
        toast('Your card was Updated successfully !', 'success');
        return redirect(route('cards.index'));
    }

    public function destroy( Card $card)
    {
        $card->delete();
        toast('Your card was Deleted !', 'warning');
        return redirect(route('cards.index'));
    }
}
