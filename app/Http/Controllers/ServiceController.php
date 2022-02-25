<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Partner;
use App\Models\Service;
use Gate;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('id')->paginate(6);
        return view('services.index', compact('services'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'type' => 'required|min:3',
            'category' => 'required',
        ]);

        $service = Service::create([
            'type' => $request->type,
            'category' => $request->category,
            'notes' => $request->notes
        ]);
        toast('Your Service was Added Successfully !', 'success');
        return redirect(route('services.index'));
    }

    public function create()
    {
        return view('services.create');
    }

    public function show(Service $service, $id)
    {
        $service = Service::findOrFail($id);


        //test1
        $partners = Service::with(['partners'=> function($qqq){
            $qqq->select('name');
        }])->find($id);


        return view('services.show', compact('service', 'partners'));
    }

    public function edit($service_id)
    {
        $service = Service::findOrFail($service_id);
        return view('services.edit', compact('service'));
    }


    public function update(Request $request, $service_id)
    {
        $vali = $request->validate([
            'type' => 'required|min:3',
            'category' => 'required',
        ]);

        $data = [
            'type' => $request->type,
            'category' => $request->category,
            'notes' => $request->notes
        ];
        $service = Service::findOrFail($service_id);
        $service->update($data);
        toast('Your Service was Updated Successfully !', 'success');
        return redirect(route('services.index'));
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();
        toast('Your Service was Deleted !', 'warning');
        return redirect(route('services.index'));
    }
}
