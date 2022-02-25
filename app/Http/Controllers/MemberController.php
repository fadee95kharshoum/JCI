<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Member;
use App\Models\Project;
use Gate;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::orderBy('id')->paginate(6);
        return view('members.index', compact('members'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|min:3',
            'information' => 'required',
        ]);

        $member = Member::create([
            'name' => $request->name,
            'information' => $request->information,
            'skills' => $request->skills,
            'experience' => $request->experience,
        ]);
        toast('Your Member was Added successfully !', 'success');
        return redirect(route('members.index'));
    }

    public function create()
    {
        return view('members.create');
    }

    public function show(Member $member, $id)
    {
        $member = Member::findOrFail($id);


        //test1
        $projects = Member::with(['projects'=> function($qqq){
            $qqq->select('name');
        }])->find($id);


        return view('members.show', compact('member', 'projects'));
    }

    public function edit($member_id)
    {
        $member = Member::findOrFail($member_id);
        return view('members.edit', compact('member'));
    }


    public function update(Request $request, $member_id)
    {
        $vali = $request->validate([
            'name' => 'required|min:3',
            'information' => 'required',
        ]);

        $data = [
            'name' => $request->name,
            'information' => $request->information,
            'skills' => $request->skills,
            'experience' => $request->experience
        ];
        $member = Member::findOrFail($member_id);
        $member->update($data);
        toast('Your member was Updated successfully !', 'success');
        return redirect(route('members.index'));
    }

    public function destroy($id)
    {
        $member = Member::findOrFail($id);
        $member->delete();
        toast('Your member was Deleted !', 'warning');
        return redirect(route('members.index'));
    }
}
