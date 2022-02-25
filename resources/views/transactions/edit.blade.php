@extends('layouts.admin')
@section('main')
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2 mt-4">
                <h1>Edit Your card </h1>
                <form action=" {{ route('transactions.update', $transaction->id) }} " method="POST">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label for="name"> Silver Rate :</label>
                        <input type="text" name="silver" class="form-control" id="name" placeholder="card Name"
                            value="{{ $transaction->silver }}">
                    </div>
                    <div class="form-group">
                        <label for="name"> Gold Rate :</label>
                        <input type="text" name="gold" class="form-control" id="name" placeholder="card Name"
                            value="{{ $transaction->gold }}">
                    </div>
                    <div class="form-group">
                        <label for="name"> Platinum Rate :</label>
                        <input type="text" name="platinum" class="form-control" id="name" placeholder="card Name"
                            value="{{ $transaction->platinum }}">
                    </div>
                    <button type="submit" class="btn btn-success btn-lg my-3">Update Data</button>
                    <a href=" {{ route('transactions.index') }} " class="btn btn-primary btn-lg my-3">go back</a>
                </form>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
