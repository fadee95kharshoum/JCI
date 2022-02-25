@extends('layouts.admin')
@section('main')
<div class="container">
    <div class="row">
        <div class="col-8 offset-2 mt-4">
            <h1>Edit Your card </h1>
            <form action=" {{route('cards.update',$card->id)}} " method="POST" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="form-group">
                    <label for="name">Your card Name :</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="card Name" value="{{$card->name}}">
                    <small id="name" class="form-text ">Be careful to choose a descriptive and expressive
                        name
                    </small>
                </div>
                <div class="form-group">
                    <label for="name">Your card price :</label>
                    <input type="number" name="price" class="form-control" id="price" placeholder="card price" value="{{$card->price  }}">
                    <small id="price" class="form-text ">Be careful to choose a descriptive and expressive
                        name
                    </small>
                </div>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="image" value="{{$card->image}}">
                    <label class="custom-file-label" for="image">Choose file...</label>
                </div>
                <button type="submit" class="btn btn-success btn-lg my-3">Update Data</button>
                <a href=" {{route('cards.index')}} " class="btn btn-primary btn-lg my-3">go back</a>
            </form>
        </div>
    </div>
</div>
@endsection
