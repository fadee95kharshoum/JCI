@extends('layouts.admin')

@section('main')
<div class="list-group text-truncate col-10 offset-1 my-4">
    <div class="list-group-item d-flex justify-content-between active">
        <h2>Your All  Packages in STS.</h2>
        <span>{{ $porders->links() }}</span>
    </div>
    @forelse ($porders as $porder)
    <div class="list-group-item p-3">
        <div>
            <form class="d-inline-block float-left" action="{{route('porders.destroy',$porder)}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm mx-1 btn-danger "><i class="fa fa-trash"></i></button>
            </form>
            <h5 class="d-inline-block">
                {{$porder->name}} - <span class="badge badge-primary"> {{$porder->times}} </span> 
                total is {{$porder->total}}- 
                {{$porder->user->name}} 
                @if ($porder->status === 'pending')
                <span class="badge badge-dark"> {{$porder->status}} </span>
                @else
                <span class="badge badge-success"> {{$porder->status}} </span>
                @endif </h5>
            <form class="d-inline-block col-2 float-right mr-4" action="{{route('porders.update',$porder)}}" method="post">
                @csrf
                @method('patch')
                <select name="status" class="form-control d-inline-block ">
                    <option value="pending">pending</option>
                    <option value="approved">approved</option>
                </select>
                <button type="submit" class="btn btn-sm ml-1  btn-danger d-inline-block  "><i class="fa fa-edit"></i></button>
            </form>
        </div>
    </div>
    @empty
    <div class="list-group-item">
        <h2>There is no porders in Your website ... !!!</h2>
    </div>
    @endforelse

</div>
@endsection
