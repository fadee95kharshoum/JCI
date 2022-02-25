@extends('layouts.admin')
@section('main')
    <div class="card m-4 p-2">
        <h3 class="card-header">
            Game Details
        </h3>
        <div class="row card-body ">
            <div class="col-6">
                <h3>Game Name : {{$game->name}}</h3>
                <p>Packages number : {{$game->packages->count()}}</p>
                <div class="row m-4">
                    <form action="{{route('types.destroy',$game)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn  float-right mx-3  btn-danger "><i class="fa fa-trash"></i> Delete</button>
                    </form>
                </div>
            </div>
            <div class="col-6">
                <img src="{{asset('storage/'.$game->image)}}" class="col-6" alt="...">
            </div>
        </div>
    </div>
    <div class=" card m-4 p-2">
        <h3 class="card-header">
            All Packages
        </h3>
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    @forelse ($points as $package)
                      <div>
                        <p class="d-inline-block">  {{$package->name}} - <span class="badge badge-primary"> {{$package->price}} </span></p>
                        <form class="d-inline-block float-right" action="{{route('games.destroy',$game)}}" method="post">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn   mx-3  btn-danger "><i class="fa fa-trash"></i></button>
                      </form>
                      </div>
                      <hr>
                    @empty
                        there is no packages
                    @endforelse
                </div>
                <div class="col-6">
                    <h1>Create New Pack
                        <i class="fa fa-plus btn btn-sm btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"></i>    
                    </h1>
                    
                   
                    <form class="collapse" id="collapseExample" action=" {{route('points.store')}} " method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Your Game Name :</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Service Name">
                            <small id="name" class="form-text ">Be careful to choose a descriptive and expressive
                                name
                            </small>
                        </div>
                        
                        <div class="form-group">
                            <label for="name">Your Game price :</label>
                            <input type="number" step="0.01" name="price" class="form-control" id="name" placeholder="Game Price">
                            <small id="name" class="form-text ">Be careful to choose a descriptive and expressive
                                name
                            </small>
                        </div>
                        
                        <input type="hidden" name="game_id" value="{{$game->id}}">
                        <button type="submit" class="btn btn-success btn-lg my-3">Add Pack</button>
                        <a href=" {{route('cards.index')}} " class="btn btn-primary btn-lg my-3">go back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
