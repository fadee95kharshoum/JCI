<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Metting;
use Gate;

class MettingController extends Controller
{
    public function index()
    {
        $mettings = Metting::orderBy('id')->paginate(6);
        return view('mettings.index', compact('mettings'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|min:3',
            'description' => 'required',
        ]);

        $metting = Metting::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        toast('Your Metting was Added successfully !', 'success');
        return redirect(route('mettings.index'));
    }

    public function create()
    {
        return view('mettings.create');
    }

    public function show(Metting $metting)
    {
        return view('mettings.show', compact('metting'));
    }

    public function edit(Metting $metting)
    {
        return view('mettings.edit', compact('metting'));
    }


    public function update(Request $request, Metting $metting)
    {
        $vali = $request->validate([
            'name' => 'required|min:3',
        ]);

        $data = $request->only(['name']);
        $metting->update($data);
        toast('Your metting was Updated successfully !', 'success');
        return redirect(route('mettings.index'));
    }

    public function destroy( Metting $metting)
    {
        $metting->delete();
        toast('Your metting was Deleted !', 'warning');
        return redirect(route('mettings.index'));
    }
}
