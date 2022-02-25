@extends('layouts.admin')

@section('main')
<div class="list-group text-truncate col-12  my-4">
    <div class="list-group-item justify-content-between  d-flex active">
        <h2 class="col-5">Your All  games in store.</h2>
    </div>
    @forelse ($games as $game)
    <div class="list-group-item ">
        <div>
            <h2 class="d-inline-block">{{$game->name}} </h2>
            <a class="float-right btn btn-primary mx-2" href="{{route('packstore',$game)}}"> <i
                    class="fa fa-eye"></i>
                     {{$game->packages->count()}}
                       Packs</a>
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
