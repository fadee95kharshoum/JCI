<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Type;
use Gate;

class TypeController extends Controller
{
    public function index()
    {
        $types = Type::orderBy('id')->paginate(6);
        return view('types.index', compact('types'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
        ]);

        $type = Type::create([
            'name' => $request->name,
        ]);
        toast('Your Type was Added successfully !', 'success');
        return redirect(route('types.index'));
    }

    public function show(Type $type)
    {
        $countries = $type->countries;
        // dd($countries);
        return view('types.show', compact('type','countries'));
    }

    public function destroy( Type $type)
    {
        $type->delete();
        toast('Your type was Deleted !', 'warning');
        return redirect(route('types.index'));
    }
}
