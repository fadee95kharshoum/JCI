@extends('layouts.admin')
@section('main')
    <div class="card m-4">
        <h3 class="card-header">
            All cards in this country
        </h3>
        <div class="row card-body ">
            <div class="col-6">
                <h3>
                    {{$country->name}}
                </h3>
                <div>
                    @foreach ($cards as $card)
                    <span class="btn btn-sm btn-success">
                        <a class="text-white" href="{{route('cards.show',$card)}}">{{$card->name}}</a>
                    </span>
                    @endforeach
                </div>
                <div class="row m-3">
                    <form action="{{route('cards.destroy',$country)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn  float-right mx-3  btn-danger "><i class="fa fa-trash"></i> Delete</button>
                    </form>
                </div>
            </div>
            <div class="col-6">
                <div class="row">
                    <div class="col-12">
                        <h1>Create New Card
                            <i class="fa fa-plus btn btn-sm btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"></i>    
                        </h1>
                        
                       
                        <form class="collapse" id="collapseExample" action=" {{route('cards.store')}} " method="POST" enctype="multipart/form-data">
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
                                <input type="number" name="price" step="0.01" class="form-control" id="name" placeholder="Card Price">
                                <small id="name" class="form-text ">Be careful to choose a descriptive and expressive
                                    name
                                </small>
                            </div>
                            
            
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="image">
                                <label class="custom-file-label" for="image">Choose file...</label>
                            </div>
                            <input type="hidden" name="country_id" value="{{$country->id}}">
                            <button type="submit" class="btn btn-success btn-lg my-3">Add Data</button>
                            <a href=" {{route('cards.index')}} " class="btn btn-primary btn-lg my-3">go back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
