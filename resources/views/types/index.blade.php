@extends('layouts.admin')

@section('main')
<div class="list-group text-truncate col-10 offset-1 my-4">
    <div class="list-group-item justify-content-between  d-flex active">
        <h2>Your All  types in store.</h2>
        <form method="POST" action="{{ route('types.store') }}" class="col-5">
            @csrf
                <div class="d-flex">
                    <div class="col-10">
                        <input id="name" type="text" class="form-control " name="name" value="{{ old('name') }}"
                            placeholder="add card type">
                            <div> {{$errors->first('name')}} </div>
                    </div>
                    <button type="submit" class="btn  btn-success col-2">
                        <i class="fa fa-plus"></i>
                    </button>
                </div>
        </form>
    </div>
    @forelse ($types as $type)
    <div class="list-group-item ">
        <div>
            <h2 class="d-inline-block">{{$type->name}} </h2>
            <a class="float-right btn btn-primary mx-2" href="{{route('types.show',$type)}}"> <i
                    class="fa fa-eye"></i> {{$type->countries->count()}} Countries</a>
            <form class="d-inline-block float-right" action="{{route('types.destroy',$type)}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn   mx-3  btn-danger "><i class="fa fa-trash"></i></button>
            </form>
        </div>
    </div>
    @empty
    <div class="list-group-item">
        <h2>There is no types in Your website ... !!!</h2>
    </div>
    @endforelse

</div>
@endsection
