@extends('layouts.admin')

@section('main')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Partner</h2>
            </div>
        </div>
    </div>

    <table class="table table-bordered mt-4">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Information</th>
            <th>Notes</th>
            <th>Projects</th>
        </tr>
        <tr>
            <td>{{ $partner->id }}</td>
            <td>{{ $partner->name }}</td>
            <td>{{ $partner->information }}</td>
            <td>{{ $partner->notes }}</td>
            <td>{{ $partner->services}}</td>
            {{-- <td>{{ $partner->projects->name }}</td> --}}
        </tr>
    </table>
    <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('services.index') }}"> Back</a>
    </div>
@endsection
