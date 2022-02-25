@extends('layouts.admin')

@section('main')
    @can('admin')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right mt-5">
                <a class="btn btn-success" href="{{ route('services.create') }}"> Create New Service</a>
            </div>
        </div>
    </div>
    @endcan
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered mt-4">
        <tr>
            <th>No</th>
            <th>Type</th>
            <th>Partner</th>
            <th width="280px">Action</th>
        </tr>
        <tr>

        </tr>
        @foreach ($services as $service)
        <tr>
            <td>{{ $service->id }}</td>
            <td>{{ $service->type }}</td>
            <td>{{ $service->partners}}</td>
            <td>

            <a class="btn btn-info" href="{{ route('services.show',$service->id) }}">Show</a>

            <a class="btn btn-primary" href="{{ route('services.edit',$service->id) }}">Edit</a>
            <a class="btn btn-danger" href="{{ route('services.destroy',$service->id) }}">Delete</a>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $services->links() !!}

@endsection
