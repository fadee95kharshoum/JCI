@extends('layouts.admin')

@section('main')
    <div class="list-group text-truncate col-12 my-4">
        <div class="list-group-item  active">
            <h2>Your All cards in STS. <h2>
        </div>
        <div class="row justify-content-around">
            @forelse ($cards as $card)
                {{-- <div class="list-group-item ">
        <div>
            <h2 class="d-inline-block">{{$card->name}} </h2>
            <span class=" badge badge-primary ">{{$card->price}}</span>
            <a class="float-right btn btn-primary mx-2" href="{{route('cards.show',$card)}}"> <i
                    class="fa fa-eye"></i> Show Details</a>
        </div>
    </div> --}}
                <div class="card col-4">
                    <img class="card-img" src="{{ asset('storage/' . $card->image) }}" alt="Card image cap">
                    <div class="card-body">
                        <h5>{{ $card->name }}
                            <span class="badge badge-success">
                                @if (Auth::user()->rate === 'silver')
                                    {{ $card->price * $trans->silver }} 
                                @elseif (Auth::user()->rate === "gold")
                                   {{ $card->price * $trans->gold }} 
                                @elseif (Auth::user()->rate === "platinum")
                                   {{ $card->price * $trans->platinum }} 
                                @endif
                            </span>
                        </h5>
                        <hr>
                        <form action=" {{ route('orders.store') }} " method="post">
                            @csrf
                            <input type="hidden" name="name" value="{{ $card->name }}">
                            <input type="hidden" name="price" value=" {{$card->price}} " ">
                                        <input type="hidden" name="status" value="pending">
                            <input placeholder="how many you want ?" class="col-12 my-1" type="number" name="times">
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <br>
                            <button class="btn btn-primary col-12 ">Order</button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="list-group-item">
                    <h2>There is no cards in Your website ... !!!</h2>
                </div>
            @endforelse

        </div>
    </div>
@endsection
