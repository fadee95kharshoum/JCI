@extends('layouts.admin')
@section('main')
    <div class="card m-4 p-2">
        <h3 class="card-header">
            Card Details
        </h3>
        <div class="row card-body ">
            <div class="col-6">
                <h3>Card Type : {{$type->name}}</h3>
                <p>Countries number : {{$type->countries->count()}} </p>
                <div class="row m-4">
                    <form action="{{route('types.destroy',$type)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn  float-right mx-3  btn-danger "><i class="fa fa-trash"></i> Delete</button>
                    </form>
                </div>
            </div>
            <div class="col-6" style="border-left: 1px solid">
                <form method="POST" action="{{ route('countries.store') }}">
                    @csrf

                    <div class="form-group row">
                        
                        <label for="name" class="col-4 col-form-label text-md-right">Add Countries</label>
                        <div class="col-md-7">
                            <input id="name" type="text" class="form-control " name="name" value="{{ old('name') }}"
                                autocomplete="name">
                                <div> {{$errors->first('name')}} </div>
                                <input type="hidden" name="type_id" value="{{$type->id}}">
                        </div>
                        
                            
                                <button type="submit" class="btn btn-primary col-1">
                                    <i class="fa fa-plus-circle"></i>
                                </button>
                          
                    </div>
                </form>
                <hr>
                <div>
                    @foreach ($countries as $country)
                    <span class="btn btn-sm btn-success">
                        <a class="text-white" href="{{route('countries.show',$country)}}">{{$country->name}}</a>
                    </span>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
