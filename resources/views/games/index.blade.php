@extends('layouts.admin')

@section('main')
<div class="list-group text-truncate col-12  my-4">
    <div class="list-group-item justify-content-between  d-flex active">
        <h2 class="col-5">Your All  games in store.</h2>
        <form method="POST" action="{{ route('games.store') }}" class="col-7" enctype="multipart/form-data">
            @csrf
                <div class="d-flex">
                    <div class="col-5">
                        <input id="name" type="text" class="form-control " name="name" value="{{ old('name') }}"
                            placeholder="add game">
                            <div> {{$errors->first('name')}} </div>
                    </div>
                    <div class="custom-file col-5">
                        <input type="file" class="custom-file-input" name="image">
                        <label class="custom-file-label" for="image">Choose</label>
                    </div>
                    <button type="submit" class="btn mx-1 btn-success col-2">
                        <i class="fa fa-plus"></i>
                    </button>
                </div>
        </form>
    </div>
    @forelse ($games as $game)
    <div class="list-group-item ">
        <div>
            <h2 class="d-inline-block">{{$game->name}} </h2>
            <a class="float-right btn btn-primary mx-2" href="{{route('games.show',$game)}}"> <i
                    class="fa fa-eye"></i>
                     {{$game->packages->count()}}
                      Points pack</a>
            <form class="d-inline-block float-right" action="{{route('games.destroy',$game)}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn   mx-3  btn-danger "><i class="fa fa-trash"></i></button>
            </form>
        </div>
    </div>
    @empty
    <div class="list-group-item">
        <h2>There is no games in Your website ... !!!</h2>
    </div>
    @endforelse
    <span class="d-flex justify-content-center mt-2">{{$games->links()}}</span>
</div>
@endsection
