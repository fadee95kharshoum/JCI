@extends('layouts.admin')

@section('main')
<div class="list-group text-truncate col-10 offset-1 my-4">
    <div class="list-group-item d-flex justify-content-between  active">
        <h2>Your All  cards in Codlex Technology.</h2>
        <span>{{ $cards->links() }}</span>
    </div>
    @forelse ($cards as $card)
    <div class="list-group-item ">
        <div>
            <h2 class="d-inline-block">{{$card->name}} </h2>
            <span class=" badge badge-primary ">{{$card->price}}</span>
            <a class="float-right btn btn-primary mx-2" href="{{route('cards.show',$card)}}"> <i
                    class="fa fa-eye"></i> Show Details</a>
        </div>
    </div>
    @empty
    <div class="list-group-item">
        <h2>There is no cards in Your website ... !!!</h2>
    </div>
    @endforelse

</div>
@endsection
