@extends('layouts.admin')

@section('main')
    <div class="card col-10 offset-1 my-4">
        <div class="card-header  active">
            <h2>Your All transaction in STS .  </div>

        <div class="card-body">
            <div>
                <h2> Silver Client :  1 $ =  {{ $transaction->silver }} S.P </h2>
                <h2> Gold Client :  1 $ =  {{ $transaction->gold }} S.P</h2>
                <h2> Platinum Client :  1 $ =  {{ $transaction->platinum }} S.P</h2>
                <a class="float-right btn btn-primary mx-2" href="{{ route('transactions.edit', $transaction) }}"> <i
                        class="fa fa-eye"></i> Edit</a>
            </div>
        </div>


    </div>
@endsection
