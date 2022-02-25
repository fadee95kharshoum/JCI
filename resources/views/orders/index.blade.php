@extends('layouts.admin')

@section('main')
<div class="list-group text-truncate col-10 offset-1 my-4">
    <div class="list-group-item d-flex justify-content-between active">
        <h2>Your All  orders in Codlex Technology.</h2>
        <span>{{ $orders->links() }}</span>
    </div>
    @forelse ($orders as $order)
    <div class="list-group-item p-3">
        <div>
            <form class="d-inline-block float-left" action="{{route('orders.destroy',$order)}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm mx-1 btn-danger "><i class="fa fa-trash"></i></button>
            </form>
            <h5 class="d-inline-block">
                {{$order->name}} - <span class="badge badge-primary"> {{$order->times}} </span> 
                total is {{$order->total}}- 
                {{$order->user->name}} @if ($order->status === 'pending')
                <span class="badge badge-dark"> {{$order->status}} </span>
                @else
                <span class="badge badge-success"> {{$order->status}} </span>
                @endif </h5>
            <form class="d-inline-block col-2 float-right mr-4" action="{{route('orders.update',$order)}}" method="post">
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
        <h2>There is no orders in Your website ... !!!</h2>
    </div>
    @endforelse

</div>
@endsection
