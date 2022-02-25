<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Porder;
use App\Transaction;
use App\User;
use Gate;
use Auth;

class PorderController extends Controller
{
    public function index()
    {
        $porders = Porder::orderBy('id')->paginate(6);
        $trans = Transaction::where('id',1)->first();
        return view('porders.index', compact('porders','trans'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|min:3',
            'price' => 'required',
            'user_id' => 'required',
            'status' => 'required',
            'times' => 'required',
            'player_id' => 'required',
        ]);

        $transaction = Transaction::where('id',1)->first();
        $user = User::where('id',$request->user_id)->first();
        if ($user->rate === 'silver') {
            $trans = $transaction->silver;
        } elseif ($user->rate === 'gold'){
            $trans = $transaction->gold;
        }else{
            $trans = $transaction->platinum;
        }
        

        $total = $request->price * $request->times * $trans;
        if (Auth::user()->balance < $total) {
            alert()->error('Your balance is low', 'You Don\'t have the right amount of the price');
            return redirect(route('storep'));
        }else {
            $order = Porder::create([
                'name' => $request->name,
                'price' => $request->price,
                'user_id' => $request->user_id,
                'status' => $request->status,
                'times' => $request->times,
                'player_id' => $request->player_id,
                'total' => $total,
            ]);
            $updatedprice = Auth::user()->balance - $total;
            User::where('id',$request->user_id)->update(['balance'=>$updatedprice]);
            // toast('Your Order was Added successfully !', 'success');
            alert()->success('Your order is pending', 'your order will be done soon');
            return redirect(route('storep'));
        }
    }

    public function create()
    {
        return view('porders.create');
    }

    public function show(Porder $porder)
    {
        return view('porders.show', compact('porder'));
    }

    public function edit(Porder $porder)
    {
        return view('porders.edit', compact('porder'));
    }


    public function update(Request $request, Porder $porder)
    {
        $vali = $request->validate([
            'status' => 'required|min:3',
        ]);

        $porder->update(['status'=>$request->status]);
        toast('Your porder was Updated successfully !', 'success');
        return redirect(route('porders.index'));
    }

    public function destroy( Porder $porder)
    {
        $user = User::where('id',$porder->user_id)->first();
        $user->update(['balance'=>$user->balance + $porder->total]);
        $porder->delete();
        toast('Your porder was Deleted !', 'warning');
        return redirect(route('porders.index'));
    }
}
