<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Financial;
use Gate;

class FinancialController extends Controller
{
    public function index()
    {
        $financials = Financial::orderBy('id')->paginate(6);
        return view('financials.index', compact('financials'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|min:3',
            'description' => 'required',
        ]);

        $financial = Financial::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        toast('Your Financial was Added successfully !', 'success');
        return redirect(route('financials.index'));
    }

    public function create()
    {
        return view('financials.create');
    }

    public function show(Financial $financial)
    {
        return view('financials.show', compact('financial'));
    }

    public function edit(Financial $financial)
    {
        return view('financials.edit', compact('financial'));
    }


    public function update(Request $request, Financial $financial)
    {
        $vali = $request->validate([
            'name' => 'required|min:3',
        ]);

        $data = $request->only(['name']);
        $financial->update($data);
        toast('Your financial was Updated successfully !', 'success');
        return redirect(route('financials.index'));
    }

    public function destroy( Financial $financial)
    {
        $financial->delete();
        toast('Your financial was Deleted !', 'warning');
        return redirect(route('financials.index'));
    }
}
