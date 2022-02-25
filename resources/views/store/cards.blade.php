@extends('layouts.admin')

@section('main')
<div class="list-group text-truncate col-12  my-4">
    <div class="list-group-item justify-content-between  d-flex active">
        <h2 class="col-5">Your All  types in store.</h2>
    </div>
    <div class="row">

    
    @forelse ($types as $card)
    <div class="card col-4 ">
      
            <h2 class="card-header">{{$card->name}} </h2>
            <div class="card-body">
                @forelse ($card->countries as $item)
                <a href="{{route('countstore' , $item)}}" class="badge badge-success mx-1 p-3">
                        {{$item->name}}
                    </a>
                    @empty
                        
                    @endforelse
            </div>
  
    </div>
    @empty
</div>
    <div class="list-group-item">
        <h2>There is no types in Your website ... !!!</h2>
    </div>
    @endforelse
</div>
@endsection
