<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Transaction;
use Gate;

class TransactionController extends Controller
{
    public function index()
    {
        $transaction = Transaction::where('id', 1 )->first();
        return view('transactions.index', compact('transaction'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'silver' => 'required',
            'gold' => 'required',
            'platinum' => 'required',
        ]);

        $transaction = Transaction::create([
            'silver' => $request->silver,
            'gold' => $request->gold,
            'platinum' => $request->platinum,
        ]);
        toast('Your Transaction was Added successfully !', 'success');
        return redirect(route('transactions.index'));
    }

    public function create()
    {
        return view('transactions.create');
    }

    public function show(Transaction $transaction)
    {
        return view('transactions.show', compact('transaction'));
    }

    public function edit(Transaction $transaction)
    {
        return view('transactions.edit', compact('transaction'));
    }


    public function update(Request $request, Transaction $transaction)
    {
        $validate = $request->validate([
            'silver' => 'required',
            'gold' => 'required',
            'platinum' => 'required',
        ]);

        $transaction = Transaction::where('id',$transaction->id)->update([
            'silver' => $request->silver,
            'gold' => $request->gold,
            'platinum' => $request->platinum,
        ]);
        toast('Your transaction was Updated successfully !', 'success');
        return redirect(route('transactions.index'));
    }

    public function destroy( Transaction $transaction)
    {
        $transaction->delete();
        toast('Your transaction was Deleted !', 'warning');
        return redirect(route('transactions.index'));
    }
}
