@extends('layouts.admin')

@section('main')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Service</h2>
            </div>
        </div>
    </div>

    <table class="table table-bordered mt-4">
        <tr>
            <th>No</th>
            <th>Type</th>
            <th>Category</th>
            <th>Notes</th>
            <th>Partners</th>
        </tr>
        <tr>
            <td>{{ $service->id }}</td>
            <td>{{ $service->type }}</td>
            <td>{{ $service->category }}</td>
            <td>{{ $service->notes }}</td>
            <td>{{ $service->partners }}</td>
        </tr>
    </table>
    <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('services.index') }}"> Back</a>
    </div>
@endsection
