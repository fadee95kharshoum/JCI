<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Partner;
use App\Models\Project;
use App\Models\Service;
use Gate;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::orderBy('id')->paginate(6);
        return view('partners.index', compact('partners'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|min:3',
            'information' => 'required',
        ]);

        $partner = Partner::create([
            'name' => $request->name,
            'information' => $request->information,
            'notes' => $request->notes
        ]);
        toast('Your Partner was Added successfully !', 'success');
        return redirect(route('partners.index'));
    }

    public function create()
    {
        return view('partners.create');
    }

    public function show(Partner $partner, $id)
    {
        $partner = Partner::findOrFail($id);


        //test1
        $projects = Partner::with(['projects'=> function($qqq){
            $qqq->select('name');
        }])->find($id);


        return view('partners.show', compact('partner', 'projects'));
    }
    public function showinfo(Partner $partner, $id)
    {
        $partner = Partner::findOrFail($id);


        //test1
        $services = Partner::with(['services'=> function($qqq){
            $qqq->select('type');
        }])->find($id);


        return view('partners.show_info', compact('partner', 'services'));
    }


    public function edit($partner_id)
    {
        $partner = Partner::findOrFail($partner_id);
        return view('partners.edit', compact('partner'));
    }


    public function update(Request $request, $partner_id)
    {
        $vali = $request->validate([
            'name' => 'required|min:3',
            'information' => 'required',
        ]);

        $data = [
            'name' => $request->name,
            'information' => $request->information,
            'notes' => $request->notes
        ];
        $partner = Partner::findOrFail($partner_id);
        $partner->update($data);
        toast('Your Partner was Updated successfully !', 'success');
        return redirect(route('partners.index'));
    }

    public function destroy($id)
    {
        $partner = Partner::findOrFail($id);
        $partner->delete();
        toast('Your Partner was Deleted !', 'warning');
        return redirect(route('partners.index'));
    }
}
