<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Order;
use App\User;
use App\Transaction;
use Gate;
use Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('id')->paginate(9);
        $trans = Transaction::where('id',1)->first();
        return view('orders.index', compact('orders','trans'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|min:3',
            'price' => 'required',
            'user_id' => 'required',
            'status' => 'required',
            'times' => 'required',
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
            return redirect(route('store'));
        }else {
            $order = Order::create([
                'name' => $request->name,
                'price' => $request->price,
                'user_id' => $request->user_id,
                'status' => $request->status,
                'times' => $request->times,
                'total' => $total,
            ]);
            $updatedprice = Auth::user()->balance - $total;
            User::where('id',$request->user_id)->update(['balance'=>$updatedprice]);
            // toast('Your Order was Added successfully !', 'success');
            alert()->success('Your order is pending', 'your order will be done soon');
            return redirect(route('store'));
        }
    }

    public function create()
    {
        return view('orders.create');
    }

    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        return view('orders.edit', compact('order'));
    }


    public function update(Request $request, Order $order)
    {
        $vali = $request->validate([
            'status' => 'required|min:3',
        ]);

        $order->update(['status'=>$request->status]);
        toast('Your order was Updated successfully !', 'success');
        return redirect(route('orders.index'));
    }

    public function destroy( Order $order)
    {
        $user = User::where('id',$order->user_id)->first();
        $user->update(['balance'=>$user->balance + $order->total]);
        $order->delete();
        toast('Your order was Deleted !', 'warning');
        return redirect(route('orders.index'));
    }
}
