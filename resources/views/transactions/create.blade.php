@extends('layouts.admin')
@section('main')
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2 mt-4">
                <h1>set the transactions </h1>
                <form action=" {{ route('transactions.store') }} " method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name"> Silver Rate :</label>
                        <input type="text" name="silver" class="form-control" id="name" placeholder="Service Name">
                    </div>

                    <div class="form-group">
                        <label for="name"> Gold Rate :</label>
                        <input type="text" name="gold" class="form-control" id="name" placeholder="Service Name">
                    </div>

                    <div class="form-group">
                        <label for="name"> Platinum Rate :</label>
                        <input type="text" name="platinum" class="form-control" id="name" placeholder="Service Name">
                    </div>


                    <button type="submit" class="btn btn-success btn-lg my-3">Add Data</button>
                    <a href=" {{ route('transactions.index') }} " class="btn btn-primary btn-lg my-3">go back</a>
                </form>
            </div>
        </div>
    </div>
@endsection
