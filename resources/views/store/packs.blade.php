@extends('layouts.admin')

@section('main')
<div class="list-group text-truncate my-4">
    <div class="list-group-item  active">
        <h2>Your All  cards in Codlex Technology. <h2>
    </div>
    <div class="row">
        @forelse ($points as $point)
    {{-- <div class="list-group-item ">
        <div>
            <h2 class="d-inline-block">{{$point->name}} </h2>
            <span class=" badge badge-primary ">{{$point->price}}</span>
            <a class="float-right btn btn-primary mx-2" href="{{route('cards.show',$point)}}"> <i
                    class="fa fa-eye"></i> Show Details</a>
        </div>
    </div> --}}
    <div class="card col-4">
        <div class="card-body">
            {{-- <h5 class="text-center text-wrap"> 
                {{$point->name}} <br>   
                <span class="badge badge-success  justify-content-center p-2 m-2 ">{{$point->game->name}}- {{$point->price}} S.P</span>
            </h5> --}}
            <h5 class="text-center">{{ $point->name }} <br>
                <span class="badge badge-success">
                    @if (Auth::user()->rate === 'silver')
                        {{ $point->price * $trans->silver }} 
                    @elseif (Auth::user()->rate === "gold")
                       {{ $point->price * $trans->gold }} 
                    @elseif (Auth::user()->rate === "platinum")
                       {{ $point->price * $trans->platinum }} 
                    @endif
                </span>
            </h5>
            <hr>
            <form action=" {{route('porders.store')}} " method="post">
                @csrf
                <input type="hidden" name="name" value="{{$point->name}}">
                <input type="hidden" name="price" value="{{$point->price}}">
                <input type="hidden" name="status" value="pending">
                <input placeholder="how many you want ?" class="col-12 my-1" type="number" name="times"><br>
                <input placeholder="type your id here" class="col-12 my-1" type="text" name="player_id">
                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                <br>
                <button type="submit" class="btn btn-primary col-12 ">Order</button>
            </form>
        </div>
    </div>
    @empty
    <div class="list-group-item">
        <h2>There is no cards in Your website ... !!!</h2>
    </div>
    @endforelse
    @if ($errors->any())
    <div class="alert alert-danger">
    <ul>
         @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
 @endforeach
     </ul>
         </div>
@endif
    </div>
</div>
@endsection
