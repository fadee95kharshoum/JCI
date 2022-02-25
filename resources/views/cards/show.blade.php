@extends('layouts.admin')
@section('main')
    <div class="card">
        <h3 class="card-header">
            card number <span class="badge badge-primary">{{$card->id}}</span>
        </h3>
        <div class="row card-body ">
            <div class="col-6">
                <h3>
                    {{$card->name}}
                </h3>
                <h4 class="card-text"> {{$card->price}} </h4>
                <div class="row m-3">
                    <a href=" {{route('cards.edit',$card)}} " class="btn btn-warning font-weight-bold"><i class="fa fa-edit"></i> Edit card info</a>
                    <form action="{{route('cards.destroy',$card)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn  float-right mx-3  btn-danger "><i class="fa fa-trash"></i> Delete</button>
                    </form>
                </div>
            </div>
           <div class="col-4">
           @if (isset($card->image))
               <img src="{{asset('storage/'.$card->image)}}" class="col-6" alt="...">
            @else
                <div class="col-6">
                    <h4 class="alert alert-danger">
                        There is no pic to this card
                    </h4>
                </div>
           @endif
           </div>
        </div>
    </div>
@endsection
