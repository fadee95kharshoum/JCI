@extends('layouts.admin')
@section('main')
<div class="container">
    <div class="row">
        <div class="col-8 offset-2 mt-4">
            <h1>Create New Service</h1>
            <form action=" {{route('cards.store')}} " method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Your Card Name :</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Service Name">
                    <small id="name" class="form-text ">Be careful to choose a descriptive and expressive
                        name
                    </small>
                </div>
                
                <div class="form-group">
                    <label for="name">Your Card price :</label>
                    <input type="number" name="price" class="form-control" id="name" placeholder="Card Price">
                    <small id="name" class="form-text ">Be careful to choose a descriptive and expressive
                        name
                    </small>
                </div>
                

                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="image">
                    <label class="custom-file-label" for="image">Choose file...</label>
                </div>
                <button type="submit" class="btn btn-success btn-lg my-3">Add Data</button>
                <a href=" {{route('cards.index')}} " class="btn btn-primary btn-lg my-3">go back</a>
            </form>
        </div>
    </div>
</div>
@endsection
