<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Country;
use App\Transaction;
use Gate;

class CountryController extends Controller
{
    public function index()
    {
        $countries = Country::orderBy('id')->paginate(10);
        return view('countries.index', compact('countries'));
    }

    public function gallery(Country $country)
    {
        $cards = $country->cards;
        $trans = Transaction::where('id',1)->first();
        return view('store.store', compact('cards','trans'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'type_id' => 'required',
        ]);

        $country = Country::create([
            'name' => $request->name,
            'type_id' => $request->type_id,
        ]);
        toast('Your Country was Added successfully !', 'success');
        return redirect(route('types.show',$request->type_id));
    }

   

    public function show(Country $country)
    {
        $cards = $country->cards;
        return view('countries.show', compact('country','cards'));
    }

    public function destroy( Country $country)
    {
        $country->delete();
        toast('Your country was Deleted !', 'warning');
        return redirect(route('countries.index'));
    }
}
