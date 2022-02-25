@extends('layouts.admin')
@section('main')
<div class="container">
    <div class="row my-2">
        <div class="col-lg-8 order-lg-2">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a href="" data-target="#profile" data-toggle="tab" class="nav-link active">Profile</a>
                </li>
                <li class="nav-item">
                    <a href="" data-target="#edit" data-toggle="tab" class="nav-link">Orders</a>
                </li>
                <li class="nav-item">
                    <a href="" data-target="#porder" data-toggle="tab" class="nav-link">Packages</a>
                </li>
            </ul>
            <div class="tab-content py-4">
                <div class="tab-pane active" id="profile">
                    <h5 class="mb-3">{{$user->name}} Profile</h5>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <h4>About {{$user->name}} </h4>
                            <table class="table table-dark ">

                                <tbody>
                                    <tr class="text-center">
                                        <th scope="col">User Name :</th>
                                        <th scope="col">{{$user->name}}</th>
                                    </tr>

                                    <tr class="text-center">
                                        <th scope="col"> Email :</th>
                                        <th scope="col">{{$user->email}}</th>
                                    </tr>
                                    <tr class="text-center">
                                        <th scope="col">Balance :</th>
                                        <th scope="col">{{$user->balance}}XP</th>
                                    </tr>
                                    <tr class="text-center">
                                        <th scope="col">Rate :</th>
                                        <th scope="col">{{$user->rate}}</th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--/row-->
                </div>
                <div class="tab-pane" id="edit">
                    <h4>All orders </h4>
                    @forelse ($orders as $order)
                        <div class=" p-2">
                            {{$order->name}} - {{$order->total/$order->times}} -
                            @if ($order->status === 'pending')
                                <span class="badge badge-dark"> {{$order->status}} </span>
                            @else
                                <span class="badge badge-success"> {{$order->status}} </span>
                            @endif -
                            {{$order->times}} times \ total is : {{$order->total}}
                        </div>
                    @empty
                        
                    @endforelse
                </div>
                <div class="tab-pane" id="porder">
                    <h4>All Packages </h4>
                    @forelse ($porders as $porder)
                        <div class=" p-2">
                            {{$porder->name}} - {{$porder->total/$porder->times}} -
                            @if ($porder->status === 'pending')
                                <span class="badge badge-dark"> {{$porder->status}} </span>
                            @else
                                <span class="badge badge-success"> {{$porder->status}} </span>
                            @endif -
                            {{$porder->times}} times \ total is : {{$porder->total}}
                        </div>
                        
                    @empty
                        
                    @endforelse
                </div>
            </div>
        </div>
        <div class="col-lg-4 order-lg-1 text-center">
            @if (!($user->image))
            <img src="/img/user.svg" class="img-circle elevation-2 my-3" alt="User Image">
            @else
            <img src=" {{asset('storage/'.Auth::user()->image)}} " class="img-circle elevation-2 w-100" alt="User Image">
            @endif
        </div>
    </div>
</div>
@endsection
