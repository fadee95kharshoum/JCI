@extends('layouts.admin')
@section('main')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-3">
            <div class="card">
                <div class="card-header">Edit {{$user->name}} Account</div>
                <div class="card-body">
                    <form action=" {{route('users.update',$user->id)}} " method="post">
                        @csrf
                        @method('patch')

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control " name="name" value="{{$user->name}}" autocomplete="name">
                                <div> {{$errors->first('name')}} </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control " name="email" value="{{$user->email}}"
                                    autocomplete="email">
                                <div> {{$errors->first('email')}} </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">price</label>

                            <div class="col-md-6">
                                <input id="balance" type="number" class="form-control " name="balance" value="{{$user->balance}}"
                                    autocomplete="price">
                                <div> {{$errors->first('price')}} </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="rate" class="col-md-4 col-form-label text-md-right">rate</label>

                            <div class="col-md-6">
                                <input id="rate" type="text" class="form-control " name="rate" value="{{$user->rate}}"
                                    autocomplete="rate">
                                <div> {{$errors->first('price')}} </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control "  name="password"  autocomplete="new-password">
                                <div> {{$errors->first('password')}} </div>
                            </div>
                        </div>

                        @can('admin')
                            <div class="form-group my-3 row">
                                @foreach ($roles as $role)
                                <div class="form-check">
                                    <input type="checkbox" name="roles[]" value="{{$role->id}}" @if($user->roles->pluck('id')->contains($role->id))
                                    checked
                                    @endif
                                    >
                                    <label> {{$role->name}} </label>
                                </div>
                                @endforeach
                            </div>
                        @endcan
                        <button type="submit" class="btn btn-sm btn-success">Update</button>
                    </form>
                    @if ($errors->any())
                        <div class="alert alert-danger mt-3">
                        <ul>
                             @foreach ($errors->all() as $error)
                             <li>{{ $error }}</li>
                     @endforeach
                         </ul>
                             </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
