@extends('layouts.admin')

@section('main')
<div class="list-group text-truncate col-10 offset-1 my-4">
    <div class="list-group-item d-flex justify-content-between active">
        <h2>Your All  cards in STS cards.</h2>
        <span>{{$points->links()}}</span>
    </div>
    <div class="list-group-item ">
        <div class="row">
            @forelse ($points as $point)
            <div class="col-6 border">
                <p class="d-inline-block">{{$point->name}} </p>
                <span class=" badge badge-primary ">{{$point->price}}</span>
            </div>
            @empty
        </div>
    </div>
    <div class="list-group-item">
        <h2>There is no cards in Your website ... !!!</h2>
    </div>
    @endforelse

</div>
@endsection
