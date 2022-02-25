<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Kpi;
use Gate;

class KpiController extends Controller
{
    public function index()
    {
        $kpis = Kpi::orderBy('id')->paginate(6);
        return view('kpis.index', compact('kpis'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|min:3',
            'description' => 'required',
        ]);

        $kpi = Kpi::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        toast('Your Kpi was Added successfully !', 'success');
        return redirect(route('kpis.index'));
    }

    public function create()
    {
        return view('kpis.create');
    }

    public function show(Kpi $kpi)
    {
        return view('kpis.show', compact('kpi'));
    }

    public function edit(Kpi $kpi)
    {
        return view('kpis.edit', compact('kpi'));
    }


    public function update(Request $request, Kpi $kpi)
    {
        $vali = $request->validate([
            'name' => 'required|min:3',
        ]);

        $data = $request->only(['name']);
        $kpi->update($data);
        toast('Your kpi was Updated successfully !', 'success');
        return redirect(route('kpis.index'));
    }

    public function destroy( Kpi $kpi)
    {
        $kpi->delete();
        toast('Your kpi was Deleted !', 'warning');
        return redirect(route('kpis.index'));
    }
}
